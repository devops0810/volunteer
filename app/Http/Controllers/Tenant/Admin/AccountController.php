<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Lib\HelperTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Tenant\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AccountController extends Controller
{
    use HelperTrait;

    public function profile(){

        $user = Auth::user();
        return view('admin.account.profile',compact('user'));
    }

    public function saveProfile(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'telephone'=>'required',
            'picture' => 'file|max:10000|mimes:jpeg,png,gif',
        ]);

        $requestData = $request->all();
        $user = Auth::user();

        //check for photo
        if($request->hasFile('picture')){
            @unlink($user->picture);

            $path =  $request->file('picture')->store(WID.'/members','public_uploads');

            $file = 'uploads/'.$path;
            $img = Image::make($file);

            $img->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($file);

            $requestData['picture'] = $file;
        }
        else{
            $requestData['picture'] = $user->picture;
        }




        $user->fill($requestData);
        $user->save();

        return back()->with('flash_message',__('admin.changes-saved'));
    }


    public function password(){
        return view('admin.account.password');
    }

    public function savePassword(Request $request){
        $this->validate($request,[
            'password'=>'required|min:6|confirmed'
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('flash_message',__('admin.changes-saved'));
    }

    public function removePicture(){
        $user = Auth::user();
        @unlink($user->picture);
        $user->picture = null;
        $user->save();
        return back()->with('flash_message',__('admin.picture').' '.__('admin.deleted'));
    }
}
