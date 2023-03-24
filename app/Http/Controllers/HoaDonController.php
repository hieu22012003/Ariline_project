<?php

namespace App\Http\Controllers;
use  App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\Ve;

class HoaDonController extends Controller
{
    public function all(Request $request)
    {
        $khachhang = KhachHang::all();
        $ve = Ve::all();
        $paraID = $request->get("idkh");
        $hoadon = Hoadon::ID($paraID)->simplePaginate(10);
        return view("admin.hoadon.list-hoadon", [
            "hoadon" => $hoadon,
            "khachhang" => $khachhang,
            "ve" => $ve
        ]);
    }

    public function form()
    {
        $khachhang = KhachHang::all();
        $ve = Ve::all();
        return view("admin.hoadon.add-hoadon", [
            "khachhang" => $khachhang,
            "ve" => $ve
        ]);

    }

    public function create(Request $request)
    {
        $request->validate([
            'idkh' => 'required|string',
            'mave' => 'required',
            'ngaylaphoadon' => 'required',
            'tongtien' => 'required',

        ], [
            'required' => "Vui lòng nhập thông tin"
        ]);
        Hoadon::create([
            "idkh" => $request->get("idkh"),
            "mave" => $request->get("idchuyenbay"),
            "ngaylaphoadon" => $request->get("ngaylaphoadon"),
            'tongtien' => $request->get("tongtien"),
        ]);
        return redirect()->to("/hoadon/list");
    }

    public function edit($id)
    {
        $hoadon = HoaDon::find($id);
        return view('admin.hoadon.edit-hoadon', [
            'hoadon' => $hoadon
        ]);
    }

    public function update(Request $request, $id)
    {
        $hoadon = HoaDon::find($id);
        $hoadon->update([
            "tongtien" => $request->get("tongtien"),
        ]);
        return redirect()->to("/hoadon/list")->with("success", "Cập nhật hóa đơn thành công");
    }

    public function delete($id)
    {
        try {
            $hoadon = HoaDon::find($id);
            $hoadon->delete();
            return redirect()->to("/hoadon/list")->with("success", "Xóa hóa đơn thành công");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Không thể xóa");
        }
    }
}
