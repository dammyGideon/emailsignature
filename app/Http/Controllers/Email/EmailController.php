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

            try {
            $sid =  getenv("TWILIO_SID");
            $token= getenv("TWILIO_TOKEN");
            $from_twilio=  getenv("TWILIO_FROM");
            $twilio = new Client($sid, $token);

            $twilio->messages
                            ->create($phone_number, // to
                                    [
                                        "body" =>
                                        array(
                                            $full_name,$dept,
                                            $name_of_companies,
                                            $first_no,$second_no,
                                            $email,
                                            $website_link
                                        ), "from" =>$from_twilio]
                            );

                    DB::table('email_signatures')->delete();
                    return redirect()->back();
            }catch (Exception $e){
                dd('Error',$e->getMessage());
                // DB::table('email_signatures')->delete();
                // return redirect()->back()->with('Error',$e->getMessage());
            }

        }
    }
}
