<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Livewire\Request;


class PostCheckbox extends Component
{

    public function click($id)
    {
        $comment = Comment::findOrFail($id);

        if($comment->is_active == true){
            $comment->is_active = false;
            $comment->update();
        }elseif ($comment->is_active == false){
            $comment->is_active = true;
            $comment->update();
        }
    }

    public function render()
    {
        $post = Post::find(1)->first();
        $comments = $post->comments;
        return view('livewire.post-checkbox', compact( 'comments', 'post'));
    }

}
