<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class ManageCategories extends Component
{
    public function destroy(Category $category)
    {
        $category->delete();

        // $this->closeModal();
        // $this->alert('success', trans('The post has been successfully deleted'));
        return redirect()->route('categories.index')->with('success', "La Catégorie a bien été supprimée ! ");


    }
    public function render()
    {
        return view('livewire.admin.manage-categories',['categories'=>Category::query()->latest()->with(['documents'])->get()]);
    }
}
