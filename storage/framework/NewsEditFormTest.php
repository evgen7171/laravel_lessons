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
    public function testWrongTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/1/edit')
                ->type('title', '')
                ->press('Изменить')
                ->assertSee('Поле Название новости обязательно для заполнения.')
                ->assertPathIs('/admin/news/1/edit');
        });
    }

    public function testWrongText()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/1/edit')
                ->type('text', '12)')
                ->press('Изменить')
                ->assertSee('Количество символов в поле Текст новости должно быть не менее 5.')
                ->assertPathIs('/admin/news/1/edit');
        });
    }

    public function testSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/1/edit')
                ->assertSeeIn('category_id', 'О погоде')
                ->press('Изменить')
                ->assertSee('Новость успешно изменена!')
                ->assertPathIs('/admin/news');
        });
    }
}
