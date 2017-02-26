<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\doctor;
use DB;
class doctorController extends Controller
{
     public function __invoke(){

     	//return "Success";
       return view('back_end\doctor\manageDoctor');
    }

    public function sotre(Request $request){
    	 $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'interests' => 'required',
            'short_discription' => 'required',
            'discription' => 'required',
            'country' => 'required',
            'city' => 'required',
            'area' => 'required',
            'speciality' => 'required',
            'status' => 'required',
            'picture' => 'required|mimes:jpeg,png,jpg',
            
        ]);

    	 $image=$request->file('picture');
        
            $file_name=$image->getClientOriginalName();
            $random = str_random(80);
            $image_full_name=$random.$file_name;
            $path="uploads/doctor/img";
            $success=$image->Move($path, $image_full_name);
            if($success){
                 $data = new doctor();
                 $data->name = $request->name;
                 $data->designation = $request->designation;
                 $data->address = $request->address;
                 $data->education = $request->education;
                 $data->professional_experience = $request->experience;
                 $data->special_interests = $request->interests;
                 $data->short_discription = $request->short_discription;
                 $data->discription = $request->discription;
                 $data->country_id = $request->country;
                 $data->city_id = $request->city;
                 $data->area_id = $request->area;
                 $data->speciality_id = $request->speciality;
                 $data->status = $request->status;
            
                 $data->picture =$image_full_name;
                $create = $data->save();
               
              return response()->json($create);
            }
    }

    public function allDoctor(){
    	 $data = DB::table('doctors')
            ->join('countries', 'doctors.country_id', '=', 'countries.id')
            ->join('cities', 'doctors.city_id', '=', 'cities.id')
           	->join('areas', 'doctors.area_id', '=', 'areas.id')
            ->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
            ->select('doctors.*', 'countries.*', 'cities.*', 'areas.*', 'specialities.*')
            ->get();


      
       return response()->json($data); 
    }
}
