<?php

namespace App\Http\Controllers;

use App\Http\Resources\V2\CarModelCollection;
use Carbon\Carbon;
use App\Models\carType;
use App\Models\User;
use App\Models\InvestorProject;
use App\Models\Project;
use App\Models\Post;

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

class PostController extends Controller
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
    public function updateStatusPost(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->status = $request->status;
        if ($post->save()) {
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


        return view('admin.posts.create');
    }
 
    public function store_posts(Request $request)

    {

        $new_post=new Post;
        // $new_project->user_id = Auth::user()->id;
        $new_post->post_title =$request->post_title;
        $new_post->description =$request->description;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $imageName = time().'.'.$request->image->extension();  
    //    dd($imageName);
        $request->image->move(public_path('assets/images/posts'), $imageName);

        $new_post->image_link =('assets/images/posts'.'/'. $imageName);
        if($new_post->save()){
        flash(translate('Post has been added successfully'))->success();
        }
        else {
            flash(translate('Post didnt added'))->warning();

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
    public function all_post(Request $request)
    {

        $posts = Post::all();
       return view('admin.posts.index', compact('posts'));
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
    
    public function car_brand_delete($id)
    {
        $post = Post::findOrFail($id)->delete();

            flash(('car has been deleted successfully'))->success();

            Artisan::call('view:clear');
            Artisan::call('cache:clear');

            return back();
    }
  
    public function post_edit(Request $request, $id)
    {
        $posts = Post::findOrFail($id); 
        return view('admin.posts.edit', compact('posts'));
    }
    public function post_update(Request $request,$id)
    {
         
            $post=Post::find($id);
            $post->post_title=$request->post_title;
            $post->description=$request->description;
            $post->update();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();  
        //    dd($imageName);
            $request->image->move(public_path('assets/images/posts'), $imageName);
    
            $post->image_link =('assets/images/posts'.'/'. $imageName);

            if($post->update()){

                ('Status has been updated successfully');


            }else{
                ('Status hasnot been updated ');

            }

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();

    }
}
