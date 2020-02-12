<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    private $testNames = ['test1', 'test2'];

    public function getTestLinks($param = null)
    {
        if ($param == null) {
            return $this->testNames;
        }
        $arr = $this->testNames;
        $key = array_search($param, $arr);
        $arr[$key] = 'admin';
        return $arr;
    }

    public function Test1()
    {
        return 'Тест 1...';
    }

    public function Test2()
    {
        return 'Тест 2...';
    }
}
