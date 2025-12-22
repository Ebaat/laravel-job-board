<?php

namespace App\Models;


class Job
{
    public static function all()
    {
        return [

            ['title' => 'software engineer', 'salary' => '1000$'],
            ['title' => 'Graphic Designer', 'salary' => '1200$']
        ];
    }
}
