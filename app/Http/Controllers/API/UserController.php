<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(25);
        return $this->sendSuccessWithMessage('User List',$users);
    }

    public function store(Request $request)
    {
      $data =  $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);
      $data['password'] = bcrypt($data['password']);

        try {
            $user = User::create($data);
            return response()->json([
                'data'=>$user,
                'message'=>'User has been successfully created.'
            ],201);
        }catch (\Throwable $exception){
            return response()->json([
                'data'=>'',
                'message'=>$exception->getMessage()
            ],400);
        }

    }
    public function show($id){
        $user = User::findOrFail($id);
       return $this->sendSuccessWithMessage('User details',$user);
    }

    public function update(Request  $request,$id){
        $data =  $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
        ]);

        $user = User::findOrFail($id);
        $user->update($data);
        return $this->sendSuccessWithMessage(
            'User has been successfully update.',
            $user,
        );
    }
    public function delete($id){
        $user = User::findOrfail($id);
        $user->delete();
        return $this->sendSuccessWithMessage(
            'User has been successfully deleted.',
            $user,
        );
    }
}
