<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\Document;
use DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function delete(Request $request, $id){

        $img = DB::table('documents')->where('id', $id)->get();
        $imgname=$img[0]->title;

        File::delete($imgname);
        $imgdelete = DB::table('documents')->where('id', $id)->delete();

        return response([
            'gallery'=>$imgname
        ]);

    }

    public function view(Request $request, $id){

        $img = DB::table('documents')->where('user_id', $id)->get();

        return response([
            'gallery'=>$img
        ]);

    }
    public function store(Request $request)
    {
 
       $validator = Validator::make($request->all(), 
              [ 
              'user_id' => 'required',
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

            $document = Document::create([
                'title' => $file,
                'user_id' => $request->user_id
            ]);
              
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
  
        }
 
  
    }
}