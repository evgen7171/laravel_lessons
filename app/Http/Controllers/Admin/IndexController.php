<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\NewsController;
use App\Models\Admin;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        //
        return view('admin/index');
    }

<<<<<<< HEAD
    public function saveData($data)
    {
        dump($data);
    }

    /**
     * метод формы загрузки
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function downloadForm()
    {
        if ($this->request->isMethod('post')) {
            $this->request->flash();
            $data = $this->request->except('_token');
            if ($data['button'] == 'Скачать новость') {
                return $this->downloadNews($data);
            } elseif ($data['button'] == 'Скачать файл') {
                return $this->downloadFile($data);
            }
        }
        $files = scandir(storage_path('images2/data'));
        foreach ($files as $key => $item) {
            if ($item == '.' or $item == '..') {
                unset($files[$key]);
            }
        }
        return view('admin.download', ['news' => News::getAllNewsTitles(), 'files' => $files]);
    }

    public function downloadNews($data)
    {
        $news = News::query()->where('title', $data['news']);
        return response()->json($news)
            ->header('Content-Disposition', 'attachment; filename = news.txt')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function downloadFile($data)
    {
        return response()->download(storage_path('images2/data/') . $data['file']);
    }

    /**
=======
    public function addNews2()
    {
        // todo ошибка
        return view('admin.addNews2', ['categories' => News::getCategories()]);
    }

    public function addNews()
    {
        if ($this->request->isMethod('post')) {
            $this->request->flash();
            $file = $this->request->file('image');
            $file->move(public_path() . '/path', 'filename.img');
            dd($file);
//            NewsController::add($this->request->except('_token'));
//            return redirect()->route('admin.addNews');
        }

        return view('admin.addNews', ['categories' => News::getCategoriesCaptions()]);
    }

    public function saveData($data)
    {
        dump($data);
    }

    /**
     * метод формы загрузки
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function downloadForm()
    {
        if ($this->request->isMethod('post')) {
            $this->request->flash();
            $data = $this->request->except('_token');
            if ($data['button'] == 'Скачать новость') {
                return $this->downloadNews($data);
            } elseif ($data['button'] == 'Скачать файл') {
                return $this->downloadFile($data);
            }
        }
        $files = scandir(storage_path('images/data'));
        foreach ($files as $key => $item) {
            if ($item == '.' or $item == '..') {
                unset($files[$key]);
            }
        }
        return view('admin.download', ['news' => News::getAllNewsTitles(), 'files' => $files]);
    }

    public function downloadNews($data)
    {
        $news = NewsController::findByCaption($data['news']);
        return response()->json($news)
            ->header('Content-Disposition', 'attachment; filename = news.txt')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function downloadFile($data)
    {
        return response()->download(storage_path('images/data/') . $data['file']);
    }

    /**
>>>>>>> master
     * метод скачивания разметки страницы с роута admin.test1
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Throwable
     */
    public function download()
    {
        $content = view('admin.test1')->render();
        return response($content)
            ->header('Content-type', 'application/text')
            ->header('Content-type', mb_strlen($content))
            ->header('Content-Disposition', 'attachment; filename = downloaded' . now()->format('Ymd') . '.txt');
    }
}
