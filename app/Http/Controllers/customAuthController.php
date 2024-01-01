<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserValidationRequest;

class customAuthController extends Controller
{
    public function logIn(){
        return view('authentication.login');
    }
    public function registration(){
        return view('authentication.registration');
    }

    public function registerUser(UserValidationRequest $request){
        // for validation 
        // By creating form request methods
        // To create form request command: php artisan make:request UserValidationRequest
        $request->validated();

        // User::create([
        //     'name' => $request -> name,
        //     'email' => $request -> email,
        //     'password' => $request -> password,
        // ]);


        // USING try catch METHODS FOR SHOWING SUCCESS OR FAIL MESSEGE.
        try {

            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            // Success message
            return redirect('/login')->with('success', 'User registered successfully.');
        } catch (\Exception $e) {
            // Fail message
            return redirect('/registration')->with('error', 'Failed to register user. Please try again.');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => ['required','max:12','min:4'],
        ]);

        $user = User::where('email','=', $request->email)->first();

        if($user){

            if(Hash::check($request->password, $user->password)){
                // LOG IN CONDITION
                $request->session()->put('loginId', $user->id);
                return redirect('/dashboard');
            }
            else{
                return back()->with('error', 'Password is incorrect.');
            }

        }

        else{
            return back()->with('error', 'Failed to login. Please try again.');
        }
    }

    // FOR KNOWING AND ACCESSING CURRENTLY WHICH ID IS LoggedIn
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('authentication.dashboard',compact('data'));
    }

    // FOR Logout the loggedIn Id
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');

            return redirect('login');
        }
    }
}
