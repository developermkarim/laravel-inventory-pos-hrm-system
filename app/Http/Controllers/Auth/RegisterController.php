<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function register(){

        return view('auth.register');
    }

/*     public function validator(array $data){

        return Validator::make($data , [
            'name' => 'required|string|max:255|unique:users',
            'email' => [
                'max:255',
                'email',
                Rule::unique('users')->where(function ($query){
                    return $query->where('deleted_at' , false);
                })
            ],

            'password'=>'required|string|confirmed',
        ]);
    } */

    public function registerCreate(RegisterRequest $request) {

         $data = $request->validated();
        //  dd($data) ;

       $user = User::create([
            'name' =>  $data['name'],
            'email' => $data['email'],
            'password' =>  Hash::make($data['password'])
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Account Created Successfully');
    }

    protected function create(array $data): Model|User{


        $data['is_active'] = false;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
/*             'phone' => $data['phone_number'],
            'company_name' => $data['company_name'],
            'role_id' => $data['role_id'],
            'biller_id' => $data['biller_id'],
            'warehouse_id' => $data['warehouse_id'],
            'is_active' => $data['is_active'], */
            // 'is_deleted' => false,
            'password' => bcrypt($data['password']),
        ]);

        if($data['role_id'] == 5){
            $data['name'] = $data['customer_name'];
            $data['user_id'] = $user->id;
            Customer::create($data);
        }

        return $user;
    }
}
