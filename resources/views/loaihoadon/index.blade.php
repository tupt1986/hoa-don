@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ LOẠI HÓA ĐƠN
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Danh sách loại hóa đơn</h2>
    </div>
    <div class="row" align="right">
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{route('loaihoadon.create')}}', '_self')">
            <i class="icon-doc"></i> Thêm loại hóa đơn mới
        </button>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên loại hóa đơn</th>
            <th>Ký hiệu mẫu hóa đơn</th>
            <th>Ký hiệu hóa đơn</th>
            <th>Chỉnh sửa</th>
            <th>Xóa loại hóa đơn</th>
        </tr>
        </thead>
        <tbody>
        @foreach($loaihoadons as $loaihoadon)
            <tr>
                <td>{{$stt++}}</td>
                <td>{{$loaihoadon->ten}}</td>
                <td>{{$loaihoadon->mau}}</td>
                <td>{{$loaihoadon->kyhieu}}</td>
                <td>
                    <button type="button" class="btn btn-success btn-xs"
                            onclick="window.open('{{url('/loaihoadon/'.$loaihoadon->id)}}', '_self')">Chỉnh sửa thông
                        tin
                    </button>
                </td>
                <td>
                    <form method="POST" action="{{url('/loaihoadon/'.$loaihoadon->id)}}"
                          onsubmit="return ConfirmDelete();">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-success btn-xs">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        function ConfirmDelete() {
            var x = confirm("Chắc chắn muốn xóa loại hóa đơn?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
