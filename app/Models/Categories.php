<?php

namespace App;

use App\Providers\CustomServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    protected $fillable = ['name', 'caption'];
}
