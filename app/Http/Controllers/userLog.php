<?php

namespace App\Http\Controllers;

use App\Models\UserLogs;
use Illuminate\Http\Request;


class userLog extends Controller
{
    public function addlog(Request $request){
        $attrs = $request->validate([
            'user_id'=> 'required|integer',
            'starttime' => 'required',
            'endtime' => 'required',
            'location' => 'required|string'
        ]);

        $log = UserLogs::create([
            'user_id' => $attrs['user_id'],
            'starttime' => $attrs['starttime'],
            'endtime' => $attrs['endtime'],
            'location' => $attrs['location']
        ]);

        return response([
            'UserLogs'=> $log
        ]);


    }
}
