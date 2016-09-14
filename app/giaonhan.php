<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donvi;
use App\User;
use App\loaihoadon;

class giaonhan extends Model
{
    public function loaihoadons(){
        return $this->belongsTo('App\loaihoadon','loaihoadon_id');
    }

    public function User_giao(){
        return $this->belongsTo('App\User','nguoigiao_id');
    }

    public function User_nhan(){
        return $this->belongsTo('App\User','nguoinhan_id');
    }
}
