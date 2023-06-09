<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Question;
use App\Policies\QuestionPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Question::class => QuestionPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
