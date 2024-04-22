<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //This conttroler is for display the Pages
    public function index()
    {
        return view('admin.index');
    }
}
