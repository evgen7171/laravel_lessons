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
        echo $response->headers;
//        echo $response->header('Content-Type');
//        Content-Type:  text/html; charset=UTF-8
        $response->assertStatus(200);
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

}
