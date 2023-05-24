<?php
namespace App\Http\Services\Website\TrainingEvent;

use App\Http\Repository\Website\TrainingEvent\EventRepository;

// use App\Marquee;
use Carbon\Carbon;


class EventServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new EventRepository();
    }
    public function getAllEvent()
    {
        try {
            return $this->repo->getAllEvent();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
   
}