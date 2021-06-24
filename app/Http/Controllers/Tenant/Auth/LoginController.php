<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Tenant\Controller;
use App\Lib\HelperTrait;
use App\Lib\RedirectTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use HelperTrait;
    //use RedirectTrait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->route('login')
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => __('auth.failed'),
            ]);
    }

    protected function redirectTo()
    {
        $user = Auth::user();
        if($user->role_id==1){
            return route('admin.dashboard');
        }
        else{

            //check if user belongs to any department
            $totalDepts = $user->departments()->count();
            if($totalDepts==1){
                $department = $user->departments()->first();
                $this->loginToDepartment($department->id);
                return route('member.dashboard');
            }
            elseif($totalDepts > 1){
                return route('site.select-department');
            }
            else{
                return route('site.departments');
            }

        }
    }

}
