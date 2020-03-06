<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Admin;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function all()
    {
        $news = News::query()
            ->paginate(6);

        return view('admin.news', ['news' => $news]);

    }

    public function update(Request $request, News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'category' => $news->belongsTo('App\Models\Categories', 'category_id')->get()[0],
            'categories' => Categories::all()
        ]);
    }

    public function save(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }

            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.news')->with('success', 'Новость успешно изменена!');
        }
    }

    public function delete(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news')->with('success', 'Новость успешно удалена!');
    }

    public function addNews(Request $request, News $news)
    {
        // dump($news);
        if ($request->isMethod('post')) {
            //$request->flash();

            $url = null;
            $news = new News();

            if ($request->file('image')) {
                //$path = Storage::putFile('public', $request->file('image'));
                //$url = Storage::url($path);
                $path = $request->file('image')->store('public');
                $news->image = Storage::url($path);
            }

            $news->fill($request->except('_token'));
            $news->save();

            return redirect()->route('admin.news')->with('success', 'Новость успешно создана!');
        }

        $category = $news->category_id ? $news->belongsTo('App\Models\Categories', 'category_id')->get()[0] : [];

        return view('admin.addNews', [
            'news' => $news,
            'category' => $category,
            'categories' => Categories::query()->select(['id', 'caption'])->get()
        ]);
    }
}
