<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\InvestorProject;
use App\Models\Project;
use App\Models\Post;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use MehediIitdu\CoreComponentRepository\CoreComponentRepository;
use Flash;
class AboutController extends Controller
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
    public function updateStatusAbout(Request $request)
    {
        $about = About::findOrFail($request->id);
        $about->status = $request->status;
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


        return view('admin.abouts.create');
    }
   
    public function store_abouts(Request $request)

    {

        $new_about=new About;
        $new_about->user_id = Auth::user()->id;
        $new_about->question =$request->question;
        $new_about->answer =$request->answer;
        $new_about->image_id =$request->image_id;

        if($new_about->save()){

            return redirect()->back()->with('success_msg', 'Post deleted successfully');


        // $request->merge(['lang' => env('DEFAULT_LANGUAGE')]);
        // $request->merge(['car_type_id' => $car_model->car_type_id]);

        //  $brand_translation = CarBrandTranslation::firstOrNew(['lang' => $request->lang,'car_type_id' => $car_type->id]);
        //     $brand_translation->types = $request->types;
        //     $brand_translation->save();
        }
        else {
            return back();
        }
        
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
    public function all_abouts(Request $request)
    {

        $abouts = About::all();
       return view('admin.abouts.index', compact('abouts'));
    }
    
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
    
   
   

  

    public function about_edit(Request $request, $id)
    {
        $abouts = About::findOrFail($id); 
        return view('admin.abouts.about_edit', compact('abouts'));
    }
    public function about_update(Request $request,$id)
    {

            $about=About::find($id);
            $about->question=$request->question;
            $about->answer=$request->answer;
         

            if($about->update()){

                ('Status has been updated successfully');


            }else{
                ('Status hasnot been updated ');

            }

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();

    }
}
