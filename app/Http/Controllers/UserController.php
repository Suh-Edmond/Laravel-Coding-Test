<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required'
        ]);
        $updated = User::findOrFail($id)->update($data);
        return redirect('/user/profile/' . $id);
    }
}
