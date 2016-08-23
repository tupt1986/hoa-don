@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ NGƯỜI DÙNG
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Danh sách người dùng - quyền truy cập</h2>
    </div>
    <div class="row" align="right">
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/users/create')}}', '_self')">
            <i class="icon-user-follow"></i> Thêm người dùng mới
        </button>
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/users/import')}}', '_self')">
            <i class="icon-user-follow"></i> Import
        </button>
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/users/export')}}', '_self')">
            <i class="icon-user-follow"></i> Export
        </button>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Tài khoản</th>
            <th>Ngày sinh</th>
            <th>Đơn vị</th>
            <th>Q. người dùng</th>
            <th>Q. quản lý</th>
            <th>Q. quản trị</th>
            <th>Thay đổi quyền</th>
            <th>Chỉnh sửa</th>
            <th>Xóa tk</th>
            <th>Reset password</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form action="{{route('user.assignroles')}}" method="post">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->birthday}}</td>
                    <td>{{$user->donvis->tendonvi}}</td>
                    <td>
                        <input type="checkbox" {{$user->hasRole('User') ? 'checked' : ''}} name="role_user"
                               id="role_user">
                    </td>
                    <td>
                        <input type="checkbox" {{$user->hasRole('Manager') ? 'checked' : ''}} name="role_manager"
                               id="role_manager">
                    </td>
                    <td>
                        <input type="checkbox" {{$user->hasRole('Admin') ? 'checked' : ''}} name="role_admin"
                               id="role_admin">
                    </td>
                    {{csrf_field()}}
                    <td align="center">
                        <button type="submit" class="btn btn-success btn-xs">Thay đổi quyền</button>
                    </td>
                </form>
                <td align="center">
                    <button type="button" class="btn btn-success btn-xs"
                            onclick="window.open('{{url('/users/'.$user->id)}}', '_self')">Chỉnh sửa thông tin
                    </button>
                </td>
                <td align="center">
                    <form method="POST" action="{{route('user.destroy',$user->id)}}" onsubmit="return ConfirmDelete();">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-success btn-xs">Xóa</button>
                    </form>
                </td>
                <td align="center">
                    <form method="POST" action="{{route('user.resetpassword',$user->id)}}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success btn-xs">Reset password</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        function ConfirmDelete() {
            var x = confirm("Chắc chắn muốn xóa người dùng?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
