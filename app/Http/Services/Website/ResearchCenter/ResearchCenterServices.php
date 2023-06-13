<?php
namespace App\Http\Services\Website\ResourceCenter;

use App\Http\Repository\Website\ResourceCenter\ResourceCenterRepository;

// use App\Marquee;
use Carbon\Carbon;


class ResourceCenterServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ResourceCenterRepository();
    }
    public function getAllDocumentspublications()
    {
        try {
            return $this->repo->getAllDocumentspublications();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllVideo()
    {
        try {
            return $this->repo->getAllVideo();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllGallery($request)
    {
        try {
            return $this->repo->getAllGallery($request);
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllTrainingMaterial()
    {
        try {
            return $this->repo->getAllTrainingMaterial();
        } catch (\Exception $e) {
            return $e;
        }
    }
    
     
}