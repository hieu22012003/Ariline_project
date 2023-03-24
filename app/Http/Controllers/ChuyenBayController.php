<?php

namespace App\Http\Controllers;
use App\Models\ChuyenBay;
use App\Models\MayBay;
use App\Models\SanBay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChuyenBayController extends Controller
{
    public function all(Request $request){
        $sanbay = SanBay::all();
        $sanbaydi = $request->get('sanbaydi');
        $sanbayden = $request->get('sanbayden');
        $tgiankhoihanh = $request->get('tgiankhoihanh');
        $tgiandendukien = $request->get('tgiandendukien');
        $chuyenbay = ChuyenBay::Sanbaydi($sanbaydi)
            ->Sanbayden($sanbayden)
            ->tgiankhoihanh($tgiankhoihanh)
            ->tgiandendukien($tgiandendukien)
            ->with("maybay")
            ->simplePaginate(10);

        return view ("admin.chuyenbay.list-chuyenbay",[
            "chuyenbay" => $chuyenbay,
            "sanbay" => $sanbay
        ]);


        return view("admin.users.test",[
            'chuyenbays' => $chuyenbays
        ]);
    }

    public function form(){
        $maybay = MayBay::all();
        $sanbay = SanBay::all();
        return view("admin.chuyenbay.add-chuyenbay",[
            'maybay' => $maybay,
            'sanbay' => $sanbay
        ]);
    }
    public function create(Request $request){
        $request ->validate([
            'idmaybay' => 'required',
            'tgiankhoihanh' => 'required',
//            'tgiandendukien' => 'date_format:H:i|after:tgiankhoihanh',
            'tgiandendukien'=> 'different:tgiankhoihanh',
            'quangduong' => 'integer',
            'sanbaydi' => 'required',
            'sanbayden' => 'different:sanbaydi',
        ],[
            'required'=>"Vui lòng nhập thông tin",
            'different'=>"Phải khác trường ở trên",
            'integer'=>"Phải là số",
        ]);
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $month = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $day = Carbon::now('Asia/Ho_Chi_Minh')->day;
        $giodi = (int)substr($request->get('tgiankhoihanh'),0,2);
        $phutdi = (int)substr($request->get('tgiankhoihanh'),3,2);
        $gioden = (int)substr($request->get('tgiandendukien'),0,2);
        $phutden = (int)substr($request->get('tgiandendukien'),3,2);
        $tgiankhoihanh = Carbon::create($year,$month,$day,$giodi,$phutdi,00);
        $tgiandendukien = Carbon::create($year,$month,$day,$gioden,$phutden,00);
        $tansuat = $request->get('tansuat');
        if($request->get('tgiandendukien')>$request->get('tgiankhoihanh')) {
            for ($i = 0; $i < $request->get('soluong'); $i++) {
                ChuyenBay::create([
                    "idmaybay" => $request->get("idmaybay"),
                    "tgiankhoihanh" => $tgiankhoihanh,
                    "tgiandendukien" => $tgiandendukien,
                    "quangduong" => $request->get("quangduong"),
                    "sanbaydi" => $request->get("sanbaydi"),
                    "sanbayden" => $request->get("sanbayden"),
                ]);
                $tgiankhoihanh = $tgiankhoihanh->addDays($tansuat);
                $tgiandendukien = $tgiandendukien->addDays($tansuat);
            }
        }else if($request->get('tgiandendukien')<$request->get('tgiankhoihanh')){
            $tgiandendukien = $tgiandendukien->addDays(1);
            for ($i = 0; $i < $request->get('soluong'); $i++) {
                ChuyenBay::create([
                    "idmaybay" => $request->get("idmaybay"),
                    "tgiankhoihanh" => $tgiankhoihanh,
                    "tgiandendukien" => $tgiandendukien,
                    "quangduong" => $request->get("quangduong"),
                    "sanbaydi" => $request->get("sanbaydi"),
                    "sanbayden" => $request->get("sanbayden"),
                ]);
                $tgiankhoihanh = $tgiankhoihanh->addDays($tansuat);
                $tgiandendukien = $tgiandendukien->addDays($tansuat);
            }
        }

        return redirect()->to("/chuyenbay/list");
    }
    public function edit($id){
        $chuyenbay = ChuyenBay::find($id);
        $maybay = MayBay::all();
        $sanbay = SanBay::all();
        return view('admin.chuyenbay.edit-chuyenbay',[
            'chuyenbay'=> $chuyenbay,
            'maybay' => $maybay,
            'sanbay' => $sanbay
        ]);
    }
    public function update(Request  $request,$id){
        $request ->validate([
            'idmaybay' => 'required',
            'tgiankhoihanh' => 'required',
            'tgiandendukien' => 'required|date|after:tgiankhoihanh',
            'quangduong' => 'integer',
            'sanbaydi' => 'required',
            'sanbayden' => 'different:sanbaydi',
        ],[
            'required'=>"Vui lòng nhập thông tin",
            'different'=>"Phải khác trường ở trên",
            'integer'=>"Phải là số",
        ]);
        $chuyenbay = ChuyenBay::find($id);
        $chuyenbay -> update([
            "idmaybay"=>$request->get("idmaybay"),
            "tgiankhoihanh"=>$request->get("tgiankhoihanh"),
            "tgiandendukien"=>$request->get("tgiandendukien"),
            "quangduong"=>$request->get("quangduong"),
            "sanbaydi"=>$request->get("sanbaydi"),
            "sanbayden"=>$request->get("sanbayden"),

        ]);
        return redirect()->to("/chuyenbay/list")->with("success","Cập nhật chuyến bay thành công");
    }
    public function delete($id){
        try {
            $chuyenbay = ChuyenBay::find($id);
            $chuyenbay -> delete();
            return redirect()->to("/chuyenbay/list")->with("success","Xóa chuyển bay thành công");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Không thể xóa");
        }

    }
}
