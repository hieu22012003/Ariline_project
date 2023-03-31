<?php

namespace App\Http\Controllers;
use App\Models\ChuyenBay;
use App\Models\ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VeController extends  Controller
{
    public function all(Request $request)
    {
        $chuyenbay = Chuyenbay::all();

        // $paraTennguoidi = $request->get("tennguoidi");
        // $ve = Ve::Tennguoidi($paraTennguoidi)->simplePaginate(10);
        return view("page.ve.index", [
            // "ve" => $ve,
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

    //Controller xử lý dữ liệu ajax truyền lên
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tennguoidi' => 'required|string',
            'idchuyenbay' => 'required',
            'ngaydatve' => 'required',
            'trangthai' => 'required',
            'gia' => 'required',
            'loaive' => 'required',
            'vitringoi' => 'required',

        ], [
            'required' => "Vui lòng nhập thông tin"
        ]);

        //trả thất bại nếu validate sai
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        if ($request->ngaydatve) {
            $ngaydatve = date('Y-m-d', strtotime($request->ngaydatve));
        }

        $ve = Ve::create([
            "tennguoidi" => $request->get("tennguoidi"),
            "idchuyenbay" => $request->get("idchuyenbay"),
            "ngaydatve" => $ngaydatve,
            "trangthai" => $request->get("trangthai"),
            "gia" => $request->get("gia"),
            'loaive' => $request->get("loaive"),
            'vitringoi' => $request->get("vitringoi"),
        ]);

        //thành công trả về 200
        if ($ve) {
            return response()->json(['data' => $ve], 200);
        }

        //vì là ajax lên sẽ return về response()->json chứ không trả về view
        //thất bại trả về 400
        return response()->json(['data' => ''], 400);
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
