<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;

class ManageDepartment extends Component
{
    public $name;

    public function resetInput()
    {
        $this->name = "";
    }

    public function destroyDepartment(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', "Le departement a bien été supprimé ! ");
    }

    public function saveDepartment()
    {
        dd("darta");
        $data = $this->validate(['name' => ['required', 'string', 'min:2', 'unique:tags,name']]);
        Department::create($data);
        // session()->flash('message','Tag added successfuly');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->with('success', "Le Departement a bien été enregistré ! ");
        dd("test");
        // Toastr::success('<i class="fa fa-check"></i> Tag added successfuly ', 'Success!!');
    }

    public function render()
    {
        return view('livewire.admin.manage-department', ['departments' => Department::query()->latest()->with(['options'])->get()]);
    }
}
