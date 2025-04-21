<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * 指定されたユーザーの投稿とコメントを取得する
     *
     * @param User $user
     * @return AnonymousResourceCollection
     */
    public function postsWithComments(User $user): AnonymousResourceCollection
    {
        $posts = $user->posts()->get();

        return PostResource::collection($posts);
    }
}
