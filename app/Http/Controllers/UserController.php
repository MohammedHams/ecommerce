<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Responses\userResponse\LogoutResponse;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

        public function destroy(Request $request): LogoutResponse
    {

        Auth::logout();
        return app(LogoutResponse::class);
    }
    public function userProfile(){
            $id = Auth::user()->id;
            $user = User::find($id);
            return view('frontend.user_profile',compact('user'));
    }
    public function storeProfile(Request $request){
        $data =  User::find(Auth::user()->id);
        $data->name = $request->name ;
        $data->email= $request->email ;
        $data->phone= $request->phone ;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('ymdHi').$file->getClientOriginalName();
            @unlink(public_path('upload/user_images'.$data->profile_photo_path));
            $file->move(public_path('/upload/user_images/'),$filename);
            $path = '/'.$filename;
            $data['profile_photo_path']=$path;
        }
        $data->save();
        $notification = array(
            'message'=>'User Profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user.profile')->with($notification);

    }
public function userHome(){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('frontend.dashboard',compact('user'));

}
public function changePassword(){
    $id = Auth::user()->id;
    $user =  User::find($id);
    return view('frontend.change_password_profile',compact('user'));

}
public function storePassword(Request $request){
    $validateDate = $request->validate(
        [
            'oldPassword'=>'required',
            'password'=>'required|confirmed',
        ]
    );

    $hashedPassword = User::find(Auth::user()->id)->password;
    if (Hash::check($request->oldPassword,$hashedPassword)){
        $admin = User::find(Auth::user()->id);
        $admin->password = Hash::make($request->password);
        $admin->save();
        Auth::logout();
        $notification = array(
            'message'=>'User Password Updated Successfully',
            'alert-type'=>'success'
        );

        return  redirect()->route('user.logout')->with($notification);

    }else{
        return  redirect()->back();
    }

}


}
