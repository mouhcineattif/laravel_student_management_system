<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Offers;
use App\Models\Student;
use App\Policies\OffersPolicy;
use Illuminate\Auth\GenericUser;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Offers::class => OffersPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update_student',function(GenericUser $student){
           return Auth::id() === $student->id;
        }); 
        Gate::define('update_offer',function(GenericUser $student,Offers $offer){
           return $student->id === $offer->student_id;
        }); 
    }
}
