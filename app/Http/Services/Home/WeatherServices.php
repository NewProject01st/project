<?php
namespace App\Http\Services\Home;

use App\Http\Repository\Home\WeatherRepository;

use App\Weather;
use Carbon\Carbon;


class WeatherServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new WeatherRepository();
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
            $add_weather = $this->repo->addAll($request);
            if ($add_weather) {
                return ['status' => 'success', 'msg' => 'Weather Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Weather Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_weather = $this->repo->updateAll($request);
            if ($update_weather) {
                return ['status' => 'success', 'msg' => 'Weather Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Weather Not Updated.'];
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
   
    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}
