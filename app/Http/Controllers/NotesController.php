<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    //
    public function addNotes(Request $request){

       
        $attrs = $request->validate([
            'userId'=> 'required|integer',
            'title' => 'required|string',
            'body' => 'required|string',
            'instructions' => 'required|string',
            'contact' => 'required|string'

            
        ]);

        $note = Notes::create([
            'userId' => $attrs['userId'],
            'title' => $attrs['title'],
            'body' => $attrs['body'],
            'instructions' => $attrs['instructions'],
            'contact' => $attrs['contact']

        ]);

        return response([
            'notes'=>$note
        ]);
    }

    public function getNotes($id){
        $note = DB::table('notes')->where('userId', $id)->get();

        return response([
            'notes'=>$note
        ]);
    }

    public function deleteNote($id){
        $note = DB::table('notes')->where('id', $id)->delete();

        return response([
            'notes'=>$note
        ]);
    }

    public function editNotes( Request $request, $id){
        $attrs = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'instructions' => 'required|string',
            'contact' => 'required|string'
        ]);

        $note= DB::table('notes')
                        ->where('id', $id)
                         ->update([
                            'title' => $attrs['title'],
                            'body' => $attrs['body'],
                            'instructions' => $attrs['instructions'],
                            'contact' => $attrs['contact']
                        ]);

        return response([
            'notes'=>$note
        ]);
    }


        

    
}
