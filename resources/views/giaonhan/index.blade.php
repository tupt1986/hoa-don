@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ GIAO NHẬN HÓA ĐƠN
@endsection

@section('content')
    <div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#giaohoadon" aria-expanded="true">Giao dịch bàn giao hóa đơn</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#nhanhoadon" aria-expanded="false">Giao dịch nhận hóa đơn</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="giaohoadon" class="tab-pane fade active in">
            <div class="row" align="right">
                <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{route('giaonhan.create')}}', '_self')">
                    <i class="icon-doc"></i> Bàn giao hóa đơn cho đơn vị
                </button>
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
                    <th>Người nhận</th>
                    <th>Trạng thái xác nhận</th>
                </tr>
                </thead>
                <tbody>
                @foreach($giaos as $giao)
                    <tr>
                        <td>{{$stt_giao++}}</td>
                        <td>{{$giao->soquyen}}</td>
                        <td>{{$giao->loaihoadons->ten}}</td>
                        <td>{{$giao->sohdbatdau}}</td>
                        <td>{{$giao->sohdketthuc}}</td>
                        <td>{{$giao->ngaythang}}</td>
                        <td>{{$giao->User_nhan->name}}</td>
                        <td>{{ ($giao->xacnhan==0) ? 'Chưa xác nhân' : 'đã xác nhận'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="nhanhoadon" class="tab-pane fade">
            <div class="row" align="right">
                <button class="btn-u btn-brd rounded-4x" onclick="window.open('', '_self')">
                    <i class="icon-doc"></i> Hoàn trả hóa đơn cho quản lý
                </button>
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
                    <th>Trạng thái xác nhận</th>
                </tr>
                </thead>
                <tbody>

                @foreach($nhans as $nhan)
                    <tr>
                        <td>{{$stt_giao++}}</td>
                        <td>{{$nhan->soquyen}}</td>
                        <td>{{$nhan->loaihoadons->ten}}</td>
                        <td>{{$nhan->sohdbatdau}}</td>
                        <td>{{$nhan->sohdketthuc}}</td>
                        <td>{{$nhan->ngaythang}}</td>
                        <td>{{$nhan->User_giao->name}}</td>
                        <td>{{ ($nhan->xacnhan==0) ? 'Chưa xác nhân' : 'đã xác nhận'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
