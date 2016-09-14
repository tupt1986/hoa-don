<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\loaihoadon;
use App\giaonhan;
use App\Donvi;
use App\User;

class GiaonhanController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $giaos = giaonhan::where('nguoigiao_id', $user->id)->get();
        $nhans = giaonhan::where('nguoinhan_id', $user->id)->get();
        $stt_giao = 1;
        $stt_nhan = 1;
        return view('giaonhan.index', [
            'giaos' => $giaos,
            'nhans' => $nhans,
            'stt_giao' => $stt_giao,
            'stt_nhan' => $stt_nhan,
        ]);
    }

    public function create()
    {
        $comboboxLoaihoadon = loaihoadon::all();
        $user = Auth::user();
        $donvis = Donvi::where('donvi_id', $user->donvi_id)
            ->orwhere('id', $user->donvi_id)
            ->get();

        return view('giaonhan.create', [
            'comboboxLoaihoadon' => $comboboxLoaihoadon,
            'donvis' => $donvis,
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $giaonhan = new giaonhan();
        $giaonhan->soquyen = $request->soquyen;
        $giaonhan->loaihoadon_id = $request->loaihoadon_id;
        $giaonhan->sohdbatdau = $request->sohdbatdau;
        $giaonhan->sohdketthuc = $request->sohdketthuc;
        $giaonhan->ngaythang = $request->ngaythang;
        $giaonhan->xacnhan = 0;
        $giaonhan->nguoigiao_id = Auth::user()->id;
        $giaonhan->nguoinhan_id = $request->nguoinhan_id;
        $giaonhan->save();


        if ($request->btnAddAndBack)
            return redirect('/giaonhan');
        elseif ($request->btnAddAndNew)
            return redirect('/giaonhan/create');


    }

    public function checkaccept(){
        $user = Auth::user();
        $nhans = giaonhan::where('nguoinhan_id', $user->id)
            ->where('xacnhan', 0)
            ->get();
        $stt_nhan = 1;
        return view('giaonhan.accept', [
            'nhans' => $nhans,
            'stt_nhan' => $stt_nhan,
        ]);
    }

    public function accept(Request $request){
        $giaonhan = giaonhan::findOrfail($request->id);
        $user = Auth::user();
        if($user -> id == $giaonhan->nguoinhan_id){
            $giaonhan->xacnhan = 1;
            $giaonhan->save();
            flash()->overlay('Giac dich xác nhận thành công. ','Xác nhận giao dịch');
        }
        else{
            flash()->overlay('Bạn không có quyền xác nhận giao dịch này. ','Xác nhận giao dịch');
        }
        return redirect('/giaonhan/accept');
    }

    public function deny(Request $request){
        $giaonhan = giaonhan::findOrfail($request->id);
        $user = Auth::user();
        if($user -> id == $giaonhan->nguoinhan_id){
            $giaonhan->xacnhan = 2;
            $giaonhan->save();
            flash()->overlay('Bạn đã từ chối giao dịch. ','Xác nhận giao dịch');
        }
        else{
            flash()->overlay('Bạn không có quyền từ chối giao dịch này. ','Xác nhận giao dịch');
        }
        return redirect('/giaonhan/accept');

    }
}
