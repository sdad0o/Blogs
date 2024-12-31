<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(storeCommentRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
        return back()->with('commentCreateStatus', 'Comment published successfuly');
    }
}
