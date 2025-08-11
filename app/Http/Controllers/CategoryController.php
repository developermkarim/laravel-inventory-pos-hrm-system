<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        // dd($request->all());

        $columns = [
            0 => 'id',
            2 => 'name',
            3 => 'parent_id',
            4 => 'is_active',
        ];

        $totalData = DB::table('categories')->where('is_active', true)->count();

        $totalFiltered = $totalData;

        if($request->input('length') != -1){
            $limit = $request->input('length');
        }else{
            $limit = $totalData;
        }

        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        // dd($order, $dir);

        if(empty($request->input('search.value'))){

            $categories = Category::offset($start)
                            ->where('is_active', true)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();
        }
        else{

            $search = $request->input('search.value');
            $categories = Category::where([
                ['name', 'LIKE' , "%{$search}%"],
                ['is_active', true]
            ])->offset($start)
             ->limit($limit)
             ->orderBy($order, $dir)
             ->get();

            $totalFiltered = Category::where([
               [ 'name' , 'LIKE', "%{$search}%"],
               ['is_active' , true]
            ])->count();
        }

        $data = [];

        if(!empty($categories)){

            foreach($categories as $key => $category){

                $nestedData['id'] = $category->id;
                $nestedData['key'] = $key;

                if($category->image){
                    $nestedData['name'] = "<img src='". url('images/category' , $category->image) ."' height='80' width='80'/>" . $category->name;

                }else{
                    $nestedData['name'] = "<img src='".url('images/zummXD2dvAtI.png')."' height='80' width='80' />" . $category->name;
                }

                if($category->parent_id){
                    $nestedData['parent_id'] = Category::find($category->parent_id)->name;
                }else{
                    $nestedData['parent_id'] = 'N/A';
                }

                $nestedData['number_of_product'] = $category->product()->where('is_active', true)->count();
                $nestedData['stock_qty'] = $category->product()->where('is_active', true)->sum('qty');

                $totalPrice = $category->product()->where('is_active', true)->sum(DB::raw('price * qty'));
                $totalCost = $category->product()->where('is_active' , true)->sum(DB::raw('cost * qty'));

                if(config('currency_positon') == 'prefix')
                $nestedData['stock_worth'] = config('currency_position') . ' ' . $totalPrice . ' / ' . config('currency_positon') . ' ' . $totalCost;

                else
                $nestedData['stock_worth'] = $totalPrice . ' ' . config('currency_position') . ' / ' . $totalCost . ' ' . config('currency_position');


                $nestedData['options'] = '<div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trans("file.action").'
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                <button type="button" data-id="'. $category->id .'" class="open-EditCategoryDialog btn btn-link" data-toggle="modal" data-target="#editModal" ><i class="dripicons-document-edit"></i>
                                '.trans('file.edit').'
                                </button>
                                </li>

                                <li class="divider"></li>
                                 '. \Form::open(['route' => ['category.destroy', $category->id] , 'method' => "DELETE"]) .'
                                <li>
                                <button type="submit" class="btn btn-link" onclick="return confirmDelete()"></button>
                                </li>' .
                                \Form::close() .
                                '</ul>
                                </div>'
                                ;

                                $data[] = $nestedData;
            }
        }

        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data'          => $data,
        ];

        // dd($json_data);
        echo json_encode($json_data);

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
