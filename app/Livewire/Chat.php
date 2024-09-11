<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{

    public User $user;
    public $messages = '';
    public function render()
    {
        return view('livewire.chat', [
            'items' => Message::where(function ($query) {
                $query->where('from_user_id', Auth::user()->id)
                    ->where('to_user_id', $this->user->id);
            })->orWhere(function ($query) {
                $query->where('from_user_id', $this->user->id)
                    ->where('to_user_id', Auth::user()->id);
            })->orderBy('created_at', 'asc')
                ->get(),
        ]);
    }

    public function sendMessage()
    {
        // dd($this->messages);
        Message::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $this->user->id,
            'message' => $this->messages
        ]);

        $this->reset('messages');
    }
}
