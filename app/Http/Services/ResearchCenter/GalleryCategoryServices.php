<?php
namespace App\Http\Services\ResearchCenter;

use App\Http\Repository\ResearchCenter\GalleryCategoryRepository;

use App\GalleryCategory;
use Carbon\Carbon;


class GalleryCategoryServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new GalleryCategoryRepository();
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
                return ['status' => 'success', 'msg' => ' Gallery Category Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Gallery Category get Not Added.'];
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
                return ['status' => 'success', 'msg' => 'Gallery Category Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Gallery Category  Not Updated.'];
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