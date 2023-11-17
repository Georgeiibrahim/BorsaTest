<?php

namespace App\Http\Controllers;

use App\Http\Resources\V2\CarModelCollection;
use Carbon\Carbon;
use App\Models\carType;
use App\Models\User;
use App\Models\InvestorProject;
use App\Models\Project;
use App\Models\ProjectRequest;
use App\Models\ProjectDetail;
use App\Models\Country;
use App\Models\State;
use App\Models\CarUser;
use App\Models\Product;
use App\Models\carModel;
use App\Models\oilChoice;
use Illuminate\Http\Request;
use App\Models\CarBrandTranslation;
use App\Models\CarModelTranslation;
use App\Models\oil_history_changes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use MehediIitdu\CoreComponentRepository\CoreComponentRepository;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function updateStatusProject(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->status = $request->status;
        if ($project->save()) {
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            return 1;
        }
        return 0;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.projects.create');
    }

    public function add_user_project()
    {

        $projects = Project::all();  
        $users = User::where('user_type','investor')->get();  

           return view('backend.projects.add_user_project',compact('users','projects'));
    }
    public function store_project(Request $request)

    {

        // $new_project=new Project;
        // $new_project->user_id = Auth::user()->id;
        // $new_project->p_name =$request->p_name;
        // $new_project->p_descriptin =$request->p_description;
        // $new_project->stock_market_share_no =$request->stock_market_share_no;
        // $new_project->used_stock_market_share_no =$request->stock_market_share_no;
        
        // $new_project->p_price =$request->p_price;
        $new_project = new ProjectDetail;
        $new_project->user_id =  Auth::user()->id;
        $new_project->p_name =  $request->p_name;
        $new_project->buliding_type = $request->buliding_type  ;
        $new_project->country =  $request->country ;
        $new_project->government =  $request->government ;
        $new_project->area =  $request->area;
        $new_project->district =  $request->district;
        $new_project->street =  $request->street ;
        $new_project->building_no =  $request->building_no;
        $new_project->apartment_no =  $request->apartment_no ;
        $new_project->floor =  $request->floor ;
        $new_project->image_link =  $request->image_link;
        $new_project->project_price =  $request->project_price;
        $new_project->p_description =  $request->p_description;
        $new_project->no_of_shares =  $request->no_of_shares;
        $new_project->calcutaion_shares =  $request->no_of_shares;
        

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $imageName = time().'.'.$request->image->extension();  
    //    dd($imageName);
        $request->image->move(public_path('assets/images/projects'), $imageName);

        $new_project->image_link =('assets/images/projects'.'/'. $imageName);
        if($new_project->save()){


        // $request->merge(['lang' => env('DEFAULT_LANGUAGE')]);
        // $request->merge(['car_type_id' => $car_model->car_type_id]);

        //  $brand_translation = CarBrandTranslation::firstOrNew(['lang' => $request->lang,'car_type_id' => $car_type->id]);
        //     $brand_translation->types = $request->types;
        //     $brand_translation->save();
       ('Project has been added successfully');
        }
        else {
            ('Project didnt added');

        }
        return back();
    }
    public function getStates(Request $request) {
        $states = State::where('status', 1)->where('country_id', $request->country)->get();
        $html = '<option value="">'.translate("Select State").'</option>';

        foreach ($states as $state) {
            $html .= '<option value="' . $state->id . '">' . $state->name . '</option>';
        }

        echo json_encode($html);
    }
    public function store_user_project(Request $request)

    {

        $add_project_user=new InvestorProject;
        // $new_project->user_id = Auth::user()->id;
        $add_project_user->project_id =$request->project_id;
        $add_project_user->user_id =$request->user_id;
        // $add_project_user->price =$request->price_invested;

        if($add_project_user->save()){


        // $request->merge(['lang' => env('DEFAULT_LANGUAGE')]);
        // $request->merge(['car_type_id' => $car_model->car_type_id]);

        //  $brand_translation = CarBrandTranslation::firstOrNew(['lang' => $request->lang,'car_type_id' => $car_type->id]);
        //     $brand_translation->types = $request->types;
        //     $brand_translation->save();
        ('Project has been added to user successfully');
        }
        else {
            ('Project didnt added');
        }
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function all_projects(Request $request)
    {

        $projects = ProjectDetail::all();
       return view('admin.projects.index', compact('projects'));
    }

    // public function showwall(Request $request)
    // {
    //     $sort_search =null;
    //     $brands = Brand::orderBy('name', 'asc');
    //     if ($request->has('search')){
    //         $sort_search = $request->search;
    //         $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
    //     }
    //     $brands = $brands->paginate(15);
    //     return view('backend.product.brands.index', compact('brands', 'sort_search'));
    // }
    public function all_projects_requests(Request $request)
    {

        $project_requests = ProjectRequest::all();
       return view('admin.projects.show_project_request', compact('project_requests'));
    }
    // public function all_new_projects_requests(Request $request)
    // {

    //     $project_requests = ProjectRequest::all();
    //    return view('admin.projects.show_project_request', compact('project_requests'));
    // }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function car_brand_delete($id)
    {
        $product = Project::findOrFail($id)->delete();

            flash(translate('car has been deleted successfully'))->success();

            Artisan::call('view:clear');
            Artisan::call('cache:clear');

            return back();
    }
  

 

    ///// UPDATE REQUEST
    public function project_request_edit(Request $request, $id)
    {
        $requests = ProjectRequest::findOrFail($id); 
        return view('admin.projects.project_req_edit', compact('requests'));
    }
/// UPDATE PROJECT DETAILS
    public function project_edit(Request $request, $id)
    {
        $projects = ProjectDetail::findOrFail($id); 
        return view('admin.projects.project_edit', compact('projects'));
    }

  



    public function request_update(Request $request,$id)
    {

            $project_request=ProjectRequest::find($id);
            if($request->new_status == "confirmed"){
                "You Cannot Update Confirmed requests";
            }
            else{
            $project_request->request_status=$request->new_status;
            if($project_request->update()){

                ('Status has been updated successfully');


            }else{
                ('Status hasnot been updated ');

            }

        Artisan::call('view:clear');
        Artisan::call('cache:clear');
    }
        return back();

    }

    public function project_update(Request $request,$id)
    {

        $new_project=ProjectDetail::find($id);
        $new_project->user_id =  Auth::user()->id;
        $new_project->p_name =  $request->p_name;
        $new_project->buliding_type = $request->buliding_type  ;
        $new_project->country =  $request->country ;
        $new_project->government =  $request->government ;
        $new_project->area =  $request->area;
        $new_project->district =  $request->district;
        $new_project->street =  $request->street ;
        $new_project->building_no =  $request->building_no;
        $new_project->apartment_no =  $request->apartment_no ;
        $new_project->floor =  $request->floor ;
        $new_project->image_link =  $request->image_link;
        $new_project->project_price =  $request->project_price;
        $new_project->p_description =  $request->p_description;
        $new_project->no_of_shares =  $request->no_of_shares;
        $new_project->calcutaion_shares =  $request->no_of_shares;
        $new_project->req_status =  $request->req_status;
        $new_project->market_share_price =  $request->market_share_price;

            $new_project->update();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
          
            $imageName = time().'.'.$request->image->extension();  
        //    dd($imageName);
            $request->image->move(public_path('assets/images/projects'), $imageName);
    
            $new_project->image_link =('assets/images/projects'.'/'. $imageName);

            if($new_project->update()){

                ('Status has been updated successfully');


            }else{
                ('Status hasnot been updated ');

            }

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();

    }
}
