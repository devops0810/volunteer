<?php

namespace App\Http\Controllers\Tenant\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Tenant\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function departments(){

    }

    public function dashboard(){

        $department=getDepartment();
        $output = [];
        $output['messages'] = Auth::user()->receivedEmails()->count();
        $output['user'] = Auth::user();
        $output['emails'] =Auth::user()->receivedEmails()->latest()->limit(10)->get();
        $output['events'] = getDepartment()->events()->where('event_date' , '>=' , Carbon::yesterday()->toDateTimeString())->orderBy('event_date')->limit(5)->get();
        $output['totalEvents'] = getDepartment()->events()->where('event_date' , '>=' , Carbon::yesterday()->toDateTimeString())->count();
        $output['members'] = getDepartment()->users()->count();
        $output['announcements'] =   getDepartment()->announcements()->latest()->limit(5)->get();
        $output['totalAnnouncements'] = getDepartment()->announcements()->count();
        $output['forumTopics'] = getDepartment()->forumTopics()->latest()->limit(5)->get();

        $output['shifts'] =  Auth::user()->shifts()->whereHas('event',function($q) use($department){
            $q->where('department_id',$department->id);
            $q->where('event_date' , '>=' , Carbon::yesterday()->toDateTimeString())->orderBy('event_date');
        })->limit(10)->get();


        return view('member.index.dashboard',$output);
    }

}
