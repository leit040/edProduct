<?php

namespace App\Providers\Services;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use phpDocumentor\Reflection\File;

interface UserInterface
{
    public function create(StoreUserRequest $request): ?User;

}
