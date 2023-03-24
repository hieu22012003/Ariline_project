<?php

namespace App\Http\Controllers;

use App\Models\MayBay;

use Illuminate\Http\Request;

class MayBayController extends Controller
{
    //
    public function all(Request  $request){
        $parahangmaybay = $request->get("hangmaybay");
        $paratenmaybay= $request->get("tenmaybay");
        $maybay = MayBay::Hangmaybay($parahangmaybay)->Tenmaybay($paratenmaybay)->simplePaginate(10);
        return view ("admin.maybay.list-maybay",[
            "maybay" => $maybay
        ]);
    }
    public function form(){
        return view("admin.maybay.add-maybay");
    }
    public function create(Request $request){
        $request ->validate([
            'hangmaybay' => 'required',
            'tenmaybay' => 'required',
            'tongsoghe' => 'integer',
        ],[
            'required'=>"Vui lòng nhập thông tin",
            'integer'=>"Vui lòng số"
        ]);
        MayBay::create([
            "hangmaybay"=>$request->get("hangmaybay"),
            "tenmaybay"=>$request->get("tenmaybay"),
            "tongsoghe"=>$request->get("tongsoghe"),
        ]);
        return redirect()->to("/maybay/list");
    }
    public function edit($id){
        $maybay = MayBay::find($id);;
        return view('admin.maybay.edit-maybay',[
            'maybay'=> $maybay
        ]);
    }
    public function update(Request  $request,$id){
        $maybay = MayBay::find($id);
        $request ->validate([
            'hangmaybay' => 'required',
            'tenmaybay' => 'required',
            'tongsoghe' => 'integer',
        ],[
            'required'=>"Vui lòng nhập thông tin",
            'integer'=>"Vui lòng số"
        ]);
        $maybay -> update([
            "hangmaybay"=>$request->get("hangmaybay"),
            "tenmaybay"=>$request->get("tenmaybay"),
            "tongsoghe"=>$request->get("tongsoghe"),

        ]);
        return redirect()->to("/maybay/list")->with("success","Cập nhật máy bay thành công");
    }
    public function delete($id){
        try {
            $maybay = MayBay::find($id);
            $maybay -> delete();
            return redirect()->to("/maybay/list")->with("success","Xóa hóa đơn thành công");
        }catch (\Exception $e){
            return redirect()->back()->with("error","Không thể xóa");
        }

    }
}
