<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Donvi;

class DonviCOntroller extends Controller
{
    //list don vi
    public function donvi_index(){
        $donvis = Donvi::where('loaidonvi',1)->get();
        $stt=1;
        return view('donvi.index',['donvis'=>$donvis, 'stt'=>$stt]);
    }
    //create don vi
    public function donvi_create(){
        $list_donvi = Donvi::where('loaidonvi',0)->get();
        return view('donvi.create', ['list_donvi'=>$list_donvi]);
    }
    //save new donvi
    public function donvi_store(Request $request){

        //validate
        $this->validate($request,[
            'madonvi'=>'required|unique:donvis|digits:6|',
            'tendonvi'=>'required|max:255',
            'donvi_id'=>'required',
        ],[
            'madonvi.required'=>'Nhập mã đơn vị (bắt buộc)',
            'madonvi.unique'=>'Mã đơn vị đã tồn tại',
            'madonvi.digits'=>'Mã đơn vị phải là 6 chữ số',
            'tendonvi.required'=>'Nhập tên đơn vị (bắt buộc)',
            'tendonvi.max'=>'Tên đơn vị tối đa 255 ký tự',
            'donvi_id.required'=>'Chọn đơn vị trực thuộc'
        ]);
        //save donvi
        $donvi = new Donvi();
        $donvi->madonvi = $request->madonvi;
        $donvi->tendonvi = $request->tendonvi;
        $donvi->donvi_id = $request->donvi_id;
        $donvi->loaidonvi = '1'; //đơn vị huyện thành phố

        $donvi->save();

        //redirect
        flash()->overlay('Đơn vị <b>'.$donvi->tendonvi.'</b> đã được thêm mới thành công. ','Thêm mới đơn vị huyện - thành phố');
        if($request->btnAddAndBack)
            return redirect('/donvi');
        elseif($request->btnAddAndNew)
            return redirect('/donvi/create');
    }

    public function donvi_destroy($id){
        $donvi = Donvi::findOrFail($id);
        //$user -> delete();
        if ($donvi -> delete()) {
            flash()->overlay('Đơn vị <b>'.$donvi->tendonvi.'</b> đã được xóa thành công. ','Xóa đơn vị');
            return redirect('/donvi');
        }
        else{
            echo 'that bai';
        }

    }

    public function donvi_edit($id){
        $list_donvi = Donvi::where('loaidonvi',0)->get();
        $donvi = Donvi::findOrFail($id);
        return view('donvi.edit',[
            'donvi'=>$donvi,
            'list_donvi'=>$list_donvi,
        ]);
    }
    public function donvi_update($id, Request $request){
        //validate
        $this->validate($request,[
            'madonvi'=>'required|digits:6|unique:donvis,madonvi,'.$id,
            'tendonvi'=>'required|max:255',
            'donvi_id'=>'required',
        ],[
            'madonvi.required'=>'Nhập mã đơn vị (bắt buộc)',
            'madonvi.unique'=>'Mã đơn vị đã tồn tại',
            'madonvi.digits'=>'Mã đơn vị phải là 6 chữ số',
            'tendonvi.required'=>'Nhập tên đơn vị (bắt buộc)',
            'tendonvi.max'=>'Tên đơn vị tối đa 255 ký tự',
            'donvi_id.required'=>'Chọn đơn vị trực thuộc'
        ]);

        $donvi = Donvi::findOrFail($id);
        $donvi->update($request->all());
        flash()->overlay('Thông tin đơn vị <b>'.$donvi->tendonvi.'</b> đã thay đổi thành công.','Thay đổi thông tin đơn vị.');
        return redirect('/donvi');

    }
    //list buu cuc
    public function buucuc_index(){
        $buucucs = Donvi::where('loaidonvi',2)->get();
        $stt=1;
        return view('buucuc.index',['buucucs'=>$buucucs, 'stt'=>$stt]);
    }
    //create buu cuc
    public function buucuc_create(){
        $list_donvi = Donvi::where('loaidonvi',1)->get();
        return view('buucuc.create', ['list_donvi'=>$list_donvi]);
    }
    //save new buu cuc
    public function buucuc_store(Request $request){

        //validate
        $this->validate($request,[
            'madonvi'=>'required|unique:donvis|digits:6|',
            'tendonvi'=>'required|max:255',
            'donvi_id'=>'required',
        ],[
            'madonvi.required'=>'Nhập mã bưu cục (bắt buộc)',
            'madonvi.unique'=>'Mã bưu cục đã tồn tại',
            'madonvi.digits'=>'Mã bưu cục phải là 6 chữ số',
            'tendonvi.required'=>'Nhập tên bưu cục (bắt buộc)',
            'tendonvi.max'=>'Tên bưu cục tối đa 255 ký tự',
            'donvi_id.required'=>'Chọn đơn vị trực thuộc'
        ]);
        //save donvi
        $donvi = new Donvi();
        $donvi->madonvi = $request->madonvi;
        $donvi->tendonvi = $request->tendonvi;
        $donvi->donvi_id = $request->donvi_id;
        $donvi->loaidonvi = '2'; //bưu cục

        $donvi->save();

        //redirect
        flash()->overlay('Bưu cục <b>'.$donvi->tendonvi.'</b> đã được thêm mới thành công. ','Thêm mới bưu cục');
        if($request->btnAddAndBack)
            return redirect('/buucuc');
        elseif($request->btnAddAndNew)
            return redirect('/buucuc/create');
    }

    public function buucuc_destroy($id){
        $donvi = Donvi::findOrFail($id);
        //$user -> delete();
        if ($donvi -> delete()) {
            flash()->overlay('Bưu cục <b>'.$donvi->tendonvi.'</b> đã được xóa thành công. ','Xóa bưu cục');
            return redirect('/buucuc');
        }
        else{
            echo 'that bai';
        }

    }
    public function buucuc_edit($id){
        $list_donvi = Donvi::where('loaidonvi',1)->get();
        $buucuc = Donvi::findOrFail($id);
        return view('buucuc.edit',[
           'buucuc'=>$buucuc,
            'list_donvi'=>$list_donvi,
        ]);
    }
    public function buucuc_update($id, Request $request){
        //validate
        $this->validate($request,[
            'madonvi'=>'required|digits:6|unique:donvis,madonvi,'.$id,
            'tendonvi'=>'required|max:255',
            'donvi_id'=>'required',
        ],[
            'madonvi.required'=>'Nhập mã bưu cục (bắt buộc)',
            'madonvi.unique'=>'Mã bưu cục đã tồn tại',
            'madonvi.digits'=>'Mã bưu cục phải là 6 chữ số',
            'tendonvi.required'=>'Nhập tên bưu cục (bắt buộc)',
            'tendonvi.max'=>'Tên bưu cục tối đa 255 ký tự',
            'donvi_id.required'=>'Chọn đơn vị trực thuộc'
        ]);

        $buucuc = Donvi::findOrFail($id);
        $buucuc->update($request->all());
        flash()->overlay('Thông tin bưu cục <b>'.$buucuc->tendonvi.'</b> đã thay đổi thành công.','Thay đổi thông tin bưu cục.');
        return redirect('/buucuc');

    }
}
