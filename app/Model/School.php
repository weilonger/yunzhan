<?php
/**
 * Created by PhpStorm.
 * User: codel
 * Date: 2018/3/3
 * Time: 11:20
 */

namespace App;

class School extends originize{
    protected $name;
    protected $table = 'school';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected function add(){
        $this->getTable();
    }

    protected function modify(){

    }

    protected function del(){

    }

}