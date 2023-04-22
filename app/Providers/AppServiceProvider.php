<?php

namespace App\Providers;

use App\Interfaces\ICompanyRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IMailRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IReviewRepository;
use App\Interfaces\ISearchRepository;
use App\Interfaces\ITicketRepository;
use App\Interfaces\ITypeRepository;
use App\Interfaces\IUserRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\InformationTypeRepository;
use App\Repositories\MailRepository;
use App\Repositories\PostRepository;
use App\Repositories\InformationRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\RoleRepostitory;
use App\Repositories\SearchRepository;
use App\Repositories\SkillRepository;
use App\Repositories\TicketRepository;
use App\Repositories\TicketTypeRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICompanyRepository::class, CompanyRepository::class);
        $this->app->bind(IInformationRepository::class, InformationRepository::class);
        $this->app->bind(IMailRepository::class, MailRepository::class);
        $this->app->bind(IPostRepository::class, PostRepository::class);
        $this->app->bind(IReviewRepository::class, ReviewRepository::class);
        $this->app->bind(ISearchRepository::class, SearchRepository::class);
        $this->app->bind(ITicketRepository::class, TicketRepository::class);
        $this->app->bind(ITypeRepository::class, InformationTypeRepository::class);
        $this->app->bind(ITypeRepository::class, RoleRepostitory::class);
        $this->app->bind(ITypeRepository::class, TicketTypeRepository::class);
        $this->app->bind(ITypeRepository::class, SkillRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
