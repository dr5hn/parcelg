<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;


// https://codebriefly.com/laravel-5-6-custom-token-base-api-authentication/
// https://laravel.com/docs/5.8/api-authentication
// https://laravelcode.com/post/laravel-55-login-with-only-mobile-number-using-laravel-custom-auth
class ApiTokenController extends Controller
{
    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request)
    {
        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }

}
