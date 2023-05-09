<?php
namespace App\Http\Services\Website\AboutUs;

use App\Http\Repository\Website\AboutUs\StateDisasterManagementAuthorityRepository;

use App\StateDisasterManagementAuthority;
use Carbon\Carbon;


class StateDisasterManagementAuthorityServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new StateDisasterManagementAuthorityRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

}
