<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateFormRequest;
use Illuminate\Http\Request;
/* use Illuminate\Http\User; */
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verify_Mail;
use App\Http\Requests\verify_mail_from_request;
use App\Http\Requests\EditprofileFormRequest;
use App\Jobs\SendVerificationEmail;
use Carbon\Carbon;
use Exception;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function codegen($email, $id)
    {
        try {
            $code = rand(100000, 999999);
            session([
                'verify_code' => $code,
                'user_id' => $id,
            ]);
            //Dispatch the job to send the email
          //  SendVerificationEmail::dispatch($email, $code);
          Mail::to($email)->send(new Verify_Mail($code));

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function register()
    {
        return view('/users.register');
    }

    public function store(ValidateFormRequest $request)
    {

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password,
        ]);
        session([
            'email' => $request->email,
        ]);
        $send = $this->codegen($user->email, $user->id);
        if ($send) {
            return view('users.verify_mail');
        } else {
            dd($send);
        }
        // return redirect(route('connect'))->with('success', "Welcome to Freeads. You can now connect!");
    }


    public function confirm_code(verify_mail_from_request $request)
    {
        $prov_code = $request->confirm_code;
        $conf_code = $request->session()->get('verify_code');
        $uid = $request->session()->get('user_id');
        if ($prov_code == $conf_code) {
            $user = User::find($uid);
            if ($user) {
                // $user->update(['email_verified_at' => Carbon::now()]);
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect()->route('connect_get')->with('success', 'Email verified successfuly');
            } else {
                return redirect()->route('verify-mail')->with('fail', 'User not found.');
            }
        } else {
            return redirect()->route('verify-mail')->with('fail', 'Please enter a valid code.');
        }
    }

    public function resend_code(Request $request)
    {
        $uid = $request->session()->get('user_id');
        $email = $request->session()->get('email');
        $this->codegen($email, $uid);
        return redirect()->route('verify-mail');
    }

    public function connect()
    {
        return view('/users.connect');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $checkstatus = $request->only(['email']);
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $checkstatus)->first();
            if ($user->email_verified_at !== null) {
                return redirect()->route('home');
            } else {
                $this->codegen($user->email, $user->id);
                return redirect()->route('verify-mail')->with('verif', 'Your account is not already verified. Please verify it with the mail we just send to your email.');
            }
        }

        return redirect()->back()->with('error_msg', 'Your login information is either incorrect or does not exist.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('connect_get');
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function show_profile()
    {
        $user = Auth::id();
        $show = User::where('id', $user)->first();
        return view('users.profile', ['user' => $show]);
    }

    public function update_profile()
    {
        $user = Auth::id();
        $show = User::where('id', $user)->first();
        return view('users.update', ['user' => $show]);
    }

    public function edit_profile(EditprofileFormRequest $request)
    {
        $user = Auth::id();
        $passverif = $request->old_password;
        $show = User::find($user);
        $passconf = Hash::check($passverif, $show->password);
        $oldpass = $request->old_password;
        $newpass = $request->new_password;
        $pattern= '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/';
        
        if (isset($oldpass) && isset($newpass)) {
            if ($passconf && preg_match($pattern, $newpass)) {
                $show->update([
                    'login' => $request->login,
                    'phone_number' => $request->phone_number,
                    'password' => $request->new_password,
                ]);
                return redirect()->route('show_profile')->with('success', 'Your profile information has been successfully updated.');;
            } else {
                return redirect()->back()->with('fail', 'Please enter the valid old password');
            }
        }else{
            $show->update([
                'login' => $request->login,
                'phone_number' => $request->phone_number,
            ]);
            return redirect()->route('show_profile')->with('success', 'Your profile information has been successfully updated.');;
        }

        if ($passconf) {
            $show->update([
                'login' => $request->login,
                'phone_number' => $request->phone_number,
                'password' => $request->new_password,
            ]);
            return redirect()->route('show_profile')->with('success', 'Your profile information has been successfully updated.');;
        } else {
            return redirect()->back()->with('fail', 'Enter the valid old password');
        }
    }

    public function delete_profile(){
        $id = Auth::id();
        $user = User::find($id);
        $user->delete();
        redirect()->route('register_get')->with('delete', 'Your account has been successfully deleted. We hope to see you very soon.');
    }

    public function verify_mail()
    {
        return view('users.verify_mail');
    }

    public function home()
    {
        return view('home');
    }
}

