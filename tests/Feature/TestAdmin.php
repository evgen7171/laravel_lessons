<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestAdmin extends TestCase
{
    /**
     * проверка пути
     * @return void
     */
    public function testPath()
    {
        $response = $this->get('/admin/index');
        $response->assertOk();
    }

    public function testDownloadNews()
    {
        $response = $this->post('/admin/download', ['button' => 'Скачать новость', 'news' => 'О погоде']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'title' => 'О погоде'
            ]);
    }

    public function testAddNews()
    {
        $response = $this->get('/admin/addNews');
        $response->assertStatus(200);
    }
}
