<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Validation\Rule;

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

        // dd($request->all(), $request);

        $request->name = preg_replace('/\s+/', ' ', $request->name); // long whitespace, tab or new line will be replaced single whitespace ' ' of the 3rd parameter $request->name;
        $this->validate($request, [
            'name' => [
                'max:255',
                Rule::unique('categories')->where(function ($query){
                   return $query->where('is_active', 1);
                }),
            ],
            'image' => 'image|mimes:jpg,jpeg,png,gif,webp',
            'icon' => 'mimetypes:text/plain,image/png,image/jpeg,image/svg',
        ]);

        $image = $request->image;

        if($image){

            $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date('Ymdhis');
            if(!config('database.connections.saleproaas_landlord')){

                $imageName = $imageName . '.' . $extension;
                $image->move('public/images/category' , $imageName);
            }

            else{

                $imageName = $this->getTenantId() . '_' . $imageName . '_' . $extension;
                $image->move('public/images/category', $imageName);
            }

            Image::make('public/images/category/' . $imageName)->fit(100,100)->save();
            $lims_category_data['image'] = $imageName;

        }

            $icon = $request->icon;

            if($icon){

             if(!file_exists(storage_path('publc/images/icons/'))){
                mkdir('public/images/category', 0755, true);
            }

            $iconExt = pathinfo($icon->getClientOriginalName(), PATHINFO_EXTENSION);
            $iconName = date('Ymdhis');
            if(!config('database.connections.saleprosaas_landloard')){
                $iconName = $iconName . '.'. $iconExt;
                $icon->move('public/images/category/icons/' , $iconName);
            }

            else{

                $iconName = $this->getTenantId() . '_' . $iconName . '_' .  $iconExt;
                $icon->move('public/images/category/icons/', $iconName);
            }

            Image::make('public/images/category/' . $iconName)->fit(100,100)->save();
            $lims_category_data['icon'] = $iconName;
        }

        $lims_category_data['name'] = $request->name;
        $lims_category_data['parent_id'] = $request->parent_id;
        $lims_category_data['is_active'] = true;

        if(isset($request->is_sync_disable))

            $lims_category_data['is_sync_disable'] = $request->is_sync_disable;

            if(isset($request->slug))
            $lims_category_data['slug'] = Str::slug($request->name, '-');
            $lims_category_data['featured'] = $request->featured;
            $lims_category_data['page_title'] = $request->page_title;
            $lims_category_data['short_description'] = $request->short_description;

            \DB::table('categories')->insert($lims_category_data);
            $this->cacheForget('category_list');
            return redirect('category')->with('message','Category inserted successfully');
        }

    }
