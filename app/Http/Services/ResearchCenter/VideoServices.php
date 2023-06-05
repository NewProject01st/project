<?php
namespace App\Http\Services\ResearchCenter;

use App\Http\Repository\ResearchCenter\VideoRepository;

use App\GalleryCategory;
use Carbon\Carbon;


class VideoServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new VideoRepository();
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
                return ['status' => 'success', 'msg' => ' Video Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Video get Not Added.'];
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
                return ['status' => 'success', 'msg' => 'Video Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Video  Not Updated.'];
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