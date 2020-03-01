<?php

namespace App\Models;

use App\Providers\CustomServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $fillable = ['title', 'text', 'image', 'category_id'];
}
