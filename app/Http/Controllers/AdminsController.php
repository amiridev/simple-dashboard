<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function index()
    {
        return view('admin.admins.index');
    }

    public function datatable()
    {
        $admins = Admin::all();
        return Admin::Datatable($admins);
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'family' => 'required|string|min:2|max:255',
            'username' => 'required|string|min:6|max:255|unique:admins,username',
            'mobile' => ['required', 'string', 'unique:admins,mobile'],
            'email' => 'required|unique:admins,email',
            'password' => 'required|string|min:8|max:255',
        ]);

        $data = $request->only(['name', 'family', 'username', 'mobile', 'email', 'password']);

        $data['password'] = Hash::make($data['password']);

        Admin::create($data);

        return redirect()->route('dashboard.admins.index');
    }

    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'family' => 'required|string|min:2|max:255',
            'username' => 'required|string|min:6|max:255|unique:admins,username,' . $admin->id,
            'mobile' => ['required', 'string', 'unique:admins,mobile,' . $admin->id],
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|max:255',
        ]);

        $data = $request->only(['name', 'family', 'username', 'mobile', 'email', 'password']);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $admin->update($data);

        return redirect()->route('dashboard.admins.index');
    }

    public function delete(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('dashboard.admins.index');
    }
}
