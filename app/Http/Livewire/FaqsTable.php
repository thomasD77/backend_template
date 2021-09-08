<?php

namespace App\Http\Livewire;

use App\Models\faq;
use Livewire\Component;

class FaqsTable extends Component
{
    public $question;



    protected $listeners = [
        'updateFaqsTable',
    ];

    public function updateFaqsTable($question)
    {
        $this->question = $question;

    }

    public function removeRole($id)
    {
        $faq = faq::findOrFail($id);
        $faq->delete();
    }

    protected $rules = [
        'question' => 'required',

    ];



    public function render()
    {
        $faqs = faq::all();

        return view('livewire.faqs-table', compact('faqs'));
    }
}
