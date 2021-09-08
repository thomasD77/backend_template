<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Faqs extends Component
{
    public $question;

    protected $rules = [
        'question' => 'required',
    ];


    public function submit()
    {
        $this->validate();
        $data = [
            'question' => $this->question,

        ];

        \App\Models\faq::create([
            'question' => $this->question,
        ]);

        $this->emit('updateFaqsTable', $this->question);

        $this->reset([
            'question',
        ]);

    }
    public function render()
    {
        return view('livewire.faqs');
    }

}
