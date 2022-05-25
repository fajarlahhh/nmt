<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
  //
  public function submit(Request $req)
  {

    $validate = $req->validate(
      [
        'oldPassword' => 'required',
        'oldPassword' => 'required',
      ]
    );

    $user = auth()->user();
    if (Hash::check($req->oldPassword, $user->password)) {
      User::find(auth()->id())->update([
        'password' => Hash::make($req->newPassword),
      ]);
      session()->flash('success', '<b>Change Password</b><br>Your password updated successfully');
    } else {
      session()->flash('danger', '<b>Change Password</b><br>Invalid old password');
    }
    return redirect()->back();
  }
}
