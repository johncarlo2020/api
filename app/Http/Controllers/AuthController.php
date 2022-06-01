<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
    //Register User
    public function register(Request $request)
    {
        // validate fields
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'type' => 'required',
            'subcription' => 'required',
            'status'=>'required'
        ]);
        // create user
        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password']),
            'type' => $attrs['type'],
            'subcription' => $attrs['subcription'],
            'status'=> $attrs['status']
        ]);
        //return user & token response
        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }

    // Login User
    public function login(Request $request)
    {
        // validate fields
        $attrs = $request->validate([            
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // attempt login
        if(!Auth::attempt($attrs))
        {
            return response([
                'message' => 'invalid credentials'
            ], 403);
        }
        
        //return user & token response
        return response([            
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);
    }
    
    //Logout User
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout success.'
        ],200);
    }

    //get user details
    public function user()
    {
        return response([
            'user' => auth()->user()
        ],200);
    }

    public function userlist(){
        $users=DB::table('users')->where('type','user')->get();
        return view('dashboard', compact("users"));
    }
    public function userpreview($id){
        $users=DB::table('users')->where('id',$id)->get();
        $notes=DB::table('notes')->where('userId',$users[0]->id)->get();
     
        return view('userpreview', compact("users","notes"));
    }
    public function activate($id){

        $affected = DB::update(
            'update users set status = 1 where id = ?',
            [$id]
        );
        $users=DB::table('users')->where('id',$id)->get();
        $notes=DB::table('notes')->where('userId',$users[0]->id)->get();
     
        return view('userpreview', compact("users","notes"));
    }
    public function deactivate($id){
        $affected = DB::update(
            'update users set status = 0 where id = ?',
            [$id]
        );
        $users=DB::table('users')->where('id',$id)->get();
        $notes=DB::table('notes')->where('userId',$users[0]->id)->get();
     
        return view('userpreview', compact("users","notes"));
    }
    
}
