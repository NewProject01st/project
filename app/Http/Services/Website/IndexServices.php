<?php
namespace App\Http\Services\Website;

use App\Http\Repository\Website\IndexRepository;

// use App\Marquee;
use Carbon\Carbon;


class IndexServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new IndexRepository();
    }
    public function index()
    {
        try {
            return $this->repo->index();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllLandingContent()
    {
        try {
            return $this->repo->getAllLandingContent();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllSocialIcon()
    {
        try {
            return $this->repo->getAllSocialIcon();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllSubHeader()
    {
        try {
            return $this->repo->getAllSubHeader();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllMarquee()
    {
        try {
            return $this->repo->getAllMarquee();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllSlider()
    {
        try {
            return $this->repo->getAllSlider();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllDisasterManagementWebPortal()
    {
        try {
            return $this->repo->getAllDisasterManagementWebPortal();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllDisasterManagementNews()
    {
        try {
            return $this->repo->getAllDisasterManagementNews();
        } catch (\Exception $e) {
            return $e;
        }
    }    
    public function getAllEmergencyContact()
    {
        try {
            return $this->repo->getAllEmergencyContact();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getLimitDepartmentInformation()
    {
        try {
            return $this->repo->getLimitDepartmentInformation();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllDepartmentInformation()
    {
        try {
            return $this->repo->getAllDepartmentInformation();
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
    
    public function getAllWebDisaterForcast ()
    {
        try {
            return $this->repo->getAllWebDisaterForcast ();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getByIdDepartmentInformation($id)
    {
        try {
            return $this->repo->getByIdDepartmentInformation($id);
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getByIdDisasterForecast($id)
    {
        try {
            return $this->repo->getByIdDisasterForecast($id);
        } catch (\Exception $e) {
            return $e;
        }
    }     
    

    public function getallVacancies()
    {
        try {
            return $this->repo->getallVacancies();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function getAllRTI()
    {
        try {
            return $this->repo->getAllRTI();
        } catch (\Exception $e) {
            return $e;
        }
    }  

    public function getPrivacyPolicy()
    {
        try {
            return $this->repo->getPrivacyPolicy();
        } catch (\Exception $e) {
            return $e;
        }
    }  

    public function getTermCondition()
    {
        try {
            return $this->repo->getTermCondition();
        } catch (\Exception $e) {
            return $e;
        }
    }

    
    public function getAllDisaterForcast()
    {
        try {
            return $this->repo->getAllDisaterForcast();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    
}