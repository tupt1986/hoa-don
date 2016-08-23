<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Donvi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * @return $this
     * show tất cả user
     */
    public function index()
    {
        $users = User::all();
        return view("user.index",[
            'users'=>$users,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * thay đổi quyền truy cập user
     */
    public function assignRoles(Request $request){
        $user = User::where('username', $request['username'])->first();
        $user ->roles()->detach();
        if($request['role_user']){
            $user->roles() -> attach(Role::where('name','User')->first());
        }
        if($request['role_manager']){
            $user->roles() -> attach(Role::where('name','Manager')->first());
        }
        if($request['role_admin']){
            $user->roles() -> attach(Role::where('name','Admin')->first());
        }
        flash()->overlay('Thay đổi quyền truy cập tài khoản <b>'.$user->username.'</b> thành công.','Thay đổi quyền truy cập.');
        return redirect()->back();
    }


    /**
     * @param $id
     * @return $this
     * Lấy thông tin chèn vào form thay đổi người dùng
     */
    public function edit($id){
        $list_donvi = Donvi::where('loaidonvi',1)->get();
        $user = User::findOrFail($id);
        return view("user.edit",[
            'user'=>$user,
            'list_donvi'=>$list_donvi,
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Lưu thay đổi thông tin người dùng
     */
    public function update($id, Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'username'=>'required|unique:Users,username,'.$id,
            'birthday'=>'required|date',
            'donvi_id'=>'required',
        ],[
            'name.required'=>'Nhập thông tin họ tên.',
            'username.required'=>'Nhập thông tin tên đăng nhập.',
            'username.unique'=>'Tên đăng nhập đã tồn tại trên hệ thông.',
            'birthday.required'=>'Nhập ngày tháng năm sinh (bắt buộc)',
            'birthday.date'=>'Ngày sinh phải là ngày tháng năm',
            'donvi_id.required'=>'Chọn đơn vị trực thuộc',
        ]);

        $user = User::findOrFail($id);
        $user -> update($request->all());
        flash()->overlay('Thông tin tài khoản <b>'.$user->username.'</b> đã thay đổi thành công.','Thay đổi thông tin người dùng.');
        return redirect('/users');
    }

    public function resetpassword($id){
        $user = User::findOrFail($id);
        $user -> password = bcrypt('123456');
        $user -> update();
        flash()->overlay('Mật khẩu tài khoản <b>'.$user->username.'</b> đã được đặt về mặc định là 123456. ','Thiết lập lại mật khẩu');
        return redirect('/users');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        //var_dump($user);
        //$user -> delete();
        if ($user -> delete()) {
            flash()->overlay('Tài khoản <b>'.$user->username.'</b> đã được xóa thành công. ','Xóa tài khoản');
            return redirect('/users');
        }
        else{
            echo 'that bai';
        }

    }

    public function create(){
        $list_donvi = Donvi::where('loaidonvi',1)->get();
        return view('user.create',[
            'list_donvi'=>$list_donvi,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
           'name'=>'required|max:255',
           'username'=>'required|unique:Users',
            'birthday'=>'required|date',
            'donvi_id'=>'required',
        ],[
            'name.required'=>'Nhập thông tin họ tên.',
            'username.required'=>'Nhập thông tin tên đăng nhập.',
            'username.unique'=>'Tên đăng nhập đã tồn tại trên hệ thông.',
            'birthday.required'=>'Nhập ngày tháng năm sinh (bắt buộc)',
            'birthday.date'=>'Ngày sinh phải là ngày tháng năm',
            'donvi_id.required'=>'Chọn đơn vị trực thuộc',
        ]);

        $user = new User;
        $user -> name = $request['name'];
        $user -> username = $request['username'];
        $user -> birthday = $request['birthday'];
        $user-> donvis() -> associate(Donvi::findOrFail($request['donvi_id']));
        $user -> password = bcrypt('123456');

        $user -> save();
        if($request['role_user']){
            $user->roles() -> attach(Role::where('name','User')->first());
        }
        if($request['role_manager']){
            $user->roles() -> attach(Role::where('name','Manager')->first());
        }
        if($request['role_admin']){
            $user->roles() -> attach(Role::where('name','Admin')->first());
        }

        flash()->overlay('Tài khoản <b>'.$user->username.'</b> đã được thêm mới thành công. ','Thêm mới tài khoản');
        return redirect('/users');
    }

    public function export(){
        $users = User::select('id', 'name', 'birthday', 'username')->get();
        Excel::create('export data', function($excel) use($users){
           $excel->sheet('DS nguoi dung', function($sheet) use($users){
               $sheet->fromArray($users);
            })->export('xlsx');
        });
        return redirect('/users');
    }

    public function view_import(){
        return view('user.import');
    }

    public function import(){
        Excel::load(Input::file('file'), function ($reader){
           $reader->each(function ($sheet){
              foreach ($sheet->toArray() as $row){
                  //var_dump($sheet->toArray());

                  User::firstOrCreate($sheet->toArray());
              }
           });
        });
        return redirect('/users');
    }
}
