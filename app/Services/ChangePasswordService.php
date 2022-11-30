<?php

namespace App\Services;

use App\Repositories\ChangePasswordRepository;
use App\Repositories\UserRepository;

class ChangePasswordService
{
    protected $change_password_repository;
    protected $connect_service;
    protected $user_repository;

    public function __construct(
        ConnectService $connect_service,
        ChangePasswordRepository $change_password_repository,
        UserRepository $user_repository
    )
    {
        $this->change_password_repository = $change_password_repository;
        $this->connect_service = $connect_service;
        $this->user_repository = $user_repository;
    }

    public function changePassword($request) {
        $conn = $this->connect_service->connectDataBase();
        $user = $this->user_repository->querySelectUser($conn, $request);
        if(!isset($user->user_email))
        {
            return response()->json(['Email not found'], 422);
        }
        return $this->change_password_repository->queryUpdatePassword($conn, $request);
    }

}