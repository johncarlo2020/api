<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use DateTime;



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
        $today = date('Y-m-d H:i:s');

        for($a=0;$a<count($users);$a++){
            $id=$users[$a]->id;
            $logs=DB::select("SELECT * FROM user_logs where user_id=$id order by id desc limit 1");
            if($logs==null){
                $tinterval='inactive';
            }else{
                $date=$logs[0]->date.' '.$logs[0]->time;
                $first_datetime = new DateTime($today);
                $last_datetime = new DateTime($date);
                $interval = $first_datetime->diff($last_datetime);
                $final_days = $interval->format('%a');
                if($final_days==0){
                $final_hours=$interval->format('%h');
                $final_minute=$interval->format('%i');
                $final_sec=$interval->format('%s');

                if($final_hours==0){
                    if($final_minute==0){
                        $tinterval=' just now';

                    }else if($final_minute==1){
                        $tinterval=$final_minute.' min ago';

                    }else{
                        $tinterval=$final_minute.' mins ago';

                    }
                }else if($final_hours==1){
                   
                    $tinterval=$final_hours.' hour ago';

                }else{
                    $tinterval=$final_hours.' hours ago';
                }

            }else if($final_days==1){
                $tinterval=$final_days.' day ago';
                
            }else{
                $tinterval=$final_days.' days ago';

            }
            }
            
            
            
          $users[$a]->interval=$tinterval;
        }
        return view('home', compact("users"));
    }
    public function userpreview($id){
        $users=DB::table('users')->where('id',$id)->get();
        $notes=DB::table('notes')->where('userId',$users[0]->id)->get();

        $imgs = DB::table('documents')->where('user_id', $users[0]->id)->get();
        
        return view('userpreview', compact("users","notes","imgs"));
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
