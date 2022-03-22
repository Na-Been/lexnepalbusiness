<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use App\Models\User;
use App\Models\Userfeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function showProfilePage()
    {
        return view('admin.profile.updateProfile');
    }

    public function updateProfile(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        try {
            $users = User::findOrFail(Auth::id());
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required',
                    'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
                ]);
                /*   if (Storage::exists($users->image)) {
                       Storage::delete($users->image);
                   }*/
                $validateData['image'] = $users->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $users->update($validateData);
            return back()->with('success', 'Profile Updated Successfully');
        } catch (\Exception $exception) {
            return back()->with('failed', 'Profile Cannot Be Updated, Something Went Wrong');
        }
    }

    public function changePasswordPage()
    {
        return view('admin.profile.changePassword');
    }

    public function changePassword(ChangePassword $request)
    {
        try {
            DB::beginTransaction();
            User::findOrFail(Auth::id())->update(['password' => bcrypt($request->new_password)]);
            DB::commit();
            return redirect()->route('profile.index')->with('success', 'Password change successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('profile.index')->with('failed', 'Something went Wrong while changing password');
        }
    }

    public function usersAppointment()
    {
        $userFeedbacks = Userfeedback::latest()->get();
        return view('admin.userfeedback.index', compact('userFeedbacks'));
    }

    public function userAppointmentDetail($id)
    {
        $userAppointment = Userfeedback::whereId($id)->first();
        return view('admin.userfeedback.show', compact('userAppointment'));
    }

    public function deleteUserAppointment($id)
    {
        try {
            $findUserAppointment = Userfeedback::whereId($id)->first();
            $findUserAppointment->delete();
            return back()->with('success', 'Appointment Deleted Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Delete User Appointment');
        }
    }
}
