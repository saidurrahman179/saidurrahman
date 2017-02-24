<?php

namespace App\Http\Controllers\font_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function __invoke(){
        return view('font_end.layout');
    }
}
