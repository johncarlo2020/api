<?php

namespace App\Http\Controllers;

use App\Models\UserLogs;
use Illuminate\Http\Request;


class userLog extends Controller
{
    public function addlog(Request $request){
        $attrs = $request->validate([
            'user_id'=> 'required|integer',
            'date' => 'required|date',
            'time'=> 'required|time',
            'location' => 'required|string'
        ]);

        $log = UserLogs::create([
            'user_id' => $attrs['user_id'],
            'date' => $attrs['date'],
            'time'=> $attrs['time'],
            'location' => $attrs['location']
        ]);

        return response([
            'UserLogs'=> $log
        ]);


    }
}
