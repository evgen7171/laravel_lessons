<?php

namespace App\Models;

use App\Providers\CustomServiceProvider;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'caption'];

    public static function categoryId($categoryName)
    {
        $result = self::query()->where('caption', '=', $categoryName)->first();
        return $result ? $result->id : null;
    }

}
