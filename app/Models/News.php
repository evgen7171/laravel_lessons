<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private $news = [
        [
            'id' => 1,
            'title' => 'Инопланетяне среди нас',
            'categories' => [1],
            'text' => 'В Саратове родился инопланетянин!'
        ],
        [
            'id' => 2,
            'title' => 'О футболе',
            'categories' => [2, 3],
            'text' => 'В эту субботу состоится матч по футболу между командами "Крылья советов" и "Спутник"'
        ],
        [
            'id' => 3,
            'title' => 'О погоде',
            'categories' => [3, 4],
            'text' => 'А будет ли зима вообще? Синоптики прибегают к профессиональным гадалкам!'
        ],
        [
            'id' => 4,
            'title' => 'Toyota',
            'categories' => [5, 6, 7],
            'text' => 'Представители компании Toyota из-за Коронавируса отказались от производства в Китае'
        ],
        [
            'id' => 5,
            'title' => 'Коронавирус. За или против?',
            'categories' => [6, 7],
            'text' => 'Новый вирус не страшнее обычной простуды. Редакция против некачественных товаров, но и против некачественного вируса...'
        ],
    ];
    private $categories = [
        0 => [
            'id' => 1,
            'name' => 'yellow',
            'caption' => 'желтая пресса'
        ],
        1 => [
            'id' => 2,
            'name' => 'sport',
            'caption' => 'спорт'
        ],
        2 => [
            'id' => 3,
            'name' => 'actual',
            'caption' => 'актуальное'
        ],
        3 => [
            'id' => 4,
            'name' => 'weather',
            'caption' => 'погода'
        ],
        4 => [
            'id' => 5,
            'name' => 'currency',
            'caption' => 'валюта'
        ],
        5 => [
            'id' => 6,
            'name' => 'health',
            'caption' => 'здоровье'
        ],
        6 => [
            'id' => 7,
            'name' => 'foreign',
            'caption' => 'внешняя политика'
        ]
    ];

    /**
     * метод получения всех новостей
     * @return array
     */
    public function getAllNews()
    {
        return $this->news;
    }

    /**
     * метод получения одной новости
     * @param $id - id новости
     * @return mixed
     */
    public function getOneNews($id)
    {
        return $this->news[array_search($id, array_column($this->news, 'id'))];
    }

    /**
     * метод получения всех категорий новостей
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    public function getCaptionCategory($categoryName)
    {
        return array_column($this->categories, 'caption')
        [array_search($categoryName, array_column($this->categories, 'name'))];
    }

    public function getCategoryNews($category)
    {
        $id_categories = $this->categories[array_search(
            $category, array_column($this->categories, 'name')
        )]['id'];

        $arr = [];
        foreach ($this->news as $news) {
            if (in_array($id_categories, $news['categories'])) {
                $arr[] = $news;
            }
        }
        return $arr;
    }

    public function addNews($news)
    {
        $this->news[] = $news;
    }

    public function getLastId()
    {
        return array_column($this->news, 'id')
        [count(array_column($this->news, 'id')) - 1];
    }
}
