<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\News;
use App\Providers\CustomServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function all()
    {
        $categories = Categories::query()
            ->paginate(6);

        return view('admin.news.categories', ['categories' => $categories]);

    }

    public function update(Request $request, Categories $category)
    {
        return view('admin.news.addCategory', [
            'category' => $category
        ]);
    }

    public function save(Request $request, Categories $category)
    {
        if ($request->isMethod('post')) {
            $category->fill($request->all());
            $category->save();
            return redirect()->route('admin.categories')->with('success', 'Категория успешно изменена!');
        }
    }

    public function delete(Categories $category)
    {
        News::where('category_id', $category->id)->delete();
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Категория успешно удалена!');
    }

    public function add(Request $request, Categories $category)
    {
        if ($request->isMethod('post')) {

            $category = new Categories();

            $category->fill($request->all());
            $category->name = CustomServiceProvider::translitText($category->caption);
            $category->save();

            return redirect()->route('admin.categories')->with('success', 'Категория успешно создана!');
        }

        return view('admin.news.addCategory', [
            'category' => $category
        ]);
    }
}
