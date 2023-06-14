<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

/**
 * Write static login information to the session.
 * Use for test purposes.
 */
class AuthController extends Controller
{
    public function login(Request $request) {
        $request->session()->put('abalo_user', $request->post('username'));
        $request->session()->put('abalo_email', $request->post('email'));
        $userID = Models\AbUser::where('ab_name',$request->post('username'))
                                ->where('ab_email', '=', $request->post('email'))
                                ->select('id')
                                ->get();
        if($userID->isEmpty()){
            Models\AbUser::create([
                "ab_name" => $request->post('username'),
                "ab_password" => $request->post('password'),
                "ab_mail" => $request->post('email'),
            ]);
            $userID = Models\AbUser::query()->select()->max('id');
        }

        $request->session()->put('abalo_id', $userID[0]['id']);
        $request->session()->put('abalo_time', time());
        return redirect()->route('haslogin');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('haslogin');
    }


    public function isLoggedIn(Request $request) {
        if($request->session()->has('abalo_user')) {
            $r["user"] = $request->session()->get('abalo_user');
            $r["email"] = $request->session()->get('abalo_email');
            $r["time"] = $request->session()->get('abalo_time');
            $r["mail"] = $request->session()->get('abalo_mail');
            $r["auth"] = "true";
        }
        else $r["auth"]="false";
        return response()->json($r);
    }
}
