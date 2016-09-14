<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\giaonhan;

class loaihoadon extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['ten','mau','kyhieu'];

    public function giaonhans(){
        return $this->hasMany('App\giaonhan');
    }


}
