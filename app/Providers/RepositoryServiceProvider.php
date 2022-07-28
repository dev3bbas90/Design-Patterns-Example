<?php

namespace App\Providers;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\BookingDetailsRepositoryInterface;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\Eloquent\BookingRepository;
use App\Repositories\Eloquent\ProgramCategoriesRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\EventRepository;
use App\Repositories\Eloquent\HallRepository;
use App\Repositories\Eloquent\HallTimeFrameRepository;
use App\Repositories\Eloquent\ProgramRepository;
use App\Repositories\Eloquent\PartnersRepository;
use App\Repositories\Eloquent\RowRepository;
use App\Repositories\Eloquent\SeatRepository;
use App\Repositories\Eloquent\TheaterRepository;
use App\Repositories\Eloquent\CastRepository;
use App\Repositories\Eloquent\CastTypeRepository;
use App\Repositories\Eloquent\SliderRepository;
use App\Repositories\Eloquent\NewslettersRepository;
use App\Repositories\Eloquent\ContactFormRepository;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\HallRepositoryInterface;
use App\Repositories\HallTimeFrameRepositoryInterface;
use App\Repositories\ProgramRepositoryInterface;
use App\Repositories\RowRepositoryInterface;
use App\Repositories\SeatRepositoryInterface;
use App\Repositories\TheaterRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\CastRepositoryInterface;
use App\Repositories\CastTypeRepositoryInterface;
use App\Repositories\ProgramCategoriesRepositoryInterface;
use App\Repositories\PartnersRepositoryInterface;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\NewslettersRepositoryInterface;
use App\Repositories\ContactFormRepositoryInterface;
use App\Repositories\Eloquent\BookingDetailsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(BookingRepositoryInterface::class,BookingRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(EventRepositoryInterface::class,EventRepository::class);
        $this->app->bind(BookingDetailsRepositoryInterface::class,BookingDetailsRepository::class);
        $this->app->bind(HallRepositoryInterface::class,HallRepository::class);
        $this->app->bind(HallTimeFrameRepositoryInterface::class,HallTimeFrameRepository::class);
        $this->app->bind(ProgramRepositoryInterface::class,ProgramRepository::class);
        $this->app->bind(RowRepositoryInterface::class,RowRepository::class);
        $this->app->bind(SeatRepositoryInterface::class,SeatRepository::class);
        $this->app->bind(TheaterRepositoryInterface::class,TheaterRepository::class);
        $this->app->bind(CastRepositoryInterface::class,CastRepository::class);
        $this->app->bind(CastTypeRepositoryInterface::class,CastTypeRepository::class);
        $this->app->bind(ProgramCategoriesRepositoryInterface::class,ProgramCategoriesRepository::class);
        $this->app->bind(PartnersRepositoryInterface::class,PartnersRepository::class);
        $this->app->bind(SliderRepositoryInterface::class,SliderRepository::class);
        $this->app->bind(NewslettersRepositoryInterface::class,NewslettersRepository::class);
        $this->app->bind(ContactFormRepositoryInterface::class,ContactFormRepository::class);




    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
