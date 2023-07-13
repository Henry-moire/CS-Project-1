<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    } // End Method

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function Admindestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End method

    public function AdminProfile ()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

    } // End method

}
