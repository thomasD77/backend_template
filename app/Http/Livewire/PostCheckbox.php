<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\Request;


class PostCheckbox extends Component
{
    public $post;


    public $disabled = false;


    public function mount($post)
    {
        $this->post = $post;

    }

    public function render()
    {
        return view('livewire.post-checkbox');
    }

}
