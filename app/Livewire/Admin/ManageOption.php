<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Option;

class ManageOption extends Component
{

    public function destroy(Option $options)
    {
        $options->delete();
        return redirect()->route('admin.options.list')->with('success', "La filière a bien été supprimée ! ");
    }
    public function render()
    {
        // dd(Option::query()->latest()->with(['department','documents'])->get());
        return view('livewire.admin.manage-option',['options'=>Option::query()->latest()->with(['department','documents'])->get()]);
    }
}
