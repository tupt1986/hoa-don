@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    XÁC NHẬN GIAO DỊCH
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Giao dịch nhận hóa đơn chưa xác nhận</h2>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Số quyển</th>
            <th>Loại hóa đơn</th>
            <th>Số bắt đầu</th>
            <th>Số kết thúc</th>
            <th>Ngày giao</th>
            <th>Người giao</th>
            <th>Hành động</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($nhans as $nhan)
            <tr>
                <td>{{$stt_nhan++}}</td>
                <td>{{$nhan->soquyen}}</td>
                <td>{{$nhan->loaihoadons->ten}}</td>
                <td>{{$nhan->sohdbatdau}}</td>
                <td>{{$nhan->sohdketthuc}}</td>
                <td>{{$nhan->ngaythang}}</td>
                <td>{{$nhan->User_giao->name}}</td>
                <td>
                    <form method="POST" action="{{route('giaonhan.accept')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$nhan->id}}">
                        <button type="submit" class="btn btn-success btn-xs">Chấp nhận</button>
                    </form>
                    </td>
                <td>
                    <form method="POST" action="{{route('giaonhan.deny')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$nhan->id}}">
                        <button type="submit" class="btn btn-success btn-xs">Từ chối</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
