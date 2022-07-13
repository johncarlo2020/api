<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AppleAccounts;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response,File;
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
            'status'=>'required',
            'userImage'=>'required',
            'contactNumber'=>'nullable',
            'address'=>'nullable',
        ]);
        
        // create user
        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password']),
            'type' => $attrs['type'],
            'subcription' => $attrs['subcription'],
            'status'=> $attrs['status'],
            'userImage'=> $attrs['userImage'],
            'contactNumber'=> $attrs['contactNumber'],
            'address'=> $attrs['address'],

        ]);
        //return user & token response
        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }


    //add Apple Account
    public function addAppleAccount(Request $request)
    {
        // validate fields
        $attrs = $request->validate([
            'appleID' => 'required|unique:apple_accounts,appleID',
            'email' => 'nullable',
            'name' => 'nullable',           
        ]);
        
        // create apple account
        $appleAcc = AppleAccounts::create([
            'appleID' => $attrs['appleID'],
            'email' => $attrs['email'],
            'name' => $attrs['name'],                
        ]);

        //return apple account
        return response([
            'user' => $appleAcc,            
        ]);
    }

    //get Apple Account
    public function getAppleAccount(Request $request){
       $result=DB::table('apple_accounts')->where('appleID',$request['appleID'])->get();
       return response([
        'apple_accounts' => $result
    ],200);
    }

    //update Apple Account
    public function updateAppleAccountEmail(Request $request)
    {
        // validate fields
        $attrs = $request->validate([
            'appleID'=>'required',
            'email' => 'required',            
        ]);
        
        $user = DB::table('apple_accounts')
              ->where('appleID', $attrs['appleID'])
              ->update([           
                 'email'=>$attrs['email'],         
            ]);

            return response([
                'apple_accounts' => 'success'
               
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

    //updateUser
    public function edituser(Request $request)
    {
        // validate fields
        $attrs = $request->validate([
            'id'=>'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,id',
             'contactNumber'=>'nullable',
             'address'=>'nullable'
        ]);
        
        $user = DB::table('users')
              ->where('id', $attrs['id'])
              ->update([
                 'name' => $attrs['name'],
                 'email'=>$attrs['email'],
                 'contactNumber'=> $attrs['contactNumber'],
                 'Address'=> $attrs['address']
            ]);

            return response([
                'user' => 'success'
               
            ]);
    }

    //updateProfilePicture
    public function updateProfileImage(Request $request)
    {
        $attrs = $request->validate([
            'id'=>'required',
            'file' => ['required','mimes:jpeg,jpg,png,heif'],           
        ]);
 
       $validator = Validator::make($request->all(), 
              [ 
              'id' => 'required',
              'file' => ['required','mimes:jpeg,jpg,png,heif'],

             ]);   
 
    if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
         }   
        if ($files = $request->file('file')) {
             
            //store file into document folder
            $file = $request->file->store('documents');
            $path           = 'documents';
            $file1=$request->file -> move($path, $file);  

            $user = DB::table('users')
              ->where('id', $attrs['id'])
              ->update([                
                 'userImage'=> 'https://mylastwordsadmin.online/'.$file
            ]);
              
            return response()->json([
                "success" => true,
                "message" => "Profile Image successfully uploaded",
                "file" => $file,                
            ]);
  
        }  
    }
    
    public function userlist(){
        $users=DB::table('users')->where('type', '<>','admin')->get();
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
     
        $imgs = DB::table('documents')->where('user_id', $users[0]->id)->get();
        
        return view('userpreview', compact("users","notes","imgs"));
    }
    public function deactivate($id){
        $affected = DB::update(
            'update users set status = 0 where id = ?',
            [$id]
        );
        $users=DB::table('users')->where('id',$id)->get();
        $notes=DB::table('notes')->where('userId',$users[0]->id)->get();
     
        $imgs = DB::table('documents')->where('user_id', $users[0]->id)->get();
        
        return view('userpreview', compact("users","notes","imgs"));
    }
    
}
