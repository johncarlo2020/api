<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;

class GalleryController extends Controller
{
    //
    public function addimg(Request $request, $id){
      

        $attrs = $request->validate([
            'imageUrl'=>'required|string'
        ]);

        $gallery = Gallery::create([
            'userId'=>$id,
            'imageUrl'=>$attrs['imageUrl']
        ]);

        return response([
            'gallery'=> $gallery
        ]);


    }
}
