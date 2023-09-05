<?php

declare(strict_types=1);

namespace App\Http\Controllers\Devices;

use App\Http\Requests\Devices\RegisterRequest;
use App\Jobs\Devices\RegisterNewDeviceForUser;
use Illuminate\Contracts\Auth\Authenticatable;

final readonly class RegisterController
{
    public function __construct(
        private Authenticatable $auth
    )
    {

    }
    public function __invoke(RegisterRequest $request)
    {
        // validate
        dispatch(new RegisterNewDeviceForUser(
            user: $this->auth->getAuthIdentifierName(),
            device: $request->payload()
        ));
        return response()->json([
            'data' => 'We are processing your request'
        ]);
    }
}
