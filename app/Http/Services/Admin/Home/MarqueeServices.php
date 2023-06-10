<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\MarqueeRepository;

use App\Marquee;
use Carbon\Carbon;


class MarqueeServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new MarqueeRepository();
    }
    public function getAllMarquee()
    {
        try {
            return $this->repo->getAllMarquee();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addMarquee($request)
    {
        try {
            $add_marquee = $this->repo->addMarquee($request);
            if ($add_marquee) {
                return ['status' => 'success', 'msg' => 'Marquee Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Marquee Not Added.'];
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
   
   
    public function updateMarquee($request)
    {
        $update_marquee = $this->repo->updateMarquee($request);
        if ($update_marquee) {
            return ['status' => 'success', 'msg' => 'Marquee Added Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Marquee Not Added.'];
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