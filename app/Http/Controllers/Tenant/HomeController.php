<?php

namespace App\Http\Controllers\Tenant;

use App\Category;
use App\Department;
use App\Lib\CronJobs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
   //     $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function site(Request $request){

        //get department list
        $keyword = $request->get('search');
        $category = $request->get('category');
        $perPage = 9;

        $departments = Department::inRandomOrder()->limit($perPage)->where('visible',1);

        if(!empty($category) && Category::find($category)){
            $categoryName = Category::find($category)->name;

            $departments = $departments->whereHas('categories',function($q) use ($category){
                $q->where('id',$category);
            });

        }


        $departments = $departments->get();



        return view('welcome', compact('departments','categoryName'));
    }

    public function cron(){
        $cronJobs = new CronJobs();
        $cronJobs->deleteTempFiles();
        $cronJobs->upcomingEvents();
    }
}

