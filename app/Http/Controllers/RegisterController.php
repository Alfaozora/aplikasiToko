<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use Hash;
use Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = role::all();
        return view('login.register', compact(
            'users',
            'roles'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
        return view('login.tambahuser', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $role = $request->input('role');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        
        $user = User::create([
            'role' => $role,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'Register Berhasil!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register Gagal!'
            ], 400);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('login.edit', compact('user'));
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
        $users = User::find($id);
        if ($request->new_password != null) {
            $this->validate($request, [
                'new_password' => 'required|min:8|max:35',
                'password_confirmation' => 'required|same:new_password|different:old_password'
            ]);
            if (!Hash::check($request->old_password, $users->password)) {
                return redirect()->route('register.index')->with(['error' => 'Password lama tidak sesuai']);
            }
            $users->password = Hash::make($request->new_password);
        }
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();
        if ($users) {
            return redirect()->route('register.index')->with(['success' => 'Data Berhasil Diubah']);
        } else {
            return redirect()->route('register.index')->with(['erorr' => 'Data Gagal Diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['status' => 'Data Berhasil di hapus!']);
    }
}