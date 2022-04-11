<?php
namespace App\Http\Controllers\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;

class ListUsers extends Controller
{
    protected $userRepository;
    public function __construct( UserRepository $userRepository )
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(Request $request)
    {
        if($request->ajax()){
            $users =  $this->userRepository->getAll();
            return response()->json([
                'users' => $users
            ],200);
        }      
    }
}


