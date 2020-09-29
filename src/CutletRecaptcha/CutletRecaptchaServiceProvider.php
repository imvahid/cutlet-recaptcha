<?php

namespace Va\CutletRecaptcha;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Va\CutletRecaptcha\Facades\CutletRecaptchaRuleFacade;
use Va\CutletRecaptcha\View\Components\CutletRecaptcha as CutletRecaptchaComponent;

class CutletRecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'cutlet-recaptcha');

        $this->publishes([
            __DIR__ . '/../config/cutlet-recaptcha.php' => config_path('cutlet-recaptcha.php'),
        ], 'cutlet-recaptcha');

        $this->loadViewComponentsAs('', [
            CutletRecaptchaComponent::class
        ]);

        Validator::extend('cutlet_recaptcha', function ($attribute, $value, $parameters, $validator) {
            try{
                $client = new Client(['verify' => false]);
                $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify',
                    [
                        'form_params' => [
                            'secret' => config('cutlet-recaptcha.secret_key'),
                            'response' => $value,
                            'remoteip' => request()->ip()
                        ]
                    ]);
                $response = json_decode($response->getBody());

                return $response->success;
            } catch (Exception $e) {
                return false;
            }
        }, config('cutlet-recaptcha.message'));
    }
}
