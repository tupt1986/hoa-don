@extends('layouts.index')
@section('title', 'THAY ĐỔI THÔNG TIN NGƯỜI DÙNG')

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Chỉnh sửa thông tin người dùng</h2>
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
            <form class="sky-form" style="border-width: 0px;" action="{{url('/users/'.$user->id)}}" method="post" name="edituser" id="edituser" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Họ tên:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="name" placeholder="Nhập họ tên (bắt buộc)" value="{{$user->name}}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên đăng nhập:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="username" placeholder="Nhập tên đăng nhập (bắt buộc)"  value="{{$user->username}}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Ngày sinh:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="birthday" placeholder="Nhập ngày sing (bắt buộc)"  value="{{$user->birthday}}">
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
                                        <option value="{{$donvi->id}}" {{($user->donvi_id == $donvi->id) ? 'selected' : ''}}>{{$donvi->madonvi}} - {{$donvi->tendonvi}}</option>
                                    @endforeach
                                </select>
                                <i></i>
                            </label>
                        </div>
                    </div>
                </section>
                <div align='center'>
                    <input type="submit" name="edit" value="Thay đổi"class="btn-u" width="100px"/>
                    <input type="button" name="back" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/users')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
@endsection
