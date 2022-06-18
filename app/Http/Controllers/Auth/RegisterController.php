<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\LegacyUi\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }
        //TO-DO ikbal
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'job_type' => $data['job_type'],
            'password' => Hash::make($data['password']),
        ]);
        $time = date('Y-m-d H:i:s');
        $last_user = DB::table('users')->latest('id')->first();
        if($data['job_type'] == 'Manager'){
            DB::insert("insert into manager (id,created_at,updated_at) values ($last_user->id,'$time','$time')");
        }else if($data['job_type'] == 'Developer'){
            DB::insert("insert into developer (id,type) values ($last_user->id,'empty')");
        }else if($data['job_type'] == 'Analyst'){
            DB::insert("insert into analyst (id,created_at,updated_at) values ($last_user->id,'$time','$time')");
        }
        return User::find($last_user->id);
    }
}
