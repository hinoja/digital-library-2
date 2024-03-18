<?php

namespace App\Livewire\Admin;

use Livewire\Component; 
use App\Models\Option;

class ManageOption extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-option',['options'=>Option::query()->latest()->with(['department','documents'])->get()]);
    }
}
