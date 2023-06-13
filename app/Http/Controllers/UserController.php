<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_users()
    {
        $users = [
            'Ali',
            'Hassan',
            'Saif',
        ];
        return view('users', [
            'users' => $users
        ]);
    }

    public function create_user()
    {
        return 'I am create User';
    }

    public function edit_user()
    {
        return 'I am edit User';
    }

    public function delete_user()
    {
        return 'I am delete User';
    }
}
