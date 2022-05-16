<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    //
    public function addNotes(Request $request, $id ){

        $userid=int($id);
        $attrs = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $note = Notes::create([
            'userId' => $userid,
            'title' => $attrs['title'],
            'body' => $attrs['body']
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


        

    
}
