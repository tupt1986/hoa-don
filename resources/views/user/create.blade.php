@extends('layouts.index')
@section('title')
    <i class="icon-user-follow"></i> THÊM MỚI NGƯỜI DÙNG
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Thông tin người dùng thêm mới</h2>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-success fade in margin-bottom-20">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-5 col-sm-offset-1">
            <form class="sky-form" style="border-width: 0px;" action="{{url('/users/create')}}" method="post" name="adduser" id="adduser" >
                {{csrf_field()}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Họ tên:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="name" placeholder="Nhập họ tên (bắt buộc)" value="{{ old('name') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên đăng nhập:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="username" placeholder="Nhập tên đăng nhập (bắt buộc)"  value="{{ old('username') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Ngày sinh:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="birthday" placeholder="Nhập ngày sing (bắt buộc)"  value="{{ old('birthday') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Đơn vị trực thuộc</label>
                        <div class="col col-8">
                            <label class="select">
                                <select name="donvi_id" id="donvi_id">
                                    <option selected disabled>Chọn đơn vị trực thuộc</option>
                                    @foreach($list_donvi as $donvi)
                                        <option value="{{$donvi->id}}" {{(old('donvi_id')==$donvi->id) ? 'selected' : ''}}>{{$donvi->madonvi}} - {{$donvi->tendonvi}}</option>
                                    @endforeach
                                </select>
                                <i></i>
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Quyền truy cập:</label>
                        <div class="inline-group col col-8">
                            <label class="toggle">
                                <input type="checkbox" name="role_user" id="role_user">
                                <i></i>
                                Người dùng
                            </label>
                            <label class="toggle">
                                <input type="checkbox" name="role_manager" id="role_manager">
                                <i></i>
                                Quản lý
                            </label>
                            <label class="toggle">
                                <input type="checkbox" name="role_admin" id="role_admin">
                                <i></i>
                                Quản trị viên
                            </label>
                        </div>
                    </div>
                </section>
                <div align='center'>
                    <input type="submit" name="add" value="Thêm mới" class="btn-u" width="100px"/>
                    <input type="button" name="back" value="Quay lại" class="btn-u" width="100px"
                           onclick="window.open('{{url('/users')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
@endsection
