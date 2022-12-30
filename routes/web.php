<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Models\Route as RouteList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
$pages = RouteList::all()->pluck('route_page')->toArray();
$pages = implode("|", $pages);

Route::get("/page/{_page?}/{_params?}/{_params1?}/{_params2?}", [PagesController::class, 'index'])
        ->where('_page', '('.$pages.')');
