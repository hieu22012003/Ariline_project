<?php

namespace App\Http\Controllers;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\Sanbay;
use App\Models\Ve;
use App\Models\Chuyenbay;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("usersPage\index");
    }

    public function about()
    {
        return view("usersPage\about");
    }

    public function blog()
    {
        return view("usersPage\blog");
    }

    public function blogDetail()
    {
        return view("usersPage\blog-detail");
    }

    public function book()
    {
        return view("usersPage\book");
    }

//    public function listChuyenbay(Request  $request){
//        $paratenchuyenbay = $request->get("tenchuyenbay");
//        $chuyenbay = Chuyenbay::Tenchuyenbay($paratenchuyenbay)
//            ->with("maybay")
////            ->with("sanbay1")->with("sanbay2")
//            ->simplePaginate(10);
//        return view ("usersPage.index",[
//            "chuyenbay"=>$chuyenbay
//        ]);
//    }
    public function listChuyenbay(Request $request)
    {
        $sanbay = SanBay::all();
        $sanbaydi = $request->get('sanbaydi');
        $sanbayden = $request->get('sanbayden');
        $tgiankhoihanh = $request->get('tgiankhoihanh');
        $tgiandendukien = $request->get('tgiandendukien');
        $trangthai = $request->get('trangthai');
        $chuyenbay = ChuyenBay::Sanbaydi($sanbaydi)
            ->sanbayden($sanbayden)
            ->tgiankhoihanh($tgiankhoihanh)
            ->tgiandendukien($tgiandendukien)
            ->Trangthai($trangthai)
            ->with("maybay")
            ->simplePaginate(10);

        return view("usersPage.index", [
            "chuyenbay" => $chuyenbay,
            "sanbay" => $sanbay
        ]);
    }

    public function checkinOnline()
    {
        return view("usersPage\check-in-online");
    }

    public function contact()
    {
        return view("usersPage\contact");
    }

    public function login()
    {
        return view("usersPage\login");
    }

    public function payment()
    {
        return view("usersPage\payment");
    }
    public function form($idchuyenbay){
        $chuyenbay = ChuyenBay::find($idchuyenbay);
        return view("usersPage.contract",[
            "chuyenbay"=>$chuyenbay,
        ]);
    }

    public function contract1 (Request $request){
        $loaive = $request->get("loaive");
        $tgiankhoihanh = $request->get("tgiankhoihanh");
        $tgiandendukien = $request->get("tgiandendukien");
        $sanbaydi = SanBay::find($request->get("sanbaydi"));
        $sanbayden = SanBay::find($request->get("sanbayden"));
        $gia = $request->get("gia");
        $total = ($loaive*$gia)+($loaive*$gia);
        return view("usersPage.contract1",[
            "total"=>$total,
            "idchuyenbay"=>$request->get("idchuyenbay"),
            'loaive'=>$loaive,
            'tgiankhoihanh'=>$tgiankhoihanh,
            'tgiandendukien'=>$tgiandendukien,
            'sanbaydi'=>$sanbaydi,
            'sanbayden'=>$sanbayden,
        ]);
    }

    public function contract(Request  $request){
        $ngaydatve = Carbon::now('Asia/Ho_Chi_Minh');
//        $request ->validate([
//            'idkh'=>'required|string',
//            'idchuyenbay' => 'required',
//            'ngaydatve' => 'required',
//            'ghethuong' => 'required',
//            'ghevip' => 'required',
//            'tongtien' => 'required',
//
//        ],[
//            'required'=>"Vui lòng nhập thông tin"
//        ]);

        HoaDon::create([
            "idkh"=>$request->get("idkh"),
            "mave"=>$request->get("mave"),
            "ngaylaphoadon"=>$ngaydatve,
            "tongtien" => $request->get("tongtien"),
        ]);
        return redirect()->to("/usersPage/index");
    }
    public function promotion(){
        return view("usersPage\promotion");
    }
    public function register(){
        return view("usersPage.register");
    }
}
