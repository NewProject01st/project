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
    public function getAllVideo()
    {
        try {
            return $this->repo->getAllVideo();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllGallery()
    {
        try {
            return $this->repo->getAllGallery();
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