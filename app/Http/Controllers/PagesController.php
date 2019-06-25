<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
   
    public function about(){
        $title = 'About us';
        return view('pages.about')->with('title', $title);
    }
    public function search(){
        return view('pages.search');
    }
}
