<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    public function index(Request $request)
    {

        if($request->isMethod('post')){
            $arr = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
            $validator = $this->validator($request->all());
            if ($validator->fails()) {
                return redirect()->route('login')->withInput()->withErrors($validator);
            }


            if (Auth::attempt($arr)) {
                // Authentication passed...
                // dd("succes");
                // return Redirect::to('/');

                $user = Auth::user();
                // dd($user);
                Auth::login($user); // Manually log in the user
                $request->session()->put('NVID', $user->NVID);
                // $a = $request->session()->get('NVID');
                // dd($a);
                return redirect()->route('home');
                // return $next($request)->route('home');
                // if (Auth::check()) {
                //     dd("Already authenticated:", Auth::user());
                // }
                // dd(session()->all());
            } else {
                return redirect()->route('login')->withInput()->withErrors("Email or password is incorrect");
            }
            return back()->withInput();
        }
        return view('login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
    // public function postauthlogin(Request $request)
    // {
    //     $arr = [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ];

    //     if (Auth::attempt($arr)) {
    //         // Authentication passed...
    //         return redirect()->intended('/sales');
    //     } else {
    //         return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    //     }
    // }

    public function home(Request $request)
    {
        DB::statement('CALL InsertYearlyDate()');
        $NVID = $request->session()->get('NVID');
        return redirect()->route('sales', ['NVID' => $NVID]);
    }
}
