<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAll($perPage)
    {
        return User::paginate($perPage);
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function update($id, $data)
    {
        $user = $this->findById($id);
        $user->update($data);

        return $user;
    }

    public function delete($id)
    {
        $user = $this->findById($id);
        $user->delete();

        return $user;
    }
}
