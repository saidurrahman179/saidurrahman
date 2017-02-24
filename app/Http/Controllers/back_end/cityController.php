<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\city;
use DB;
class cityController extends Controller
{
    public function __invoke(){
      return view('back_end\location\manageCity');
    }
    public function sotre(Request $request){
    	
      $this->validate($request, [
            
            'country' => 'required',
            'city' => 'required',
            
            ]);
      			$data = new city();
                 $data->country_id = $request->country;
                 $data->city_name = $request->city;
                 $data->status = 1;
                 $create = $data->save();
               
              return response()->json($create);
    }

    public function deleteCity($id){
      $data =city::find($id);
      $data->delete();
      $success = 'success';
      return response()->json($success);
    }

    public function updateController(Request $request,$id){
        $this->validate($request, [
          
          'city' => 'required',
          'country' => 'required',
          
          ]);
       
      $data =city::find($id);
      $data->country_id = $request->country;
      $data->city_name = $request->city;
      $result = $data->update();
     return response()->json($result);
    }

    public function allCity(){
      
     
      $data = DB::table('cities')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
           
            ->select('cities.*', 'countries.country_name')
            ->get();
       return response()->json($data);     
    }
}
