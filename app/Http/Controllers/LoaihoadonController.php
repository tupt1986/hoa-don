<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\loaihoadon;

class LoaihoadonController extends Controller
{
    public function index(){
        $loaihoadons = Loaihoadon::all();
        $stt = 1;
        return view('loaihoadon.index',[
           'loaihoadons'=>$loaihoadons,
            'stt'=>$stt,
        ]);
    }

    public function create(){
        return view('loaihoadon.create',[
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'ten'=>'required',
            'mau'=>'required',
            'kyhieu'=>'required',
        ],[
            'ten.required'=>'Nhập tên loại hóa đơn (bắt buộc)',
            'mau.required'=>'Nhập ký hiệu mẫu loại hóa đơn (bắt buộc)',
            'kyhieu.required'=>'Nhập lý hiệu loại hóa đơn (bắt buộc)',
        ]);

        $loaihoadon = new loaihoadon();
        $loaihoadon -> ten = $request -> ten;
        $loaihoadon -> mau = $request -> mau;
        $loaihoadon -> kyhieu = $request -> kyhieu;
        $loaihoadon -> save();

        flash()->overlay('Loại hóa đơn <b>'.$loaihoadon->ten.'</b> đã được thêm thành công','Thêm mới loại hóa đơn');

        if($request->btnAddAndBack)
            return redirect('/loaihoadon');
        elseif($request->btnAddAndNew)
            return redirect('/loaihoadon/create');

    }

    public function edit($id){
        $loaihoadon = loaihoadon::findOrFail($id);
        return view('loaihoadon.edit',[
           'loaihoadon'=>$loaihoadon,1
        ]);
    }
    public function update($id, Request $request){
        $this->validate($request,[
            'ten'=>'required',
            'mau'=>'required',
            'kyhieu'=>'required',
        ],[
            'ten.required'=>'Nhập tên loại hóa đơn (bắt buộc)',
            'mau.required'=>'Nhập ký hiệu mẫu loại hóa đơn (bắt buộc)',
            'kyhieu.required'=>'Nhập lý hiệu loại hóa đơn (bắt buộc)',
        ]);

        $loaihoadon = loaihoadon::findOrFail($id);
        $loaihoadon -> update($request->all());
        flash()->overlay('Thông tin loại hóa đơn <b>'.$loaihoadon->ten.'</b> đã chỉnh sửa thành công.', 'Thay đổi thông tin hóa đơn');
        return redirect('/loaihoadon');
    }

    public function destroy($id){
        $loaihoadon = loaihoadon::findOrFail($id);

        if($loaihoadon->delete()){
            flash()->overlay('Xóa loại hóa đơn <b>'.$loaihoadon->ten.'</b> thành công','Xóa loại hóa đơn');
        }
        else{
            flash()->overlay('Có lỗi xảy ra khi xóa loại hóa đơn <b>'.$loaihoadon->ten.'</b>. Liên hệ kỹ thuật để hỗ trợ. ','Xóa loại hóa đơn');
        }
        return redirect('/loaihoadon');
    }
}
