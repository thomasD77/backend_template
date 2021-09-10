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
    public $comments;


    public function mount($post)
    {
        $this->post = $post;

        $comments = Comment::all();
        $this->comments = $comments;
    }


    public function click($id)
    {
        $comment = Comment::findOrFail($id);

        if($comment->is_active == true){
            $comment->is_active = false;
            $comment->update();

            $commentReplies = Comment::where('reply_id', $id)->get();
            if($commentReplies->isNotEmpty()){
                foreach ($commentReplies as $commentReply){
                    $commentReply->is_active = false;
                    $commentReply->update();
                }
            }


        }elseif ($comment->is_active == false){
            $comment->is_active = true;
            $comment->update();

        }

        $this->comments = Comment::all();
    }

    public function render()
    {
       $comments = $this->comments;
        return view('livewire.post-checkbox', compact('comments'));
    }

}
