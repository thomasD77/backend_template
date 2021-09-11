<?php

namespace App\Http\Livewire;

use App\Models\faq;
use Livewire\Component;

class FaqsTable extends Component
{


    public $faqs;


    public $question;



    public function mount(){
        $this->faqs = faq::all();

    }


    public function submit()
    {
        $this->validate();
        $data = [
            'question' => $this->question,

        ];

        \App\Models\faq::create([
            'question' => $this->question,
        ]);


        $this->reset([
            'question',
        ]);

        $this->faqs = faq::all();


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




        $role = Role::findOrFail($id);
        $role->name = $this->name;

        $role->update();

        $this->reset([
            'name',
        ]);
    }



    public function render()
    {

        $faqs = $this->faqs;
        return view('livewire.faqs-table', compact('faqs'));
    }
}
