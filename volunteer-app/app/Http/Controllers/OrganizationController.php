<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Notifications\VendorRegNotification;
use Illuminate\Support\Facades\Notification;

class OrganizationController extends Controller
{
    public function OrganizationDashboard(){

        return view('organization.index');

    } // End Method

    public function OrganizationLogin()
    {
        return view('organization.organization_login');
    } // End Method

    public function Organizationdestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/organization/login');
    } // End Method

    public function OrganizationProfile()
    {
        $id = Auth::user()->id;
        $organizationData = User::find($id);
        return view('organization.organization_profile_view', compact('organizationData'));

    } // End method

}
