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
    public function getAllUpcomingEvent()
    {
        try {
            return $this->repo->getAllUpcomingEvent();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllPastEvent()
    {
        try {
            return $this->repo->getAllPastEvent();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getById($id)
    {
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }   
}