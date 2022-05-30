<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Livewire\Component;

class Security extends Component
{
  public $newPin, $oldPin;

  public function submit()
  {
    if (auth()->user()->security) {
      $this->validate(
        [
          'newPin' => 'required',
          'oldPin' => 'required',
        ]
      );

      if (auth()->user()->security != $this->oldPin) {
        session()->flash('danger', '<b>Security</b><br>Invalid old pin');
        return;
      }

    } else {
      $this->validate(
        [
          'newPin' => 'required',
        ]
      );
    }

    $data = User::find(auth()->id());
    $data->security = $this->newPin;
    $data->save();

    redirect('/security');
  }

  public function render()
  {
    return view('livewire.member.security')->extends('layouts.default');
  }
}
