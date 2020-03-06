<?php

namespace Tests\Browser;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsAddFormTest extends DuskTestCase
{
    use RefreshDatabase;

    public function testWrongTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.create'))
                ->type('title', '12')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Название новости должно быть не менее 5.')
                ->assertPathIs(route('/admin/news/create'));
        });
    }

    public function testWrongText()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.create'))
                ->assertInputValue('title', '')
                ->type('title', 'Новость' . rand(1, 1000))
                ->type('text', 'lorem ipsum...')
                ->press('Добавить')
                ->assertSee('Отсутствуют хэштеги')
                ->assertPathIs(route('/admin/news/create'));
        });
    }


    public function testSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.create'))
                ->type('title', 'Новость' . rand(1, 1000))
                ->type('text', 'lorem ipsum... #lorem')
                ->press('Добавить')
                ->assertSee('Новость успешно создана!')
                ->assertPathIs('/admin/news');
        });
    }
}
