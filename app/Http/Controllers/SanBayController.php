<?php

namespace App\Http\Controllers;
use App\Models\SanBay;
use Illuminate\Http\Request;

class SanBayController extends Controller
{
    public function all(Request  $request){
        $paratenthanhpho = $request->get("tenthanhpho");
        $sanbay = SanBay::Tenthanhpho($paratenthanhpho)->simplePaginate(10);
        return view ("admin.sanbay.list-sanbay",[
            "sanbay" => $sanbay
        ]);
    }
    public function form(){
        return view("admin.sanbay.add-sanbay");
    }
    public function create(Request $request){
        $request ->validate([
            'tensanbay' => 'required',
            'tenthanhpho' => 'required',
        ],[
            'required'=>"Vui lòng nhập thông tin"
        ]);
        SanBay::create([
            "tensanbay"=>$request->get("tensanbay"),
            "tenthanhpho"=>$request->get("tenthanhpho"),
        ]);
        return redirect()->to("/sanbay/list");

    }
    public function edit($id){
        $sanbay = SanBay::find($id);
        return view('admin.sanbay.edit-sanbay',[
            'sanbay'=> $sanbay
        ]);
    }
    public function update(Request  $request,$id){
        $request ->validate([
            'tensanbay' => 'required',
            'tenthanhpho' => 'required',
        ],[
            'required'=>"Vui lòng nhập thông tin"
        ]);
        $sanbay = SanBay::find($id);
        $sanbay -> update([
            "tensanbay"=>$request->get("tensanbay"),
            "tenthanhpho"=>$request->get("tenthanhpho"),
        ]);
        return redirect()->to("/sanbay/list")->with("success","Cập nhật sân bay thành công");
    }
    public function delete($id){
        try {
            $sanbay = SanBay::find($id);
            $sanbay->delete();
            return redirect()->to("/sanbay/list")->with("success","Xóa hóa đơn thành công");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Không thể xóa");
        }

    }
}
