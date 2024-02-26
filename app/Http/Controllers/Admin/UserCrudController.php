<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Mail\NewUserWelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserCrudController extends Controller
{
    public function index()
    {
        $users = User::where('type', '!=', 1)->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create-users');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'], // 10mb limit
        ]);

        $plainTextPassword = $request->input('password');

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => Hash::make($plainTextPassword),
            'type' => $request->input('usertype'),
        ]);

        if ($request->hasFile('avatar')) {
            $avatarExtension = $request->file('avatar')->getClientOriginalExtension();
            $avatarFileName = 'avatar_' . $user->id . '.' . $avatarExtension;
            $request->file('avatar')->move(public_path('avatars'), $avatarFileName);
            $user->update(['avatar' => 'avatars/' . $avatarFileName]);
        }

        Mail::to($user->email)->send(new NewUserWelcomeMail($user, $plainTextPassword));

        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function info($id)
    {
        $userdata = User::findOrFail($id);

        return view('admin.users.view-data', compact('userdata'));
    }

    public function edit($id)
    {
        $userdata = User::findOrFail($id);

        return view('admin.users.edit-data', compact('userdata'));
    }
}
