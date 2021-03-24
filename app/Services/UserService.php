<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }

    public function getUsers() {
        $getUsers = $this->model->all();
        return response()->json($getUsers);
    }
    
    public function create($data) 
    {
        // tratamento  do data
        $data['password'] = Hash::make($data['password']);
        $data['email'] = strtolower($data['email']);
        
        $newUser = $this->model->create($data);
        return response()->json($newUser);

    }

    public function delete($id)
    {
        $user = $this->model->find($id);
        if($user)
        {
            $deletedUser = $user->delete();
            return $deletedUser;
        }
        
    }

    public function update($id ,$data)
    {
        $updatedUser = $this->model->find($id);
        
        if(isset($updatedUser))
        {
            $updatedUser->name = $data['name'];
            $updatedUser->email = $data['email'];
            $updatedUser->password = $data['password'];
            $updatedUser->save();

            return $updatedUser;
        }

    }
}