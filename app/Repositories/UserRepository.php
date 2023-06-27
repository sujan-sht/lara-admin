<?php

namespace App\Repositories;

use App\Models\User;
use App\Contracts\UserRepositoryInterface;
use App\Http\Requests\UserRequest;

class UserRepository implements UserRepositoryInterface
{
    // User Index
    public function indexUser()
    {
        $users = User::all();
        return compact('users');
    }

    // User Create
    public function createUser()
    {
        //
    }

    // User Store
    public function storeUser(UserRequest $request)
    {
        User::create($request->validated());
    }

    // User Show
    public function showUser(User $user)
    {
        return compact('user');
    }

    // User Edit
    public function editUser(User $user)
    {
        return compact('user');
    }

    // User Update
    public function updateUser(UserRequest $request, User $user)
    {
        $user->update($request->validated());
    }

    // User Destroy
    public function destroyUser(User $user)
    {
        $user->delete();
    }
}
