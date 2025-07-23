<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Log;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = \App\Models\User::where('role', '!=', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function logs(User $user)
    {
        $logs = $user->logs;
        return view('admin.logs', compact('user', 'logs'));
    }

    public function toggleBan($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->is_banned = !$user->is_banned;
        $user->save();

        return redirect()->back()->with('success', 'User status updated successfully.');
    }
}

