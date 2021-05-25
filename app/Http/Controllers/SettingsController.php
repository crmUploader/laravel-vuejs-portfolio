<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
class SettingsController extends Controller
{
    public function show(){
        $data  = Settings::first();
        $status = 200;
        return response($data, $status)->header('Content-Type', 'text/plain');
    }
}
