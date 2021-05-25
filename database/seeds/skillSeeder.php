<?php

use Illuminate\Database\Seeder;
use App\Skill;
class skillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill_name = ['php','javascript','laravel','codeigniter','vuejs'];
        $skill      = ['90','70','80','90','40'];
        for($i = 0; $i < count($skill); $i++){
            Skill::create(['name'=>$skill_name[$i],'skill'=>$skill[$i]]);
        }
    }
}
