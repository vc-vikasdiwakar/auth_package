<?php

namespace Authenticate\Role\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Authenticate\Role\Mail\AdminMail;
use Authenticate\Role\Mail\ClientMail ;
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
            $clientData =[
                'message'=>'Website is blocked,Please contact Admin',
                'name' =>env('APP_NAME')
            ];
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ClientMail($clientData));
           
       /* Admin mail*/
            $adminData = [
                'message' => env('APP_NAME')." project unlock using password ".$password,
                'name' => 'Viitor Cloud Technologies'
            ];
         Mail::to('dolly.sanchaniya@viitor.cloud')->send(new AdminMail($adminData));

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
