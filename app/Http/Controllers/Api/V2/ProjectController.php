<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Project;
use App\Models\User;
use App\Models\InvestorProject;
use App\Models\ProjectRequest;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Country;
use App\Http\Resources\V2\ProjectCollection;
use App\Http\Resources\V2\CitiesCollection;
use App\Http\Resources\V2\StatesCollection;
use App\Http\Resources\V2\CountriesCollection;
use App\Http\Resources\V2\UserProjectCollection;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function projects()
    {
        return new ProjectCollection(ProjectDetail::where("status",1)->get());
    }

    public function user_projects(){
        return new UserProjectCollection(ProjectRequest::where('user_id', auth()->user()->id)->get());

    }
    public function project_details_by_id(Request $request){
        return new ProjectCollection(ProjectDetail::where("id",$request->id)->get());

    }
    public function delete_request(Request $request)
    {
        $project_req = ProjectRequest::find($request->id);
        if($project_req == null){
            return response()->json([
                'result' => false,
                'message' => ('there are an error no request or its already deleted,refresh the page')
            ]);
        }
        else{
        if($project_req->request_status == "confirmed"){
            return response()->json([
                'result' => false,
                'message' => "you cannot delete confirmed project, please call the support"
            ]);
        }else{
        if($project_req->delete()){

        return response()->json([
            'result' => true,
            'message' => ('request has been deleted Successfully')
        ]);
        }
        else{
            return response()->json([
                'result' => false,
                'message' => ('there are an error please try again')
            ]);
        }
    }
}
    }



    public function update_project_request_info(Request $request)
    {
        $cars = ProjectRequest::find($request->id);

        $cars->car_type = $request->car_type;
        $cars->car_model = $request->car_model;
        $cars->model_year_id = $request->model_year;
        if($cars->save())

        return response()->json([
            'result' => true,
            'message' => translate('Car info has been updated successfully')
        ]);
        else{
            return response()->json([
                'result' => false,
                'message' => translate('there are an error please try again')
            ]);
        }
    }
    public function add_user_project(Request $request){

        $user_project = new InvestorProject;
        $user_project->user_id = auth()->user()->id;
        $user_project->project_id = $request->project_id;
        
        if($user_project->save()){
            return [
                'success' => true,
                'message' => 'Project added successfully',
                'status' => 200
            ];

        }
        else{
            return [
                'success' => false,
                'message' => 'Project didnt added successfully',
                'status' => 200
            ];

        }

    }
    public function store_project_request(Request $request){
        $user_req =  ProjectRequest::where('user_id', auth()->user()->id)->where('project_id', $request->project_id)->where('request_status','pending')->first();
        // dd($user_req);
        if(!$user_req){
        $projectdet  = Project::find($request->project_id);
        // dd($projectdet);
        if($projectdet->used_stock_market_share_no >= $request->no_of_share ){
            $project_request = new ProjectRequest;
            $project_request->user_id = auth()->user()->id;
            $project_request->project_id = $request->project_id;
            $project_request->no_of_share = $request->no_of_share;
            $project_request->request_status = "pending";
            $project_request->req_type = $request->req_type;
            
            if($project_request->save()){
                $projectdet->used_stock_market_share_no = $projectdet->used_stock_market_share_no - $request->no_of_share ;
                if($projectdet ->save()){
    
                return [
                    'success' => true,
                    'message' => 'Project added successfully but still on pending',
                    'status' => 200
                ];
            }
            else{
                return [
                    'success' => false,
                    'message' => 'Project didnt added successfully, SomeThing Went Wrong',
                    'status' => 200
                ];
            }
        }
    
       
        else{
            return [
                'success' => false,
                'message' => 'Project didnt added successfully',
                'status' => 200
            ];

        }

    }
    else{
        return [
            'success' => false,
            'message' => 'Project cannot be added please choose suitable number of shares',
            'status' => 200
        ];
    }
}
else{
    return [
        'success' => false,
        'message' => 'You Already add you share in this project before',
        'status' => 200
    ];
}

    
}
public function sell_project(){


}

public function edit_request(){

    
}



//store the building to be in our database
public function store_project_request_cust(Request $request){
    
    $project_details_new_proj = new ProjectDetail;
    $project_details_new_proj->user_id =  Auth::user()->id;
    $project_details_new_proj->p_name =  $request->p_name;
    $project_details_new_proj->buliding_type = $request->buliding_type  ;
    $project_details_new_proj->country =  $request->country ;
    $project_details_new_proj->government =  $request->government ;
    $project_details_new_proj->area =  $request->area;
    $project_details_new_proj->district =  $request->district;
    $project_details_new_proj->street =  $request->street ;
    $project_details_new_proj->building_no =  $request->building_no;
    $project_details_new_proj->apartment_no =  $request->apartment_no ;
    $project_details_new_proj->floor =  $request->floor ;
    $project_details_new_proj->image_link =  $request->image_link;
    $project_details_new_proj->project_price =  $request->project_price;
    $project_details_new_proj->p_description =  $request->p_description;

    if($project_details_new_proj->save()){
    return [
        'success' => true,
        'message' => 'You request added',
        'status' => 200
    ];
   }else
   {
    return [
        'success' => false,
        'message' => 'something went wrong',
        'status' => 200
    ];
   }



}

public function getCities()
    {
        return new CitiesCollection(City::where('status', 1)->get());
    }

    public function getStates()
    {
        return new StatesCollection(State::where('status', 1)->get());
    }

    public function getCountries(Request $request)
    {
        $country_query = Country::where('status', 1);
        if ($request->name != "" || $request->name != null) {
             $country_query->where('name', 'like', '%' . $request->name . '%');
        }
        $countries = $country_query->get();
        
        return new CountriesCollection($countries);
    }

    public function getCitiesByState($state_id,Request $request)
    {
        $city_query = City::where('status', 1)->where('state_id',$state_id);
        if ($request->name != "" || $request->name != null) {
             $city_query->where('name', 'like', '%' . $request->name . '%');
        }
        $cities = $city_query->get();
        return new CitiesCollection($cities);
    }

    public function getStatesByCountry($country_id,Request $request)
    {   
        $state_query = State::where('status', 1)->where('country_id',$country_id);
        if ($request->name != "" || $request->name != null) {
            $state_query->where('name', 'like', '%' . $request->name . '%');
       }
        $states = $state_query->get();
        return new StatesCollection($states);
    }

}
