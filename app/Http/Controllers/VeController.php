<?php

namespace App\Http\Controllers;
use App\Models\ChuyenBay;
use App\Models\ve;
use Illuminate\Http\Request;

class VeController extends  Controller
{
    public function all(Request $request)
    {
        $chuyenbay = Chuyenbay::all();
        $paraTennguoidi = $request->get("tennguoidi");
        $ve = Ve::Tennguoidi($paraTennguoidi)->simplePaginate(10);
        return view("admin.ve.list-ve", [
            "ve" => $ve,
            "chuyenbay" => $chuyenbay
        ]);
    }

    public function form()
    {
        $chuyenbay = ChuyenBay::all();
        return view("admin.ve.add-ve", [
            "chuyenbay" => $chuyenbay
        ]);

    }

    public function create(Request $request)
    {
        $request->validate([
            'tennguoidi' => 'required|string',
            'idchuyenbay' => 'required',
            'ngaydatve' => 'required',
            'trangthai' => 'required',
            'giave' => 'required',
            'loaive' => 'required',
            'vitringoi' => 'required',

        ], [
            'required' => "Vui lòng nhập thông tin"
        ]);
        Ve::create([
            "tennguoidi" => $request->get("tennguoidi"),
            "idchuyenbay" => $request->get("idchuyenbay"),
            "ngaydatve" => $request->get("ngaydatve"),
            "trangthai" => $request->get("trangthai"),
            "gia" => $request->get("gia"),
            'loaive' => $request->get("loaive"),
            'vitringoi' => $request->get("vitringoi"),
        ]);
        return redirect()->to("/ve/list");
    }

    public function edit($id)
    {
        $ve = Ve::find($id);
        return view('admin.ve.edit-ve', [
            've' => $ve
        ]);
    }

    public function update(Request $request, $id)
    {
        $ve = Ve::find($id);
        $ve->update([
            "trangthai" => $request->get("trangthai"),
        ]);
        return redirect()->to("/ve/list")->with("success", "Cập nhật vé thành công");
    }

    public function delete($id)
    {
        try {
            $ve = Ve::find($id);
            $ve->delete();
            return redirect()->to("/ve/list")->with("success", "Xóa vé thành công");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Không thể xóa");
        }


    }
}
