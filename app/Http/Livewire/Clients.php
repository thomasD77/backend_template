<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class Clients extends Component
{
    public function archiveClient($id)
    {
        $client = Client::findOrFail($id);
        $client->archived = 1;
        $client->update();
    }

    public function render()
    {
        $clients = client::where('archived', 0)
            ->latest()
            ->paginate(20);
        return view('livewire.clients', compact('clients'));
    }
}
