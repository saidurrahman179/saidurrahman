<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\area;
use App\city;
use DB;
class areaController extends Controller
{
    public function __invoke(){
      return view('back_end\location\manageArea');
    }
    public function sotre(Request $request){
    	
      $this->validate($request, [
            
            'country' => 'required',
            'city' => 'required',
            'area' => 'required',
            
            ]);
      			$data = new area();
                 $data->country_id = $request->country;
                 $data->city_id = $request->city;
                 $data->area_name = $request->area;
                 $data->status = 1;
                 $create = $data->save();
               
              return response()->json($create);
    }

    public function deleteArea($id){
      $data =area::find($id);
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

    public function allArea(){
      
      $data = DB::table('areas')
            ->join('countries', 'areas.country_id', '=', 'countries.id')
            ->join('cities', 'areas.city_id', '=', 'cities.id')
            ->select('areas.*', 'countries.*', 'cities.*')
            ->get();


      
       return response()->json($data);     
    }

    public function selectCity($id){
      

      $data = city::where('country_id',$id)->get();
      return response()->json($data);     
    }
}
