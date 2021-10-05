<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;

class Recaptcha implements Rule
{
    const URL = 'https://www.google.com/recaptcha/api/siteverify';
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function passes($attribute, $value)
    {
        $options  = [
            'form_params' => [
                'secret'   => config('auth.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => request()->ip()
            ]
        ];
        $response = $this->client->post(static::URL, $options);
        return json_decode($response->getBody(), true)['success'];
    }

    public function message()
    {
        return 'داده های ارسالی اشتباه است. لطفا دوباره تلاش کنید';
    }
}
