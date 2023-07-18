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

    public function OrganizationProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->organization_join = $request->organization_join;
        $data->organization_short_info = $request->organization_short_info;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/organization_images' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/organization_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Organization Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } // End method

    public function OrganizationChangePassword()
    {
        return view('organization.organization_change_password');
    } // End method

    public function OrganizationUpdatePassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Method

    public function BecomeVendor(){
        return view('auth.become_vendor');
    } // End Method

    public function VendorRegister(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'organization_join' => $request->organization_join,
            'password' => Hash::make($request->password),
            'role' => 'organization',
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Organization Registered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('organization.login')->with($notification);

    }// End Method





}
