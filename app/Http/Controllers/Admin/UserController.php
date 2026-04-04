<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    private function checkAdmin()
    {
        if (Auth::user()->role_id !== 1) {
            abort(403);
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $this->checkAdmin();
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'role_id'));
        return redirect('/admin/users')->with('success', 'User successfully updated!');
    }

    public function destroy($id)
    {
        $this->checkAdmin();
        User::findOrFail($id)->delete();
        return redirect('/admin/users')->with('success', 'User successfully deleted!');
    }
}
