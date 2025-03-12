<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Возвращает пользователя по ID.
     */
    public function getUserById(int $id): ?array
    {
        return $this->userRepository->findById($id);
    }

    /**
     * Возвращает всех пользователей.
     */
    public function getAllUsers(): array
    {
        return $this->userRepository->findAll();
    }
}
