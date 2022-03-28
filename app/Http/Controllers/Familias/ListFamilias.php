<?php

namespace App\Http\Controllers\Familias;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Familia\FamiliaRepository;

class ListFamilias extends Controller
{
    protected $familiaRepository;

    public function __construct(FamiliaRepository $familiaRepository)
    {
        $this->familiaRepository = $familiaRepository;
    }

    public function __invoke(Request $request)
    {
        if($request->ajax()){
            $familias = $this->familiaRepository->getAll();

            return response()->json([
                'familias' => $familias
            ], 200);
        }
    }
}
