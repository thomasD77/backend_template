<?php

namespace App\Http\Livewire;

use App\Models\client;
use Illuminate\Support\Carbon;
use Livewire\Component;

class UnarchiveClients extends Component
{
    public function unArchiveClient($id)
    {
        $client = Client::findOrFail($id);
        $client->archived = 0;
        $client->update();
    }

    public function render()
    {
        $clients = client::where('archived', 1)
            ->latest()
            ->paginate(20);

        return view('livewire.unarchive-clients', compact('clients'));
    }
}
