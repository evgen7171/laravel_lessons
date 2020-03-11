<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public static function getLinks()
    {
        return ['https://news.yandex.ru/auto.rss'];
    }

    public function index()
    {
        return view('admin.parser', ['links' => self::getLinks()]);
    }

    public function parser(Request $request)
    {
        $link = self::getLinks()[$request->link];
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
        return view('admin.news.parse', ['data'=>$data]);
    }

    public function saveInDB()
    {
        //
    }
}
