<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;


class UserController extends Controller
{
    public function __construct (UserService $userService)
    {
        $this->service = $userService;
    }

    public function index() {
        $users = $this->service->getUsers();
        return $users;
    }

    public function store(Request $request) {
        $newUser = $this->service->create($request->all());
        return $newUser;
    }

    public function delete($id)
    {
        $deletedUser = $this->service->delete($id);
        return response()->json(['message' => 'usuário excluido com sucesso!', $deletedUser]);
    }

    public function update($id , Request $request)
    {
        $updateUser = $this->service->update($id, $request->all());
        return response()->json($updateUser);
    }
}
