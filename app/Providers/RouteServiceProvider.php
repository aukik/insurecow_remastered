<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(
                    function ($router) {
                        require base_path('routes/Api/Farmer/api.php');
                        require base_path('routes/Api/Farmer/farm_management.php');
                        require base_path('routes/Api/Farmer/insurance.php');


                    }
                );

//            Route::middleware('web')
//                ->namespace($this->namespace)
//                ->group(function ($router) {
//                    base_path('routes/web.php');
//                    base_path('routes/company.php');
//                });

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(function ($router) {
                    require base_path('routes/web.php');
                    require base_path('routes/company.php');
                    require base_path('routes/super_admin.php');
                    require base_path('routes/dashboard.php');
                    require base_path('routes/firm_management.php');


//                    ------------------------------ company total insurance pages with single insurance page ------------------------------

                    require base_path('routes/company/insurance/company_with_premium.php');
                    require base_path('routes/company/insurance/company_without_premium.php');

//                    ------------------------------ company total insurance pages with single insurance page ------------------------------

//                    ------------------------------ Bulk Insurance  ------------------------------

                    require base_path('routes/company/Bulk_insurance/company_with_premium.php');
                    require base_path('routes/company/Bulk_insurance/company_without_premium.php');

//                    ------------------------------ Bulk Insurance ------------------------------

//                    ------------------------------ cms ------------------------------

                    require base_path('routes/cms/cms.php');


//                    ------------------------------ cms ------------------------------

                });
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
