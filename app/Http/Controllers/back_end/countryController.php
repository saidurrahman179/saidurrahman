<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\country;
class countryController extends Controller
{
    
    public function __invoke(){
      return view('back_end\location\manageCountry');
    }
    public function sotre(Request $request){
    	
      $this->validate($request, [
            
            'country' => 'required',
            
            ]);
      			$data = new country();
                 $data->country_name = $request->country;
                 $data->status = 1;
                
                 $create = $data->save();
               
              return response()->json($create);
    }

    public function deleteController($id){
      $data =country::find($id);
      $data->delete();
      $success = 'success';
      return response()->json($success);
    }

    public function updateController(Request $request,$id){
        $this->validate($request, [
          
          'country' => 'required',
          
          ]);
      $data =country::find($id);
      $data->country_name=$request->country;
      $result = $data->update();
     return response()->json($result);
    }

    public function allCountry(){
      return country::all();
    }
}
