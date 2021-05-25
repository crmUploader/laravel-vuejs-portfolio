<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
route::get('/skills',[SkillController::class,'index']);

route::prefix('/skill')->group(function(){
    route::get('/{id}',    [SkillController::class,'show']);
    route::post('/store',  [SkillController::class,'store']);
    route::put('/{id}',    [SkillController::class,'update']);
    route::delete('/store',[SkillController::class,'destroy']);
    
});

route::prefix('/web')->group(function(){
    route::get('/',    [SettingsController::class,'show']);
});

route::prefix('/work')->group(function(){
    route::get('/',    [WorkController::class,'show']);
});

route::prefix('/contact')->group(function(){
    route::post('/',    [ContactController::class,'update_store']);
    route::post('/{id}',    [ContactController::class,'update_store']);
    route::get('/get_contacts',[ContactController::class,'get_contacts']);
    route::get('/get_contacts/{id}',[ContactController::class,'get_contacts']);
    route::delete('/delete/{id}',[ContactController::class,'delete']);
});


