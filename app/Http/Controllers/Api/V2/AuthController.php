<?php

/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api\V2;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Hash;
use GeneaLabs\LaravelSocialiter\Facades\Socialiter;
use Socialite;
use App\Notifications\AppEmailVerificationNotification;



class AuthController extends Controller
{
    public function signup(Request $request)
    {

        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'result' => false,
                'message' => 'User already exists.',
                'user_id' => 0
            ], 201);

        }

        // if ($request->register_by == 'email') {
            $user = new User([
                'role' => $request->role,
                'first_name' => $request->first_name,
                'middle_name'=> $request->middle_name,
                'last_name'=> $request->last_name,
                'mother_first_name' => $request->mother_first_name,
                'nationality' => $request->nationality,
                'id_passport_number' => $request->id_passport_number,
                'birth_date' => $request->birth_date,
                'age' => $request->age,
                'gender' => $request->gender,
                'military_status' => $request->military_status,
                'religion' => $request->religion,
                'martial_status' => $request->martial_status,
                'number_of_dependencies' => $request->number_of_dependencies,
                'type_of_residence' => $request->type_of_residence,
                'number_of_apartment' => $request->number_of_apartment,
                'number_of_level' => $request->number_of_level,
                'number_of_building' => $request->number_of_building,
                'nearest_landmark' => $request->nearest_landmark,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'first_phone_number' => $request->first_phone_number,
                'second_phone_number' => $request->second_phone_number,
                'password' => bcrypt($request->password),
                'verification_code' => rand(100000, 999999),
                'postal_code' => $request->postal_code,
                'acadmic_degree' => $request->acadmic_degree,
                'awarding_year' => $request->awarding_year,
                'faculty' => $request->faculty,
                'university' => $request->university,
                'job_type' => $request->job_type,
                'job_title' => $request->job_title,
                'emplyoment_year' => $request->emplyoment_year


            
            ]);
           
        if ($user->email_verified_at == null) {

                $user->notify(new AppEmailVerificationNotification());
            
        }
        // $user->email_verified_at = date('Y-m-d H:m:s');
        $user->save();

//create token
         $token = $user->createToken('tokens')->plainTextToken;
  
        return response()->json([
            'result' => true,
            'message' => 'Registration Successful. Please verify and log in to your account.',
            'user_id' => $user->id,
            'token' => $token 
        ], 201);
    }

    public function code_verfication(Request $request){
        $iterator = 0;
        $ver_code =  User::where('verification_code', $request->code_verfication)->get();
        foreach ($ver_code as $key => $code){
            $iterator =$iterator + 1;
        }

        // dd($ver_code);
        if($iterator == 0 || $iterator > 1 ){
            return response()->json([
                'result' => false,
                'message' => ('Something went wrong'),
                'status' => 200

            ]);
        }
        else{
            $code =  User::where('verification_code', $request->code_verfication)->first();

            if($code->email_verified_at == null){
                $code->email_verified_at = date('Y-m-d H:m:s');
                if($code->update()){

                    return response()->json([
                        'result' => true,
                        'message' => ('Email Verfied Successfully'),
                        'status' => 200
        
                    ]); 
                }
                return response()->json([
                    'result' => false,
                    'message' => ('something went wrong'),
                    'status' => 200
    
                ]); 
                }
            // }
            else{
                return response()->json([
                    'result' => true,
                    'message' => ('Email Already Verfied'),
                    'status' => 200
    
                ]); 
            }
        }


    }
    public function login(Request $request)
    {
        $user = $request->has('role') && $request->role == '0';
    
        // dd($user);
        if ($user) {
            $user = User::whereIn('role', ['0'])
                ->where('email', $request->email)
                ->first();
        }else {
            $user = null;
        }
        if ($user != null) {

            if(!$user->banned){
                if (Hash::check($request->password, $user->password)) {
                    if ($user->email_verified_at == null) {
                        return response()->json(['result' => false, 'message' => ('Please verify your account'), 'user' => null], 401);
                    }
                    return $this->loginSuccess($user);
                }
                else {
                    return response()->json(['result' => false, 'message' => ('Unauthorized'), 'user' => null], 401);
                }
            }
            else{
                return response()->json(['result' => false, 'message' => ('User is banned'), 'user' => null], 401);
            }
        }
        else {
            return response()->json(['result' => false, 'message' => ('User not found'), 'user' => null], 401);
        }

    }
    

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {

        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'result' => true,
            'message' => ('Successfully logged out'),
            
        ]);
    }
    
    protected function loginSuccess($user)
    {
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json([
            'result' => true,
            'message' => ('Successfully logged in'),
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => null,
            'user' => [
                'id' => $user->id,
                'type' => $user->role,
                'name' => $user->username,
                'email' => $user->email,
                // 'phone' => $user->phone
            ]
        ]);
    }
    
}
