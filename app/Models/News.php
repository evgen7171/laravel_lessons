<?php

namespace App\Models;

use App\Providers\CustomServiceProvider;
use App\Rules\Hashtags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $fillable = ['title', 'text', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }

    public static function rules()
    {
        $tableCategory = (new Categories())->getTable();
        return [
            'title' => 'required|min:5|max:30',
            'text' => ['required','min:5','max:5000',new Hashtags()],
            'category_id' => "required|exists:{$tableCategory},id",
            'image' => 'mimes:jpeg,bmp,png|max:1000'
        ];
    }

    protected static function attributeNames()
    {
        return [
            'title' => 'Название новости',
            'text' => 'Текст новости',
            'category_id' => 'Категория новости',
            'image' => 'Изображение'
        ];
    }
}
