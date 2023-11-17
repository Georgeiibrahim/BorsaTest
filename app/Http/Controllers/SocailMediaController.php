<?php

namespace App\Http\Controllers;

use App\Http\Resources\V2\CarModelCollection;
use Carbon\Carbon;
use App\Models\carType;
use App\Models\User;
use App\Models\InvestorProject;
use App\Models\Project;
use App\Models\Post;
use App\Models\SocialMedia;

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

class SocailMediaController extends Controller
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
    public function updateStatusSocailMedia(Request $request)
    {
        $project = SocialMedia::findOrFail($request->id);
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
        return view('admin.socailmedia.create');
    }
   
    public function store_social_media(Request $request)

    {

        $new_post=new SocialMedia;
        $new_post->a_name_soical =$request->a_name_soical;
        $new_post->link_page =$request->link_page;
        if($new_post->save()){


        // $request->merge(['lang' => env('DEFAULT_LANGUAGE')]);
        // $request->merge(['car_type_id' => $car_model->car_type_id]);

        //  $brand_translation = CarBrandTranslation::firstOrNew(['lang' => $request->lang,'car_type_id' => $car_type->id]);
        //     $brand_translation->types = $request->types;
        //     $brand_translation->save();
        flash(translate('Post has been added successfully'))->success();
        }
        else {
            flash(translate('Post didnt added'))->warning();

        }
        return back();
    }

    public function all_social_media(Request $request)
    {

        $socials = SocialMedia::all();
       return view('admin.socailmedia.index', compact('socials'));
    }
    


    public function social_edit(Request $request, $id)
    {
        $medias = SocialMedia::findOrFail($id); 
        return view('admin.socailmedia.social_edit', compact('medias'));
    }
    public function social_update(Request $request,$id)
    {

            $medias=SocialMedia::find($id);
            $project->a_name_soical=$request->a_name_soical;
            $project->link_page=$request->link_page;
        //     $request->validate([
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
          
        //     $imageName = time().'.'.$request->image->extension();  
        // //    dd($imageName);
        //     $request->image->move(public_path('assets/images/projects'), $imageName);
    
        //     $project->image_link =('assets/images/projects'.'/'. $imageName);

            if($medias->update()){

                ('Status has been updated successfully');


            }else{
                ('Status hasnot been updated ');

            }

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();

    }
}
