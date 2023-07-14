<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function OrganizationDashboard(){
        return view('organization.organization_dashboard');
    } // end Method

}
