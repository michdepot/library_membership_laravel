<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // try {
        //     $request->validate([
        //         "name" => 'required',
        //         "email" => 'required|email',
        //         "password" => 'required|min:6'
        //     ]);

        //     User::create([
        //         "name" => $request->name,
        //         "email" => $request->email,
        //         "password" => Hash::make($request->password),
        //     ]);

        //     return response()->json([
        //         "message" => "User registered successfully!"
        //     ], 202);
        // } catch (QueryException $e){
        //     $errorCode = $e->errorInfo[1];
        //     if($errorCode == 1062){
        //         return response()->json([
        //             "error" => "Email already exists"
        //         ], 422);
        //     }
        // }
        $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "password" => 'required|min:6'
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return response()->json([
            "message" => "User registered successfully!"
        ], 202);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return User::find($id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::find($id)->delete();
    }
}
