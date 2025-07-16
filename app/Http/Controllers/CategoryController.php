<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{


    public function index(){

       /* I will do it uncomment when Role and permission completed

       $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('category')){
            return view('backend.category.create');
        }
        else

        return redirect()->back()->with('not_permitted, Sorry! You are not allowed to access this module'); */

        return view("backend.category.create");
    }

    public function categoryData(Request $request){
        $columns = [
            0 => 'id',
            2 => 'name',
            3 => 'parent_id',
            4 => 'is_active',
        ];
    }


    public function store(Request $request){

      $lims_category_data = [];

   $name = preg_replace('/\s+/', ' ', $request->name);

$validator = \Validator::make($request->all(), [
    'name' => [
        'required',
        'max:255',
        Rule::unique('categories')->where(fn ($q) => $q->where('is_active', 1)),
    ],
    'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
    // 'icon' => 'mimetypes:text/plain,image/png,image/jpeg,image/svg',
]);



    if($validator->fails()){
        // dd($validator->errors());
        return redirect()->back()->withErrors($validator)->withInput();

    }


$isLandlord = config('database.default') === 'saleprosaas_landlord';

if ($request->hasFile('image')) {
    $image = $request->file('image');
    $extension = $image->getClientOriginalExtension();
    $imageName = $isLandlord
        ? $this->getTenantId() . '_' . date('Ymdhis') . '.' . $extension
        : date('Ymdhis') . '.' . $extension;
    $image->move(public_path('images/category'), $imageName);
    Image::make(public_path('images/category/' . $imageName))->fit(100, 100)->save();
    $lims_category_data['image'] = $imageName;
}


if ($request->hasFile('icon')) {
    if (!file_exists(public_path('images/category/icons'))) {
        mkdir(public_path('images/category/icons'), 0755, true);
    }
    $icon = $request->file('icon');
    $iconExt = $icon->getClientOriginalExtension();
    $iconName = $isLandlord
        ? $this->getTenantId() . '_' . date('Ymdhis') . '.' . $iconExt
        : date('Ymdhis') . '.' . $iconExt;

    $icon->move(public_path('images/category/icons'), $iconName);

    Image::make(public_path('images/category/icons/' . $iconName))->fit(100, 100)->save();
    $lims_category_data['icon'] = $iconName;
}

$lims_category_data['name'] = $name;
$lims_category_data['parent_id'] = $request->parent_id;
$lims_category_data['is_active'] = true;


if ($request->has('is_sync_disable')) {
    $lims_category_data['is_sync_disable'] = $request->is_sync_disable;
}

if ($request->filled('slug')) {
    $lims_category_data['slug'] = Str::slug($name, '-');
    $lims_category_data['featured'] = $request->featured;
    $lims_category_data['page_title'] = $request->page_title;
    $lims_category_data['short_description'] = $request->short_description;
}

try {
    $inserted = DB::table('categories')->insert($lims_category_data);
    if (!$inserted) {
        dd('Insert failed', );
    }
} catch (\Exception $e) {

    $this->cacheForget('category_list');
    
    // dd('Insert error', $e->getMessage());
}

return redirect('category')->with('message', 'Category inserted Successfully');

 }


}
