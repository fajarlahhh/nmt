<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class Main extends Component
{
    public $pin, $user;

    public $dataProfile, $phoneProfile, $nameProfile, $emailProfile, $walletProfile, $referralProfile;

    public $qr_image, $googleAuthSecret, $pinGoogle, $newPassword, $oldPassword;

    public function profileMount()
    {
        $this->dataProfile = auth()->user();
        $this->nameProfile = $this->dataProfile->name;
        $this->emailProfile = $this->dataProfile->email;
        $this->walletProfile = $this->dataProfile->wallet;
        $this->referralProfile = URL::to('/registration?ref=' . $this->dataProfile->referral);
    }

    public function passwordSubmit()
    {
        $this->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required'
        ]);

        $user = User::findOrFail(auth()->id());

        if (Hash::check($this->oldPassword, $user->password)) {
            User::findOrFail(auth()->id())->update([
                'password' => Hash::make($this->newPassword)
            ]);
            $this->reset(['oldPassword', 'newPassword']);
            session()->flash('message', 'Your password has been changed');
        } else {
            session()->flash('error', 'Invalid old password');
        }
        $this->reset(['oldPassword', 'newPassword']);
        $this->emit('passwordModalClose');
    }

    public function profileSubmit()
    {
        if (auth()->user()->googleAuthSecret) {
            $this->validate([
                'phoneProfile' => 'required',
                'nameProfile' => 'required',
                'emailProfile' => 'required',
                'walletProfile' => 'required',
                'pin' => 'required'
            ]);

            $google2fa = app('pragmarx.google2fa');
            if ($google2fa->verifyKey(auth()->user()->googleAuthSecret, $this->pin) === false) {
                session()->flash('error', 'Invalid Google Authenticator PIN');
                return;
            }
        } else {
            $this->validate([
                'nameProfile' => 'required',
                'emailProfile' => 'required',
                'walletProfile' => 'required',
                'phoneProfile' => 'required'
            ]);
        }

        $user = User::findOrFail(auth()->id());
        $user->name = $this->nameProfile;
        $user->email = $this->emailProfile;
        $user->wallet = $this->walletProfile;
        $user->phone = $this->phoneProfile;
        $user->save();
        session()->flash('message', 'Profile updated successfully');
        $this->emit('profileModalClose');
    }
}
