<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
                ->join('user_perm','user_perm.perm_id','users.permission')    
                ->get();
        
        $perm = DB::table('user_perm')
                ->get();
       return view('config.user',['user'=>$user,'perm'=>$perm]);
    }

    public function user_add(Request $request)
    {
        DB::table('users')->insert(
            [
                'name' => $request->get('uname'),
                'email' => $request->get('uemail'),   
                'permission' => $request->get('uperm'),
                'password' => Hash::make('1234'),
            ]
        );
    }

    public function change($id)
    {
        $hid = base64_decode($id);
        $data = DB::table('users')
                ->join('user_perm','user_perm.perm_id','users.permission')
                ->where('id', $hid)
                ->first();

        return view('user.edit',['data'=>$data]);
    }

    public function save_pass(Request $request , $id)
    {
        $pass = $request->get('newpass');
        DB::table('users')->where('id',$id)->update(
            [ 'password' => Hash::make($pass) ]
        );
    }

    public function save_edit(Request $request , $id)
    {
        DB::table('users')->where('id',$id)->update(
            [ 
                'name' => $request->get('uname'),
                'email' => $request->get('uemail'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }

    public function profile($id)
    {
        $user = DB::table('users')
                ->join('user_perm','user_perm.perm_id','users.permission')
                ->where('id', $id)
                ->first();
       return view('user.profile',['user'=>$user,]);
    }
}
