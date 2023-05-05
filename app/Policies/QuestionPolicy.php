<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Question $question)
    {
        return ($user->id === $question->user_id) || ($user->role_id === 1 || $user->role_id === 3);
    }

    public function delete(User $user, Question $question)
    {
        return ($user->id === $question->user_id) || ($user->role_id === 1);
    }

}
