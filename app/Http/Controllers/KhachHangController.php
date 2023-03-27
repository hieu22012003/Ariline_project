<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function all(Request  $request){
    $paraName = $request->get("name");
    $khachhang= KhachHang::Name($paraName)->simplePaginate(10);
    return view ("admin.khachhang.list-khachhang",[
        "khachhang"=>$khachhang,
    ]);
}
    public function form(){
    $khachhang = KhachHang::all();
    return view("admin.khachhang.add-khachhang",[
        "khachhang"=>$khachhang,
    ]);

}

    public function create(Request  $request){
    $request ->validate([
        "name"=>'required|string',
        "email" => 'required',
        "sove" => 'required',
        "cmnd"=>'required',
        "sdt" => 'required',
        "address" => 'required',
        "birth" => 'required',
        "gender"=>'required'
    ],[
        'required'=>"Vui lòng nhập thông tin"
    ]);

    KhachHang::create([
        "name"=>$request->get("name"),
        "email"=>$request->get("email"),
        "sove"=>$request->get("sove"),
       "cmnd"=>$request->get("cmnd"),
        "sdt"=>$request->get("sdt"),
        "address"=>$request->get("address"),
        "birth"=>$request->get("birth"),
        "gender"=>$request->get("gender")
    ]);
    return redirect()->to("/khachhang/list");
}
    public function edit($id){
    $khachhang = KhachHang::find($id);
    return view('admin.khachhang.edit-khachhang',[
        'khachhang'=> $khachhang
    ]);
}
    public function update(Request $request,KhachHang $khachhang ){
    $khachhang -> update([
        "name"=>$request->get("name"),
        "email"=>$request->get("email"),
        "sove"=>$request->get("sove"),
        "sdt"=>$request->get("sdt"),
        "address"=>$request->get("address"),
        "birth"=>$request->get("birth"),
        "cmnd"=>$request->get("cmnd"),
        "gender"=>$request->get("gender")
    ]);
    return redirect()->to("/khachhang/list")->with("success","Cập nhật Khách Hàng thành công");
}

    public function delete($id){
    try {
        $khachhang = KhachHang::find($id);
        $khachhang->delete();
        return redirect()->to("/khachhang/list")->with("success","Xóa Khách Hàng thành công");
    }catch (\Exception $e){
        return redirect()->back()->with("error","Không thể xóa");
    }
}
}
