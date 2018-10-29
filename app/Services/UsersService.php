<?php

namespace App\Services;

use App\Repositories\Interfaces\UsersRepositoryInterface;
use App\User;

class UsersService {

    /**
     * @var UsersRepositoryInterface 
     */
    protected $usersRepository;

    /**
     * UsersService Constructor.
     * 
     * @param UsersRepositoryInterface $usersRepository
     */
    public function __construct(UsersRepositoryInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * 
     * @param string $name
     * @param string $email
     * @param string $password
     * @param array $roles
     * @return boolean|User
     */
    public function create($name, $email, $password, $roles)
    {
        if (empty($name) || empty($email) || empty($password) || empty($roles)) {
            return false;
        }

        $user = $this->usersRepository->create(compact('name', 'email', 'password'));
        $user->assignRole($roles);

        return $user;
    }

}
