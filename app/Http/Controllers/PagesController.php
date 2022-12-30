<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index($_page='home', ...$_params)
  {
    dump($_page);
    dump($_params);
    return view('welcome');
  }
}

