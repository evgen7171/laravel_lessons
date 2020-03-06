<?php

namespace Tests\Browser;

use App\Models\News;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsFormTest extends DuskTestCase
{
    private $news;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testWrongTitle()
    {
        $this->news = News::query()->find(rand(1, News::all()->count()));

        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.edit', $this->news))
                ->type('title', '')
                ->press('Изменить')
                ->assertSee('Поле Название новости обязательно для заполнения.')
                ->assertPathIs('/admin/news/{$this->news->id}/edit');
        });
    }

    public function testWrongText()
    {
        $this->news = News::query()->find(rand(1, News::all()->count()));

        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.edit', $this->news))
                ->type('text', '12)')
                ->press('Изменить')
                ->assertSee('Количество символов в поле Текст новости должно быть не менее 5.')
                ->assertPathIs('/admin/news/{$this->news->id}/edit');
        });
    }

    public function testSuccess()
    {
        $this->news = News::query()->find(rand(1, News::all()->count()));

        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.edit', $this->news))
                ->assertSeeIn('option', 'О погоде')
                ->press('Изменить')
                ->assertSee('Новость успешно изменена!')
                ->assertPathIs('/admin/news');
        });
    }
}
