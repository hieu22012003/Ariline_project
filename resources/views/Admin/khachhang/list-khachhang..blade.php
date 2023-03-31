@section("title")
    khách hàng
@endsection


@extends("admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Uers</h1>
                    <a href="{{url("/khachhang/create")}}" class="btn btn-outline-info float-right">
                        Thêm
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="{{url("/khachhang/list")}}">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" >
                                        <input type="text" value="{{app("request")->input("name")}}"  name="name" class="form-control float-right" placeholder="Search by Name">
                                        {{--                                        <select name="Brand" class="form-control float-right">--}}
                                        {{--                                            <option value="">--Select Name--</option>--}}
                                        {{--                                            @foreach($khachhang as $item)--}}
                                        {{--                                                <option @if(app("request")->input("name")==$item->name)  selected @endif value="{{$item->name}}">{{$item-name}}</option>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </select>--}}
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>Họ và Tên</th>
                                    <th>Mail</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>chứng minh nhân dân</th>
                                    <th>ngày sinh</th>
                                    <th>giới tính</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($khachhang as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->sdt}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->cmnd}}</td>
                                        <td>{{$item->birth}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>{{$item->sove}}</td>
                                        <td><a href="{{url("/khachhang/edit",['id'=>$item->id])}}" class="btn btn-outline-info">+</a></td>
                                        <td>
                                            <form action="{{url("/khachhang/delete",['id'=>$item->id])}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" onclick="return confirm('Xóa khách hàng {{$item->name}} ?')" class="btn btn-outline-danger">-</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! $khachhang-> appends(app("request")->input())-> links() !!}
    </div>
@endsection
