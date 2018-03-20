<?php
/**
 * Created by PhpStorm.
 * User: codel
 * Date: 2018/3/3
 * Time: 11:12
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
CLASS Student extends Model{
    const SEX_UNKNOWN = 0;
    const SEX_MALE = 1;
    const SEX_FEMAILE = 2;

    protected $table = 'student';
    protected $fileable = ['name','password','email','telephone'];

    protected function getDateFormat(){
        return time();
    }

    public function sex($in = null){
        $arr = [
            self::SEX_UNKNOWN => '完未知',
            self::SEX_MALE => '男',
            self::SEX_FEMAILE => '女',

        ];
        if($in !==null){
            return array_key_exists($in,$arr)?$arr[$in]:$arr[self::SEX_UNKONWN];
        }
    }
}