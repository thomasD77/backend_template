<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public $serviceID;


    public function archiveService($id)
    {
        $service = Service::findOrFail($id);
        $service->archived = 1;
        $service->update();
    }

    public function render()
    {
        $services = Service::paginate(10);
        return view('livewire.services', compact('services'));
    }
}
