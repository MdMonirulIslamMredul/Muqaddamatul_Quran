<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
Use Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|string',
            'password' => 'required|string',
        ], [
            'email.required' => 'ইমেল অথবা মোবাইল নম্বর প্রদান করুন (Email or Mobile is required)',
            'password.required' => 'পাসওয়ার্ড প্রদান করুন (Password is required)',
        ]);

        $loginInput = trim($request->input('email'));
        $password   = $request->input('password');

        // Check if input is email or mobile
        $isEmail = filter_var($loginInput, FILTER_VALIDATE_EMAIL);

        $user = null;
        if ($isEmail) {
            $user = \App\Models\User::where('email', $loginInput)->first();
        } else {
            // Find by mobile directly, or normalized mobile (stripping non-digits)
            $cleanMobile = preg_replace('/[^0-9]/', '', $loginInput);
            $user = \App\Models\User::where('mobile', $loginInput)
                ->orWhere('mobile', 'like', "%{$cleanMobile}%")
                ->orWhere('email', $loginInput)
                ->first();
        }

        if ($user && \Illuminate\Support\Facades\Hash::check($password, $user->password)) {
            auth()->login($user, $request->filled('remember'));

            if (auth()->user()->is_admin == 1) {
                Alert::toast('স্বাগতম! অ্যাডমিন প্যানেলে সফলভাবে প্রবেশ করেছেন।', 'success');
                return redirect()->route('admin.home');
            } elseif (auth()->user()->role === 'student' || \App\Models\OnlineAdmission::where('user_id', auth()->id())->exists()) {
                Alert::toast('স্বাগতম! আপনার স্টুডেন্ট ড্যাশবোর্ডে প্রবেশ করেছেন।', 'success');
                return redirect()->route('student.dashboard');
            } else {
                Alert::toast('Login successfully', 'success');
                return redirect()->route('front.page');
            }
        }

        return redirect()->route('login')
            ->withInput($request->only('email', 'remember'))
            ->with('error', 'ইমেল / মোবাইল নম্বর অথবা পাসওয়ার্ড সঠিক নয়। (Email/Mobile or Password incorrect)');
    }
}
