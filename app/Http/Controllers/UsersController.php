<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        $users=User::paginate(2);
        return view('admin.users.index', compact('users'));
    }
    public function datatable()
    {
        $users = User::all();
        return User::Datatable($users);
    }

    public function create()
    {
        return view('dashboard.users.create');
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

        User::created($data);

        return redirect()->route('dashboard.users.index');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }
    public function update(Request $request , User $user)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'family' => 'required|string|min:2|max:255',
            'username' => 'required|string|min:6|max:255|unique:admins,username'. $user->id,
            'mobile' => ['required', 'string', 'unique:admins,mobile'. $user->id],
            'email' => 'required|unique:admins,email' . $user->id,
            'password' => 'required|string|min:8|max:255',
        ]);
        $data = $request->only(['name', 'family', 'username', 'mobile', 'email', 'password']);

        if (isset($data['password']))
        {
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);
        return redirect()->route('dashboard.users.index');
    }
    public function  delete(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }


}
