<?php
/**
 * Created by PhpStorm.
 * User: codel
 * Date: 2018/3/3
 * Time: 11:12
 */

namespace App;

CLASS Student extends User{
    protected $table = 'student';
    protected $fileable = ['username','password',];

}