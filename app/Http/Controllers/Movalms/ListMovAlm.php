<?php

namespace App\Http\Controllers\Movalms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Movalm\MovalmRepository;



class ListMovAlm extends Controller
{
    protected $movalmRepository;

    public function __construct(MovalmRepository $movalmRepository)
    {
        $this->movalmRepository = $movalmRepository;
    }

    public function __invoke(Request $request){
        
        if($request->ajax()){
            
            $movalm = $this->movalmRepository->getAll();

            return response()->json([
                
                'movalm' => $movalm
            ], 200);
        }
    }
}
