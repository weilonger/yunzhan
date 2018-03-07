<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','password',
    ];

    protected function getDate($time){
        return date("Y-m-d H:i:s",$time);
    }

    protected function getLastLogin(){
        return $this->getDate(time());
    }
}
