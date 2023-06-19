<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("users.index", [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'cnic' => ['required', 'unique:users,cnic'],
            'password' => ['required', 'confirmed'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cnic' => $request->cnic,
        ];

        $is_created = User::create($data);

        // $is_created = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'cnic' => $request->cnic,
        // ]);

        if ($is_created) {
            return back()->with(['success' => "Magic has been spelled!"]);
        } else {
            return back()->with(['failure' => "Magic has failed to spell!"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $user->id . ',id'],
            'cnic' => ['required', 'unique:users,cnic,' . $user->id . ',id'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'cnic' => $request->cnic,
        ];

        $is_updated = $user->update($data);

        if ($is_updated) {
            return back()->with(['success' => "Magic has been spelled!"]);
        } else {
            return back()->with(['failure' => "Magic has failed to spell!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $is_deleted = $user->delete();

        if ($is_deleted) {
            return back()->with(['success' => "Magic has been spelled!"]);
        } else {
            return back()->with(['failure' => "Magic has failed to spell!"]);
        }
    }
}
