<?php

namespace App\Providers\Services;

use App\Http\Requests\StoreUserRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService implements UserInterface
{
    public FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create(StoreUserRequest $request): ?User
    {
        $avatar = $this->fileService->create($request->allFiles());
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar['avatar'],
        ];
        $user = User::create($userData);

        return $user;
    }

}
