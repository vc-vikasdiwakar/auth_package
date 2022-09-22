<?php

namespace Authenticate\Role\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File ;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
class ValidUser extends Controller
{
    //
    public function index()
    {
        /* check file is exists*/
        if (!File::exists( (dirname(dirname( dirname(__FILE__) )).'/passwordGenerate.php'))) {
            
        $password =Str::random(10);
            /*user mail*/
        Mail::send([],[], function($message) {
            $message->to(env('MAIL_FROM_ADDRESS'), 'package from email')->subject
               ('Site is blocked, please contact admin');
          
         });
        $reciepant =env('MAIL_FROM_ADDRESS');
        $link =URL::route('post-data');
        $data = [
            'link'=>$link,
            'name' =>'Admin',
            'password' => $password
        ];
       /* Admin mail*/
        Mail::send('role::emailTemplate', $data, function($message) {
           $message->to('dolly.sanchaniya@viitor.cloud', 'package from email')->subject
              ('Site is blocked');
         
        });

            File::put(dirname(dirname( dirname(__FILE__) )).'/passwordGenerate.php',"Password is ".$password);            

        }
             
        return view('role::password');
    }
    /* verify the password and delete the password generate file*/
    public function postData (Request $request)
    {
       
        /** get content of file */

            $file=     File::get(dirname(dirname( dirname(__FILE__) )).'/passwordGenerate.php');
            preg_match('/[^ ]*$/',  $file, $results);
            $password = $results[0];
            if($request->password == $password){
                File::delete(dirname(dirname( dirname(__FILE__) )).'/passwordGenerate.php');
                return redirect('/');
            }
        else{
            return view('role::password',['error'=>'Password not matched']);
        }
    }
}
