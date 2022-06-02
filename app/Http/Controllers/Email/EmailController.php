<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailSignature;
use Exception;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;

class EmailController extends Controller
{
    //

    public function send(Request $request){

        $data=[
            'full_name'=>$request->input('full_name'),
            'department'=>$request->input('department'),
            'direct'=>$request->input('direct'),
            'email'=>$request->input('email')
        ];

       $check = new EmailSignature();
       if(empty($check)){
        $result= EmailSignature::insert($data);
       }else{
           DB::table('email_signatures')->delete();
           $result= EmailSignature::insert($data);
       }


       return redirect()->back();

    }

    public function sendEmail(Request $request){

        $phone_number=$request->input('phone_number');


        $data = DB::table('email_signatures')->get();
        foreach($data as $response){
            $full_name=$response->full_name;
            $dept     =$response->department;
            $name_of_companies="Graves Foods";
            $first_no =$response->first_no;
            $second_no=$response->second_no;
            $email = $response->email;
            $website_link=$response->website_link;


            $message=array(
                "full_name"=>$full_name,
                "department"=>$dept,
                "name_of_company"=>$name_of_companies,
                "first_number" => $first_no,
                "second_number"=>$second_no,
                "email"=>$email,
                "website"=>$website_link);

             try {


                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = "MG54dc16354e1159559be93750eb25deb6";
                $client = new Client($account_sid, $auth_token);
                $client->messages->create($phone_number,
                [
                    'from' => $twilio_number, 'body' =>trim(implode("\n ",$message))] );

                DB::table('email_signatures')->delete();
                return redirect()->back()->with('success', 'Message Sent!');

            }catch (Exception $e){
                // DB::table('email_signatures')->delete();
                 return redirect()->back()->with('error','mobile number is not valid');
            }

        }

    }
}
