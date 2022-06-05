<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailSignature;
use Exception;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    //

    public function send(Request $request){
        $first_no= '(573) 761-5038';
        $second_no='(573) 893-3000';
        $website_link='gravesfoods.com';


        Session::put('user',
                    [
                    'full_name' =>$request->input('full_name'),
                    'department'=>$request->input('department'),
                    'direct'    =>$request->input('direct'),
                    'email'     =>$request->input('email'),
                    'first_no'  =>$first_no,
                    'second_no' =>$second_no,
                    'website_link'=>$website_link,
                ]);

        return redirect()->back()->with('success', 'Message Sent!');

    }

    public function sendEmail(Request $request){

            $phone_number=$request->input('phone_number');

            $full_name=Session::get('user')['full_name'];
            $dept     =Session::get('user')['department'];
            $name_of_companies="Graves Foods";
            $first_no =Session::get('user')['first_no'];
            $second_no=Session::get('user')['second_no'];
            $email = Session::get('user')['email'];
            $website_link=Session::get('user')['website_link'];
            $data=[$full_name,$dept,$name_of_companies,$first_no,$second_no,$email,$website_link];
             try {


                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = "MG54dc16354e1159559be93750eb25deb6";
                $client = new Client($account_sid, $auth_token);
                $client->messages->create($phone_number,
                [
                    'from' => $twilio_number, 'body' =>trim(implode("\n",$data))] );
                      session()->forget('user');
                     return redirect()->back()->with('success', 'Message Sent!');


            }catch (Exception $e){

                 return redirect()->back()->with('error','mobile number is not valid');
            }

        }


}
