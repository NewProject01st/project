<?php
namespace App\Http\Services\EmergencyResponse;

use App\Http\Repository\EmergencyResponse\SearchRescueTeamsRepository;

use App\SearchRescueTeams;
use Carbon\Carbon;


class SearchRescueTeamsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new SearchRescueTeamsRepository();
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
            $add_searchrescueteams = $this->repo->addAll($request);
            if ($add_searchrescueteams) {
                return ['status' => 'success', 'msg' => 'Search Rescue Team Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Search Rescue Team get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_searchrescueteams = $this->repo->updateAll($request);
            if ($update_searchrescueteams) {
                return ['status' => 'success', 'msg' => 'Search Rescue Team Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Search Rescue Team Not Updated.'];
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
