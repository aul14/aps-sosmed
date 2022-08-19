<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreCommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Post $post)
    {
        $data = $request->validate([
            'body'  => ['required', 'min:8']
        ]);

        $data['user_id'] = $request->user()->id;

        $post->comments()->create($data);

        return redirect()->back()->with('success', 'Commend added has been successfully');
    }
}
