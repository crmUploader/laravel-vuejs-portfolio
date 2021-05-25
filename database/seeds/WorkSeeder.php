<?php

use Illuminate\Database\Seeder;
use App\Work;
class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Customer Relational Managment','Enterprice Resource Planing','Carshapers','Salon Managment','Mobile Management System','Our HRM'];
        $image  =   [
                        'http://localhost/laravel/laravel7/blog2/public/imgs/work/p1.jpg',
                        'http://localhost/laravel/laravel7/blog2/public/imgs/work/p2.jpg',
                        'http://localhost/laravel/laravel7/blog2/public/imgs/work/p3.jpg',
                        'http://localhost/laravel/laravel7/blog2/public/imgs/work/p4.jpg',
                        'http://localhost/laravel/laravel7/blog2/public/imgs/work/p5.jpg',
                        'http://localhost/laravel/laravel7/blog2/public/imgs/work/p6.jpg'
                    ];
        for($i = 0; $i < count($name); $i++){
            Work::create(['name'=>$name[$i],'image'=>$image[$i]]);
        }
    }
}
