<?php
namespace App\Http\Services\Website\ResearchCenter;

use App\Http\Repository\Website\ResearchCenter\ResearchCenterRepository;

// use App\Marquee;
use Carbon\Carbon;


class ResearchCenterServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ResearchCenterRepository();
    }
    public function getAllDocumentspublications()
    {
        try {
            return $this->repo->getAllDocumentspublications();
        } catch (\Exception $e) {
            return $e;
        }
    } 
     
}