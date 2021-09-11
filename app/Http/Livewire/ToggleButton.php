<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;
    public string $field;
    public bool $value = false;

    public bool $status;

   public function mount()
   {
       $this->status = (bool) $this->model->getAttribute($this->field);

   }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value)
    {
       $this->model->setAttribute($this->field, $value)->save();

       if($this->model->is_active == 0 ){
           $commentReplies = Comment::where('reply_id', $this->model->id)->get();

           foreach ($commentReplies as $commentReply){
               $commentReply->is_active = 0;
               $commentReply->save();
           }
           $this->emit('updateStatus', $this->value);
           $this->emit('updateDisabled', true);
       }

    }

}
