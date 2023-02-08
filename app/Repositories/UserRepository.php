<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserContract;
use App\Models\User;

class UserRepository implements UserContract 
{

    public function index() {
        return User::all();
    }

    public function store($data) {
        return User::create($data);
    }

    public function edit ($id) {
        return User::find($id);
    }

    public function update($data, $id) {
        $user = User::where('id', $id)->first();
        $user['name'] = $data['name'];
        $user['email'] = $data['email'];
        $user['password'] = $data['password'];
        $user->save();
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
    }

}