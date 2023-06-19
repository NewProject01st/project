<?php
namespace App\Http\Services\ResourceCenter;

use App\Http\Repository\ResourceCenter\MapGisDataRepository;

use App\Models\
{ MAPGISData };
use Carbon\Carbon;
use Config;
use Storage;

class MapGisDataServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new MapGisDataRepository();
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
            $add_gisdata = $this->repo->add($request);
            if ($add_gisdata) {
                return ['status' => 'success', 'msg' => 'Map Gis Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Map Gis Not Added.'];
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
        $update_map = $this->repo->update($request);
        if ($update_map) {
            return ['status' => 'success', 'msg' => 'Map Gis Added Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Map Gis Not Added.'];
        }  
       
    }
    // public function updateOne($id)
    // {
    //     return $this->repo->updateOne($id);
    // }
    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}