<?php

namespace App\Repositories\Familia_clg;

use App\Familia_clg;
use App\Repositories\BaseRepository;

class Familia_clgRepository extends BaseRepository{

    public function getModel()
    {
        return new Familia_clg();
    }
}