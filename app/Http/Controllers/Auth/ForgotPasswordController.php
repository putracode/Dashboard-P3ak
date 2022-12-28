<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function getforgotpassword(){
        return view('auth.forgot');
    }

    private function generateToken()
    {
        $key = config('app.key');
        
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
    }
    
    public function postforgotpassword(Request $request){
        $user = User::where('email',$request->email)->first();
        $generateToken = $this->generateToken();
        if (!$user) {
            return redirect()->back()->with('error','User does not exist');
        }else{
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $generateToken,
                'created_at' => Carbon::now()
            ]);

            $token = DB::table('password_resets')->where('token', $generateToken)->first();
            Mail::to($user->email)->send(new ForgotPasswordMail($user,$token->token));
            return redirect()->back()->with("info","Your reset link is being sent to your email");
        }
    }
    
    public function getresetpassword($token){
        $buttonReset = DB::table('password_resets')->where('token',$token)->first();
        if(!$buttonReset || Carbon::now()->subMinutes(10) > $buttonReset->created_at){
            // $buttonReset->delete();
            return redirect()->route('getforgotpassword')->with('error','Invalid password reset link or link expired.');
        }else{
            return view('auth.reset',[
                'token' => $token
            ]);
        }
    }

    public function postresetpassword($token,Request $request){
        $buttonReset = DB::table('password_resets')->where('token',$token)->first();
        if(!$buttonReset || Carbon::now()->subMinutes(10) > $buttonReset->created_at){
            return redirect()->route('getforgotpassword')->with('error','Invalid password reset link or link expired.');
        }else{
            if(strcmp($request->get('confirm_password'), $request->get('new_password'))){
                return redirect()->back()->with("error","Your confirm password does not matches with your new password. Please try again.");
            }
    
            $tokens = DB::table('password_resets')->where('token',$token);
            $reset_password = $tokens->first();
            $user = User::all()->where('email',$reset_password->email)->first();

            if($user->email != $request->get('email')){
                return redirect()->back()->with("error","Enter your correct email.");
            }else{
                $tokens->delete();
                $user->update([
                    'password' => bcrypt($request->new_password),
                    // 'password_change' => true
                ]);
                return redirect('/login')->with("success","Password changed successfully!");
            }
        }
    }
}
