<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTableController extends Controller
{
    public function userSighUp(request $req)
    {
        $request = json_decode($req->getContent(), true);
        $data['name'] = $request['name'];
        $data['phone'] = $request['phone'];
        $data['email'] = $request['email'];
        $data['password'] = md5($request['password']);
        $data['type'] = 2;

        $last_id = DB::table('user_tables')->insertGetId($data);
        $fetch = DB::table('user_tables')->where('id', $last_id)->get();
        return $fetch;
    }
    public function userSighIn(request $req)
    {
        $request = json_decode($req->getContent(), true);
        $email = $request['email'];
        $pass = md5($request['password']);
        $result = DB::table('user_tables')->where('email', $email)->get();
        if (!is_null($result)) {
            $success = DB::table('user_tables')->where('email', $email)->where('password', $pass)->get();
            return $success;
        } else {
            return "hoy nai";
        }
    }
    public function allUser()
    {
        $success = DB::table('user_tables')->get();
        if ($success) {
            return $success;
        } else {
            return "hoy nai";
        }
    }
}
