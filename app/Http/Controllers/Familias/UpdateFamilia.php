<?php

namespace App\Http\Controllers\Familias;

use App\Familia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Familia\FamiliaRepository;

class UpdateFamilia extends Controller
{
    protected $familiaRepository;

    public function __construct(FamiliaRepository $familiaRepository)
    {
        $this->familiaRepository = $familiaRepository;
    }

    public function __invoke(Familia $familia , Request $request)
    {
        $response = $this->familiaRepository->updateFamilia($familia, $request);
        return $response;
    }
}
