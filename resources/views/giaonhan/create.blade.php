@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    GIAO DỊCH BÀN GIAO HÓA ĐƠN
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Thông tin hóa đơn bàn giao</h2>
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
            <form class="sky-form" style="border-width: 0px;" action="{{url('/giaonhan/create')}}" method="post" name="addloaibuugui" id="addloaibuugui" >
                {{csrf_field()}}
                <section>
                    <div class="row">
                        <label class="label col col-2">Ngày bàn giao:</label>
                        <div class="col col-4">
                            <label class="input">
                                <i class="icon-append fa fa-calendar"></i>
                                <input type="text" id="date" class="hasDatepicker" name="ngaythang" placeholder="Nhập ngày bàn giao hóa đơn (bắt buộc)"  value="{{ old('ngaythang') }}">
                            </label>
                        </div>
                        <label class="label col col-2">Người bàn giao:</label>
                        <div class="col col-4">
                            <label class="input">
                                <input type="text" disabled value="{{ $user->name }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-2">Số quyển:</label>
                        <div class="col col-4">
                            <label class="input">
                                <input type="text" name="soquyen" placeholder="Nhập số quyển hóa đơn bàn giao (bắt buộc)" value="{{ old('soquyen') }}">
                            </label>
                        </div>
                        <label class="label col col-2">Loại hóa đơn:</label>
                        <div class="col col-4">
                            <label class="select">
                                <select name="loaihoadon_id" id="loaihoadon_id">
                                    <option selected disabled>Chọn loại hóa đơn</option>
                                    @foreach($comboboxLoaihoadon as $loaihoadon)
                                        <option value="{{$loaihoadon->id}}" {{(old('loaihoadon_id')==$loaihoadon->id) ? 'selected' : ''}}>{{$loaihoadon->ten}}</option>
                                    @endforeach
                                </select>
                                <i></i>
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-2">Dãy hóa đơn từ:</label>
                        <div class="col col-4">
                            <label class="input">
                                <input type="text" name="sohdbatdau" placeholder="Nhập số hóa đơn bắt đầu"  value="{{ old('sohdbatdau') }}">
                            </label>
                        </div>
                        <label class="label col col-2">đến:</label>
                        <div class="col col-4">
                            <label class="input">
                                <input type="text" name="sohdketthuc" placeholder="Nhập số hóa đơn kết thúc"  value="{{ old('sohdketthuc') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-2">Chọn đơn vị:</label>
                        <div class="col col-4">
                            <label class="select">
                                <select name="donvi" id="donvi">
                                    <option selected disabled>Chọn đơn vị</option>
                                    @foreach($donvis as $donvi)
                                        <option value="{{$donvi->id}}" {{(old('donvi_id')==$donvi->id) ? 'selected' : ''}}>{{$donvi->tendonvi}}</option>
                                    @endforeach
                                </select>
                                <i></i>
                            </label>
                        </div>
                        <label class="label col col-2">Người nhận::</label>
                        <div class="col col-4">
                            <label class="select">
                                <select name="nguoinhan_id" id="nguoinhan_id">
                                    <option selected disabled>Chọn người nhận bàn giao</option>
                                </select>
                                <i></i>
                            </label>
                        </div>
                    </div>
                </section>

                <div align='center'>
                    <input type="submit" name="btnAddAndNew" value="Lưu và tiếp tục thêm mới" class="btn-u" width="100px"/>
                    <input type="submit" name="btnAddAndBack" value="Lưu và kết thúc"class="btn-u" width="100px"/>
                    <input type="Button" name="thoat" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/loaihoadon')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
    <script>
        $('#donvi').on('change',function (e) {
            $('#nguoinhan_id').find('option') .remove().end();
            var id_donvi = $('#donvi option:selected').attr('value');
            var info = $.get("{{url('ajaxUser')}}",{id_donvi:id_donvi});
            $('#nguoinhan_id').append('<option selected disabled>Chọn người nhận bàn giao</option>');
            info.done(function (data) {
                $.each(data,function (index,subcatObj) {
                    $('#nguoinhan_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name+' - '+subcatObj.username+'</option>');
                });
            });

            info.fail(function(){
               alert('Có lỗi xẩy ra. Tải lại trang và thử lại.')
            });
        });
    </script>
@endsection
