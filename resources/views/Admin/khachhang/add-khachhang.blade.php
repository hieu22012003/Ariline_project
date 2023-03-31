@section("title")
    Thêm Users
@endsection
{{--@section("title","Abuot Us") có thể đổi dùng ntn --}}

@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm </h1>
                    <a href="{{url("/users/list")}}" class="btn btn-outline-info float-right">
                        Quay lại
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm </li>
                    </ol>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm </h3>
                </div>
                <form role="form" method="post" action="{{url("/users/create")}}" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control"  name="name" id="name"  value="{{old("name")}}" placeholder="Họ và tên">
                            @error("name")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mail</label>
                            <input type="text" class="form-control"  name="email" id="email"  value="{{old("email")}}" placeholder="Mail">
                            @error("email")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số Chứng minh nhân dân </label>
                            <input type="number" class="form-control" name="cmnd" id="cmnd" value="{{old("cmnd")}}" placeholder="cmnd">
                            @error("cmnd")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ngày sinh</label>
                            <input type="datetime-local" class="form-control" name="birth" id="birth" value="{{old("birth")}}" placeholder="dd/mm/yy">
                            </div>
                            @error("birth")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="number" class="form-control" name="sdt" id="sdt" value="{{old("sdt")}}" placeholder="Số điện thoại">
                            @error("sdt")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">giới tính</label>
                            <select name="gender" class="form-control">
                                <option value="khac">khác</option>
                                <option value="nam">nam</option>
                                <option value="nu">nu</option>
                            </select>
                            @error("gender")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{old("address")}}" placeholder="Địa chỉ">
                            @error("address")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">số vé đã đặt</label>
                            <input type="number" class="form-control" name="sove" id="sove" value="{{old("sove")}}" placeholder="số vé">
                            @error("sove")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
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
