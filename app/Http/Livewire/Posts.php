<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Posts extends Component
{
    public function archivePost($id)
    {
        $post = Post::findOrFail($id);
        $post->archived = 1;
        $post->update();
    }

    public function render()
    {
        $posts = Post::with(['photo', 'user', 'postcategory'])
            ->where('archived', 0)
            ->latest()
            ->paginate(5);

        $timeNow = Carbon::now()->toDateString();

        return view('livewire.posts', compact('posts', 'timeNow'));
    }
}
