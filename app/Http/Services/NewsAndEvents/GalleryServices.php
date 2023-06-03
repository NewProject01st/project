<?php
namespace App\Http\Services\NewsAndEvents;

use App\Http\Repository\NewsAndEvents\GalleryRepository;

use App\SuccessStories;
use Carbon\Carbon;


class GalleryServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new GalleryRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request)
    {
        try {
            $add_news = $this->repo->addAll($request);
            if ($add_news) {
                return ['status' => 'success', 'msg' => 'Gallery Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Gallery get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
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
   

    public function updateAll($request)
    {
        try {
            $update_news = $this->repo->updateAll($request);
            if ($update_news) {
                return ['status' => 'success', 'msg' => 'Gallery Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Gallery  Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateOne($id)
    {
        return $this->repo->updateOne($id);
    }

    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
}