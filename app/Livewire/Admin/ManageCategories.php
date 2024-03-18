<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class ManageCategories extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-categories',['categories'=>Category::query()->latest()->with(['documents'])->get()]);
    }
}
