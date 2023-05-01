<?php

namespace App\Http\Controllers;
use AlexPavliukov\EmailSmtpValidation\Rules\EmailSmtpVerified;
use App\Helpers\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function verify(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email']
        ]);

		$email = $request->input('email');


        $vmail = new VerifyEmail();
		$vmail->setStreamTimeoutWait(20);
		$vmail->Debug= TRUE;
		$vmail->Debugoutput= 'html';

		$vmail->setEmailFrom('info@govassist.com');

		if ($vmail->check($email)) {
		    dd('email ' . $email . ' exist!');
		} elseif (verifyEmail::validate($email)) {
			 dd('email ' . $email . ' valid, but not exist!');
		} else {
			 dd('email ' . $email . ' not valid and not exist!');
		}

    }
}
