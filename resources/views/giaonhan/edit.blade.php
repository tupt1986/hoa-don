@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ LOẠI HÓA ĐƠN
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Thêm mới loại hóa dơn</h2>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-success fade in margin-bottom-40">
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
            <form class="sky-form" style="border-width: 0px;" action="{{url('/loaihoadon/'.$loaihoadon->id)}}" method="post" name="editloaibuugui" id="editloaibuugui" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên loại hóa đơn:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="ten" placeholder="Nhập tên loại hóa đơn (bắt buộc)" value="{{$loaihoadon->ten}}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Ký hiệu mẫu hóa đơn:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="mau" placeholder="Ký hiệu mẫu hóa đơn (bắt buộc)"  value="{{$loaihoadon->mau}}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Ký hiệu hóa đơn:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="kyhieu" placeholder="Ký hiệu hóa đơn (bắt buộc)"  value="{{$loaihoadon->kyhieu}}">
                            </label>
                        </div>
                    </div>
                </section>
                <div align='center'>
                    <input type="submit" name="btnEdit" value="Lưu thay đổi"class="btn-u" width="100px"/>
                    <input type="Button" name="thoat" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/loaihoadon')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
@endsection
