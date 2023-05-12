<?php
namespace App\Http\Services\Website;

use App\Http\Repository\Website\IndexRepository;

// use App\Marquee;
use Carbon\Carbon;


class IndexServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new IndexRepository();
    }
    public function getAllMarquee()
    {
        try {
            return $this->repo->getAllMarquee();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllSlider()
    {
        try {
            return $this->repo->getAllSlider();
        } catch (\Exception $e) {
            return $e;
        }
    }    
}