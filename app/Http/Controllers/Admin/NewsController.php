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
    public function index()
    {
        $news = News::query()
            ->paginate(6);

        return view('admin.news', ['news' => $news]);

    }

    public function update(Request $request, News $news)
    {
        if ($request->isMethod('PATCH')) {
            return view('admin.addNews', [
                'news' => $news,
                'category' => $news->belongsTo('App\Models\Categories', 'category_id')->get()[0],
                'categories' => Categories::all()
            ]);
        } else if ($request->isMethod('PUT')) {
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }

            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена!');
        }
    }

    public function destroy(Request $request, News $news)
    {
        if ($request->isMethod('DELETE')) {
            $news->delete();
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
        }
    }

    public function create(Request $request, News $news)
    {
        if ($request->isMethod('GET')) {
            if (!count($request->all())) {
                $news = new News();
                return view('admin.addNews', [
                    'news' => $news,
                    'category' => '',
                    'categories' => Categories::all()
                ]);
            }

            $url = null;
            $news = new News();

            if ($request->file('image')) {
                $path = $request->file('image')->store('public');
                $news->image = Storage::url($path);
            }
            $news->fill($request->except('_token'));
            $news->save();

            return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана!');
        }

        $category = $news->category_id ? $news->belongsTo('App\Models\Categories', 'category_id')->get()[0] : [];

        return view('admin.addNews', [
            'news' => $news,
            'category' => $category,
            'categories' => Categories::query()->select(['id', 'caption'])->get()
        ]);
    }
}
