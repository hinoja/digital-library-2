<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;

class ManageDepartment extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-department',['departments'=>Department::query()->latest()->with(['options'])->get()]);
    }
}
