<?php
namespace App\Http\Services\AboutUs;

use App\Http\Repository\AboutUs\DisasterManagementPortalRepository;

use App\DisasterManagementPortal;
use Carbon\Carbon;


class DisasterManagementPortalServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DisasterManagementPortalRepository();
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
