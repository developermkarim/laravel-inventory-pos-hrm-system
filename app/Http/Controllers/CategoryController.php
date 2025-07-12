<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        }
    }
}
