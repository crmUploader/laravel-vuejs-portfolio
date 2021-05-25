<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
class WorkController extends Controller
{
    public function show(){
        $data  = Work::all();
        $status = 200;
        return response($data, $status)->header('Content-Type', 'text/plain');
    }
}
