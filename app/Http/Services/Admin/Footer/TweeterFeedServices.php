<?php
namespace App\Http\Services\Admin\Footer;

use App\Http\Repository\Admin\Footer\TweeterFeedsRepository;

use App\TweeterFeed;
use Carbon\Carbon;


class TweeterFeedServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new TweeterFeedsRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function add($request)
    {
        try {
            $add_tweeter = $this->repo->add($request);
            if ($add_tweeter) {
                return ['status' => 'success', 'msg' => 'Link Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Link Not Added.'];
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
   
   
    public function update($request)
    {
        $update_tweeter = $this->repo->update($request);
        if ($update_tweeter) {
            return ['status' => 'success', 'msg' => 'Link Updated Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Link Not Updated.'];
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