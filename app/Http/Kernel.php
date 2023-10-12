<?php

namespace App\Http;

use App\Http\Middleware\Company\PremiumInsuranceMiddleware;
use App\Http\Middleware\Company\RegisterAgentMiddleware;
use App\Http\Middleware\CompanyMiddleware;
use App\Http\Middleware\Farmer\ApplyForInsuranceMiddleware;
use App\Http\Middleware\Farmer\CattleRegistrationMiddleware;
use App\Http\Middleware\Farmer\FarmManagementMiddleware;
use App\Http\Middleware\FarmerMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        'super.admin' => SuperAdminMiddleware::class,
        'farmer' => FarmerMiddleware::class,
        'company' => CompanyMiddleware::class,

// -------------------------- Farmer Api middleware --------------------------

        'api.farmer' => Middleware\Api\Farmer\FarmerApiMiddleware::class,
        'api.farmer.cattle_reg' => Middleware\Api\Farmer\FarmerCattleRegistrationMiddleware::class,

// -------------------------- Farmer Api middleware --------------------------


        'company.register_agent' => RegisterAgentMiddleware::class,
        'company.premium_insurance' => PremiumInsuranceMiddleware::class,
        'farmer.cattle_reg' => CattleRegistrationMiddleware::class,
        'farmer.insurance' => ApplyForInsuranceMiddleware::class,
        'farmer.farm_management' => FarmManagementMiddleware::class,

    ];
}
