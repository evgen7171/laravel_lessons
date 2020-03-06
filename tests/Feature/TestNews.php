<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestNews extends TestCase
{
    public function testAll()
    {
        $response = $this->get('/news/all');
        $response->assertStatus(200);
    }

    public function testOne()
    {
        $response = $this->get('/news/1');
        $response->assertStatus(200);
    }
    public function testNotFound()
    {
        $response = $this->get('/news');
        $response->assertNotFound();
    }

    public function testOneContentType()
    {
        $response = $this->get('/news/1');
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
    }

    public function testOneCategory()
    {
        $response = $this->get('/news/categories/1');
        $response->assertStatus(200);
    }

    public function testCategories()
    {
        $response = $this->get('/news/categories/all');
        $response->assertStatus(200);
    }
//    public function testLocation()
//    {
//        $response = $this->get('/news/all');
//        $response->assertLocation('/news/all');
//    }

}
