<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class ServiceCategoriesTable extends Component
{
    public $servicecategory;
    public $name;


    protected $listeners = [
        'updateCategoriesTable',
    ];


    public function updateCategoriesTable($name)
    {
        $this->servicecategory = $name;
    }

    public function removeCategory($id)
    {
        $servicecategory = ServiceCategory::findOrFail($id);
        $servicecategory->delete();
    }

    protected $rules = [
        'name' => 'required',
    ];

    public function submitFormCategory($id)
    {

        $this->validate();

        $data = [
            'name' => $this->name,
        ];


        $servicecategory = ServiceCategory::findOrFail($id);
        $servicecategory->name = $this->name;

        $servicecategory->update();

        $this->reset([
            'name',
        ]);

        $this->dispatchBrowserEvent('closeModal');
    }


    public function render()
    {
        $servicecategories = ServiceCategory::latest()->paginate(10);
        $servicecategory = $this->servicecategory;
        return view('livewire.service-categories-table', compact('servicecategory', 'servicecategories'));
    }
}
