<?php

namespace App\Providers;

use App\Interfaces\ICompanyRepository;
use App\Interfaces\IMailRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IRoleRepository;
use App\Interfaces\ISearchRepository;
use App\Interfaces\IUserRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\MailRepository;
use App\Repositories\PostRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SearchRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ICompanyRepository::class, CompanyRepository::class);
        $this->app->bind(IMailRepository::class, MailRepository::class);
        $this->app->bind(IPostRepository::class, PostRepository::class);
        $this->app->bind(IPostRepository::class, ReviewRepository::class);
        $this->app->bind(IRoleRepository::class, RoleRepository::class);
        $this->app->bind(ISearchRepository::class, SearchRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
