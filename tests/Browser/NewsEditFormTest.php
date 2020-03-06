<?php

namespace Tests\Browser;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testWrongTitleAdd()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSeeIn('category_id', 'О погоде')
                ->type('title', '12')
                ->press('Добавить')
                ->assertSee('Отсутствуют хэштеги')
                ->assertPathIs('/admin/news/create');
        });
    }

    public function testWrongTextAdd()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSeeIn('category_id', 'О погоде')
                ->type('title', 'Новость' . rand(1, 1000))
                ->type('text', 'lorem ipsum...')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Название новости должно быть не менее 5.')
                ->assertPathIs('/admin/news/create');
        });
    }

    public function testSuccesAdd()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSeeIn('category_id', 'О погоде')
                ->type('title', 'Новость' . rand(1, 1000))
                ->type('text', 'lorem ipsum... #lorem')
                ->press('Добавить')
                ->assertSee('Новость успешно создана!')
                ->assertPathIs('/admin/news');
        });
    }
}
