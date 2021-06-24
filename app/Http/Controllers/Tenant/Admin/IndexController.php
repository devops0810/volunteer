<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Tenant\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{


    public function dashboard(){

        $output=[];
        $output['departments'] = Department::count();
        $output['members'] = User::where('role_id',2)->count();
        $output['admins'] = User::where('role_id',1)->count();
        $output['messages'] = Auth::user()->receivedEmails()->count();
        $output['user'] = Auth::user();
        $output['newMembers']= User::where('role_id',2)->latest()->limit(4)->get();
        $output['emails'] =Auth::user()->receivedEmails()->latest()->limit(10)->get();

        return view('admin.index.dashboard',$output);
    }
}
