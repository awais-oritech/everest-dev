<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    public function index($name)
    {
        $pages = Page::where('name','=',$name);
        return view('site.home.page',compact('pages'));
    }
}
