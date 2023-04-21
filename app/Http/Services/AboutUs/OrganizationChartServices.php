<?php
namespace App\Http\Services\AboutUs;

use App\Http\Repository\AboutUs\OrganizationChartRepository;

use App\OrganizationChart;
use Carbon\Carbon;


class OrganizationChartServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new OrganizationChartRepository();
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
            $add_organizationchart = $this->repo->addAll($request);
            if ($add_organizationchart) {
                return ['status' => 'success', 'msg' => 'Organization Chart Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'BudOrganization Chart get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($id, $request)
    {
        try {
            $update_organizationchart = $this->repo->updateAll($request);
            if ($update_organizationchart) {
                return ['status' => 'success', 'msg' => 'Organization Chart Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Organization Chart Not Updated.'];
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
