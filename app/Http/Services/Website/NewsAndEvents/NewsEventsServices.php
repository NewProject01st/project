<?php
namespace App\Http\Services\Website\NewsAndEvents;

use App\Http\Repository\Website\NewsAndEvents\NewsEventsRepository;

// use App\Marquee;
use Carbon\Carbon;


class NewsEventsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new NewsEventsRepository();
    }
    public function getAllDisasterManagementNews()
    {
        try {
            return $this->repo->getAllDisasterManagementNews();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllSuccessStories()
    {
        try {
            return $this->repo->getAllSuccessStories();
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