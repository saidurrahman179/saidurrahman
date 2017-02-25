<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class doctorController extends Controller
{
     public function __invoke(){

     	//return "Success";
       return view('back_end\doctor\manageDoctor');
    }

    public function sotre(Request $request){
    	dd($request->all());
    }
}
