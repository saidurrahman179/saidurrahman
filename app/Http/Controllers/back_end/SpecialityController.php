<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\speciality;
class SpecialityController extends Controller
{
    public function __invoke(){
      return view('back_end\speciality\manage_speciality');
    }
    public function sotre(Request $request){
    	
      $this->validate($request, [
            
            'specialitie' => 'required',
            
            ]);
      			$data = new speciality();
                 $data->specialitie_name = $request->specialitie;
                 $data->status = 1;
                
                 $create = $data->save();
               
              return response()->json($create);
    }

    public function deleteSpeciality($id){
      $data =speciality::find($id);
      $data->delete();
      $success = 'success';
      return response()->json($success);
    }

    public function updateSpeciality(Request $request,$id){
        $this->validate($request, [
          
          'specialitie' => 'required',
          
          ]);
      $data =speciality::find($id);
      $data->specialitie_name=$request->specialitie;
      $result = $data->update();
     return response()->json($result);
    }

    public function allSpeciality(){
      return speciality::all();
    }
    
}
