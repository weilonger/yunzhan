<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class originize extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $name;
    protected $last;
    protected $starttime;
    protected $endtime;
    public function __construct(){

    }

    protected function getDateFormat($time){
        return date("Y-m-d H:i:s",$time);
    }

    //添加子目录
    protected function add(){
    }

    protected function modify(){
    }

    protected function del(){
    }
}
