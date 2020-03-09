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

    public function edit(News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'category' => $news->category(),
            'categories' => Categories::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        $this->validate($request, News::rules(), [], News::attributeNames());

        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $news->image = $url;
        }


        $result = $news->fill($request->all())->save();

        if ($result) {
            return redirect()
                ->route('admin.news.index')->with('success', 'Новость успешно изменена!');
        } else {
            $request->flash();
            return redirect()
                ->route('admin.news.create')->with('error', 'Ошибка изменения новости!');
        }
    }

    public function destroy(Request $request, News $news)
    {
        if ($request->isMethod('DELETE')) {
            $news->delete();
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
        }
    }

    public function create()
    {
        $news = new News();
        return view('admin.addNews', [
            'news' => $news,
            'category' => '',
            'categories' => Categories::all()
        ]);
    }

    public function store(Request $request)
    {
        $news = new News();
        $url = null;
        $this->validate($request, News::rules(), [], News::attributeNames());
        if ($request->file('image')) {
            $path = $request->file('image')->store('public');
            $news->image = Storage::url($path);
        }

        $result = $news->fill($request->all())->save();

        if ($result) {
            return redirect()
                ->route('admin.news.index')->with('success', 'Новость успешно создана!');
        } else {
            $request->flash();
            return redirect()
                ->route('admin.news.create')->with('error', 'Ошибка базы данных: новость не создана!');
        }
    }
}
