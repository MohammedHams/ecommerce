<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
       $adminData =  Admin::find(Auth::guard('admin')->user()->id);
       return view('admin.profile',compact('adminData'));
    }
    public function EditProfile(){
        $editData =  Admin::find(Auth::guard('admin')->user()->id);
        return view('admin.edit_profile',compact('editData'));
    }
    public function storeProfile(Request $request){
           $data =  Admin::find(Auth::guard('admin')->user()->id);
        $data->name = $request->name ;
        $data->email= $request->email ;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('ymdHi').$file->getClientOriginalName();
            @unlink(public_path('upload/admin_images'.$data->profile_photo_path));
            $file->move(public_path('/upload/admin_images/'),$filename);
            $path = '/'.$filename;
            $data['profile_photo_path']=$path;
        }
        $data->save();
        $notification = array(
            'message'=>'Admin Profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.profile')->with($notification);

    }
    public function changePassword(){
        $data =  Admin::find(Auth::guard('admin')->user()->id);
        return view('admin.change_password_profile',compact('data'));
    }
    public function storePassword(Request $request){
        $validateDate = $request->validate(
            [
                'oldPassword'=>'required',
                'password'=>'required|confirmed',
            ]
        );

        $hashedPassword = Admin::find(Auth::user()->id)->password;
        if (Hash::check($request->oldPassword,$hashedPassword)){
            $admin = Admin::find(Auth::user()->id);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
          return  redirect()->route('admin.logout');

        }else{
          return  redirect()->back();
        }


    }

}
