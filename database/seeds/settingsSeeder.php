<?php

use Illuminate\Database\Seeder;
use App\Settings;
class settingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create(
            [
                'header_img'=>'http://localhost/laravel/laravel7/blog2/public/imgs/site/parallax1.jpg',
                'website_logo'=>'http://localhost/laravel/laravel7/blog2/public/imgs/site/logo.png'
            ]
            );
    }
}
