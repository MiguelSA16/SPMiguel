<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\User;

class DeleteUser extends Controller
{
    protected $userRepository;

    public function __construct( UserRepository $userRepository )
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(User $user)
    {
        $respuesta = $this->userRepository->delete($user);
        if ($respuesta=='201'){
            return response()->json([
                'message' => 'Este usuario fue eliminado'
            ], 201); 
        }
    }
}
