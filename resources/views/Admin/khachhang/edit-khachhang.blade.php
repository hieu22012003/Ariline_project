<?php
@section("title")
    Sửa khách hàng
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Sửa </h1>
                    <a href="{{url("/khachhang/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa </li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa </h3>
                </div>
                <form role="form" method="post" action="{{url("/khachhang/edit",['khachhang'=>$khachhang->id])}}">
                    @csrf
                    @method("put")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$khachhang->name}}" placeholder="Họ và tên">
                        </div>
                        <div class="form-group">
                            <label for="">Mail</label>
                            <input type="text" class="form-control" name="email" id="email"  value="{{$khachhang->email}}" placeholder="Mail">
                        </div>
                        <div class="form-group">
                            <label for="">số điện thoại</label>
                            <input type="number" class="form-control" name="sdt" id="sdt"  value="{{$khachhang->sdt}}" placeholder="SDT">
                        </div>
                        <div class="form-group">
                            <label for="">giới tính</label>
                            <select name="gender" class="form-control">
                                <option value="khac">khác</option>
                                <option value="nam">nam</option>
                                <option value="nu">nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số Chứng Minh</label>
                            <input type="number" class="form-control" name="cmnd" id="cmnd"  value="{{$khachhang->cmnd}}" placeholder="CMND">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{$khachhang->address}}" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="">ngày sinh</label>
                            <input type="datetime-local" class="form-control" name="birth" id="birth" value="{{$khachhang->birth}}" placeholder="dd,mm,yy">
                        </div>
                        <div class="form-group">
                            <label for="">số vé đã mua</label>
                            <input type="number" class="form-control" name="sove" id="sove" value="{{$khachhang->sove}}" placeholder="Số Vé">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
