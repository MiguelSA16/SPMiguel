<?php
namespace App\Repositories\Movalm;

use App\Movalm;
use App\Repositories\BaseRepository;

class MovalmRepository extends BaseRepository{

    public function getModel()
    {
        return new Movalm();
    }
    
}
