<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Mail\Cronjob;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Models\User;

class cron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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

        $mailData = [
            'title' => 'Daily Update',
            'body' => 'Update of all users',
            'users'=> $users
        ];
         
        Mail::to('johncarlocasipit@gmail.com')->send(new Cronjob($mailData));
    }
}
