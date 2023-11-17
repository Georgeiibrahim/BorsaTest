<?php

namespace App\Http\Controllers;

use App\Http\Resources\V2\CarModelCollection;
use Carbon\Carbon;
use App\Models\carType;
use App\Models\User;
use App\Models\InvestorProject;
use App\Models\Project;
use App\Models\Post;
use App\Models\Category;

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

class CategoriesController extends Controller
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


        return view('backend.categories.create');
    }
    
    public function store_categorys(Request $request)

    {

        $new_category=new Category;
        // $new_project->user_id = Auth::user()->id;
        $new_category->c_name =$request->c_name;
        $new_category->c_description =$request->c_description;
        if($new_category->save()){


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
    public function all_categorys(Request $request)
    {

        $categorys = Category::all();
       return view('backend.categories.index', compact('categorys'));
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
        $product = Project::findOrFail($id)->delete();

            flash(translate('car has been deleted successfully'))->success();

            Artisan::call('view:clear');
            Artisan::call('cache:clear');

            return back();
    }
  

    public function getmodel(Request $request) {
        $cars = carModel::where('status',1)->where('car_type', $request->car_type_id)->get();
        $html = '<option value="">'.translate("Select State").'</option>';

        foreach ($cars as $car) {
            $html .= '<option value="' . $car->id . '">' . $car->getTranslation('carModel') . '</option>';
        }

        echo json_encode($html);
    }
    public function car_brand_edit(Request $request, $id)
    {
        $brand = carType::findOrFail($id);
        // if ($product->digital == 1) {
        //     return redirect('digitalproducts/' . $id . '/edit');
        // }
        $lang = $request->lang;
        // dd($brand,$lang);

        // $tags = json_decode($brand->);
        // $categories = Category::all();
        // $categories = Category::where('parent_id', 0)
        //     ->where('digital', 0)
        //     ->with('childrenCategories')
        //     ->get();

        return view('backend.cars.brand_edit', compact('brand','lang'));
    }

    public function car_model_edit(Request $request, $id)
    {
        $model = carModel::findOrFail($id);
        // if ($product->digital == 1) {
        //     return redirect('digitalproducts/' . $id . '/edit');
        // }
        $lang = $request->lang;
        // dd($brand,$lang);

        // $tags = json_decode($brand->);
        // $categories = Category::all();
        // $categories = Category::where('parent_id', 0)
        //     ->where('digital', 0)
        //     ->with('childrenCategories')
        //     ->get();

        return view('backend.cars.model_edit', compact('model','lang'));
    }



    public function brand_update(Request $request,$id)
    {

            $car_brand=carType::find($id);
            $car_brand->types=$request->input('name');
            $car_brand->update();
            $request->merge(['car_type_id' => $car_brand->id]);

            // CarBrandTranslation::firstOrNew(
            //     $request->only([
            //         'lang', 'car_type_id'
            //     ]),
            //     $request->only([
            //         'name'
            //     ])
            // );


            $brand_translation = CarBrandTranslation::firstOrNew(['lang' => $request->lang, 'car_type_id' => $id]);
            $brand_translation->types = $request->name;
            $brand_translation->save();
        flash(translate('Brand has been updated successfully'))->success();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();

    }
}
