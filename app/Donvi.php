<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Donvi extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['tendonvi','madonvi','donvi_id'];

    public function Users(){
        return $this->hasMany('App\User');
    }

    protected static  function boot(){
        Donvi::deleting(function($donvi){
           $donvi->users()->delete();
        });
    }
}
