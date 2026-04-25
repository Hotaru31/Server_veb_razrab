<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Comment $comment): bool
    {
        return true;
    }

    //любой авторизованный пользователь может создавать комментарии
    public function create(User $user): bool
    {
        return true;
    }

    //редактировать может только модератор
    public function update(User $user, Comment $comment): bool
    {
        return $user->isModerator();
    }

    //удалять может только модератор
    public function delete(User $user, Comment $comment): bool
    {
        return $user->isModerator();
    }

    public function restore(User $user, Comment $comment): bool
    {
        return false;
    }

    public function forceDelete(User $user, Comment $comment): bool
    {
        return false;
    }
}