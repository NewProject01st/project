<?php
namespace App\Http\Services\CitizenAction;

use App\Http\Repository\CitizenAction\VolunteerCitizenModalRepository;

use App\CitizenVolunteerModal;
use Carbon\Carbon;


class VolunteerCitizenModalServices{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct(){
        $this->repo = new VolunteerCitizenModalRepository();
    }
    public function getAll(){
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function deleteById($id){
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
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


}