<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Main extends Component
{
  public $pin, $user;

  public $dataProfile, $phoneProfile, $nameProfile, $emailProfile, $walletProfile, $referralProfile;

  public $qr_image, $googleAuthSecret, $pinGoogle, $newPassword, $oldPassword;

  public function passwordSubmit()
  {
    $this->reset(['message']);

    $this->validate([
      'oldPassword' => 'required',
      'newPassword' => 'required',
    ]);

    $user = User::findOrFail(auth()->id());

    if (Hash::check($this->oldPassword, $user->password)) {
      User::findOrFail(auth()->id())->update([
        'password' => Hash::make($this->newPassword),
      ]);
      $this->emit('passwordModalClose');
    } else {
      session()->flash('error', 'Invalid old password');
    }
  }
}
