<?php

namespace App\Http\Livewire;

use App\Models\faq;
use Livewire\Component;

class FaqsTable extends Component
{
    public $question;
    public $answer;



    protected $listeners = [
        'updateFaqsTable',
    ];

    public function updateFaqsTable($question)
    {
        $this->question = $question;


    }

    public function removeFaq($id)
    {
        $faq = faq::findOrFail($id);
        $faq->delete();
    }

    protected $rules = [
        'question' => 'required',

    ];

    public function updateFaq($id)
    {
        $data = [
           'question' => $this->question,
            'answer' => $this->answer,
        ];

        dd($this->question);


        $role = Role::findOrFail($id);
        $role->name = $this->name;

        $role->update();

        $this->reset([
            'name',
        ]);
    }



    public function render()
    {
        $faqs = faq::all();

        return view('livewire.faqs-table', compact('faqs'));
    }
}
