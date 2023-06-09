<?php
namespace App\Http\Services\Header;

use App\Http\Repository\Header\VacanciesRepository;

use App\VacanciesHeader;
use Carbon\Carbon;


class VacanciesHeaderServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new VacanciesRepository();
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
            $add_vacancy = $this->repo->addAll($request);
            if ($add_vacancy) {
                return ['status' => 'success', 'msg' => 'Vacancy Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Vacancy Not Added.'];
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
            $update_vacancy = $this->repo->updateAll($request);
            if ($update_vacancy) {
                return ['status' => 'success', 'msg' => 'Vacancy Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Vacancy Not Updated.'];
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