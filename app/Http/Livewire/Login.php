<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $error, $username, $password, $referral_token, $remember = false, $type = 'password', $show = 'Show';
    public $message;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $this->reset('error');
        $this->validate();

        $remember = $this->remember == 'on';
        if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $remember)) {
            if (auth()->user()->role == 1) {
                if (auth()->user()->registration_waiting_fund->count() > 0) {
                    $data = auth()->user()->registration_waiting_fund->first();
                    $until = Carbon::parse($data->created_at)->addHours(5);
                    if($until < now()){
                        Deposit::where('id_member', auth()->id())->delete();
                    }
                }
            }

            Auth::logoutOtherDevices($this->password, 'password');
            if (auth()->user()->role == 1){
                return redirect('/dashboard');
            }else{
                return redirect('/admin-area');
            }
        }
        $this->error = "<p class='text-theme-6 mt-1'>Wrong username or password!!!</p>";
        return;
    }

    public function updated()
    {
        $this->reset('error');
    }

    public function render()
    {
        Auth::logout();
        return view('livewire.login');
    }
}
