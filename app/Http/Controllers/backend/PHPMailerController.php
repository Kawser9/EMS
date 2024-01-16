<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Employee;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller
{
    public function email_from($id)
    {
        $employee = Employee::find($id);
        return view('backend.pages.report.email',compact('employee'));
    }
 
 
    public function email_data(Request $request) 
    {
        // dd($request->all());
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
 
        try {
 
            // Email server settings
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'kawser.uy@gmail.com';                   
            $mail->Password   = 'gkxx zgdu rwvy eory';                
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;      

            // $mail->SMTPDebug = 0;
            // $mail->isSMTP();
            // $mail->Host = 'smtp.example.com';             
            // $mail->SMTPAuth = true;
            // $mail->Username = 'user@example.com';   
            // $mail->Password = '**********';       
            // $mail->SMTPSecure = 'tls';                 
            // $mail->Port = 587;                        
            //Recipients

            $mail->setFrom('kawser.uy@gmail.com', 'Admin');
            $mail->addAddress($request->email);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);
 
            $mail->addReplyTo('kawser.uy@gmail.com', 'Admin');
 
            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }
 
 
            $mail->isHTML(true);                // Set email content format to HTML
 
            $mail->Subject = $request->subject;
            $mail->Body    = $request->message;
 
            // $mail->AltBody = plain text version of email body;
 
            if( !$mail->send() ) {
                notify()->warning('Email not sent.', 'Email failed');
                return back();
            }
            
            else {
                notify()->success('Email has been sent.', 'Email success');
                return back();
            }
 
        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }
    }

}
