<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = User::where('Email', $request->input('email'))->first()->id;
        $user = $request->isMethod('put') ? User::findOrFail($userId) : new User;

        $user->Firstname = $request->input('firstname');
        $user->Surname = $request->input('surname');
        $user->DateOfBirth = $request->input('date_of_birth');
        $user->PhoneNumber = $request->input('phone_number');
        $user->Email = $request->input('email');

        if ($user->save()) {
            return new UserResource($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            return new UserResource($user);
        }
    }


    public function login(Request $request)
    {
        return response()->json('Unauthorized.', 401);
    }
}
