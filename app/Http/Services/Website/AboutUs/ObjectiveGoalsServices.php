<?php
namespace App\Http\Services\AboutUs;

use App\Http\Repository\AboutUs\ObjectiveGoalsRepository;

use App\ObjectiveGoals;
use Carbon\Carbon;


class ObjectiveGoalsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ObjectiveGoalsRepository();
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
