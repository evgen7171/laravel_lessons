<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use App\Providers\CustomServiceProvider;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public static function getLinks()
    {
        return [
            ['name' => 'популярная механика', 'link' => 'http://www.popmech.ru/out/public-all.xml'],
            ['name' => 'яндекс.авто', 'link' => 'https://news.yandex.ru/auto.rss'],
            ['name' => 'яндекс.спорт', 'link' => 'https://news.yandex.ru/sport.rss'],
            ['name' => 'яндекс.аренда', 'link' => 'https://news.yandex.ru/realty.rss'],
            ['name' => 'комерсантъ', 'link' => 'http://www.kommersant.ru/RSS/news.xml'],
            ['name' => 'метро.публикации', 'link' => 'http://www.metronews.ru/rss.xml?c=1300244445-1'],
            ['name' => 'майл', 'link' => 'https://news.mail.ru/rss/main/91/'],
            ['name' => 'майл.экономика', 'link' => 'https://news.mail.ru/rss/economics/91/'],
            ['name' => 'рамблер', 'link' => 'https://news.rambler.ru/rss/Russia/?limit=100']
        ];
    }

    public function index()
    {
        return view('admin.parser', ['links' => self::getLinks()]);
    }

    public function parserGet($requestLink)
    {
        $link = $requestLink;
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate,comments,category,enclosure::url]']
        ]);
        $data['parsedLink'] = $link;
        $data['savedTitles'] = $this->findSavedNews($data);
        return $data;
    }

    public function findSavedNews($data)
    {
        $saved = [];
        $titles = array_column($data['news'], 'title');
        foreach ($titles as $title) {
            if (News::findTitleNewsId($title)) {
                $saved[] = $title;
            }
        }
        return $saved;
    }

    public function parser(Request $request)
    {
        $link = self::getLinks()[$request->link]['link'];
        $data = $this->parserGet($link);
        return view('admin.news.parsed', ['data' => $data]);
    }

    public function saveNews(Request $request)
    {
        $this->storeNews($request);
        $requestLink = $request->only('parsedLink')['parsedLink'];
        $data = $this->parserGet($requestLink);
        return view('admin.news.parsed', ['data' => $data]);
    }

    public function storeNews(Request $request)
    {
        $category = new Categories();
        $category->fill([
            'name' => CustomServiceProvider::translitText($request->category),
            'caption' => $request->category
        ]);
        $id = Categories::categoryId($category->caption);
        if (!$id) {
            $category->save();
            $id = Categories::categoryId($category->caption);
        };
        $categoryId = $id;

        $news = new News();
        $news->fill([
            'title' => $request->title,
            'image' => $request->image ? $request->image : '',
            'text' => $request->description,
            'category_id' => $categoryId,
            'isPrivate' => 0
        ]);
        $id = News::findTitleNewsId($news->title);
        if (!$id) {
            $news->save();
            $id = News::findTitleNewsId($news->title);
        };
        $newsId = $id;
    }

    public function deleteNews(Request $request)
    {
        $id = News::findTitleNewsId($request->title);
        News::query()->where('id','=',$id)->delete();
        $data = $this->parserGet($request->parsedLink);
        return view('admin.news.parsed', ['data' => $data]);
    }
}
