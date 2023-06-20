<?php
namespace App\Http\Repository\Website;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    SocialIcon,
	Marquee,
    Slider,
    DisasterManagementWebPortal,
    DisasterManagementNews,
    EmergencyContact,
    DepartmentInformation,
    VacanciesHeader,
    RTI,
    DisasterForcast
};

class IndexRepository  {

    public function getAllSocialIcon()
    {
        try {
            $data_output = SocialIcon::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('icon','url');
            } else {
                $data_output = $data_output->select('icon','url');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }	

    public function getAllSubHeader()
    {
        try {
            $data_output = Slider::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description','marathi_image','url');
            } else {
                $data_output = $data_output->select('english_title','english_description','english_image','url');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }	
//     public function getAllMarquee()
// {
//     try {
//         $data_output = Marquee::where('is_active', true);
        
//         if (Session::get('language') == 'mar') {
//             $data_output =  $data_output->select('marathi_title','url');
//         } else {
//             $data_output = $data_output->select('english_title','url');
//         }
        
//         $data_output_marquee = $data_output->get();

//         if (Session::get('language') == 'mar') {
//             $output = $data_output_marquee->implode('marathi_title', '|| ');
//         } else {
//             $output = $data_output_marquee->implode('english_title', ' ||  ');
//         }
//         //dd($output);
//         return $output ;
//     } catch (\Exception $e) {
//         return $e;
//     }
// }
	public function getAllMarquee()
    {
        try {
            $data_output = Marquee::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','url');
            } else {
                $data_output = $data_output->select('english_title','url');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        //    echo $data_output;
        //    die();
        } catch (\Exception $e) {
            return $e;
        }
    }   
    public function getAllSlider()
    {
        try {
            $data_output = Slider::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description','marathi_image','url');
            } else {
                $data_output = $data_output->select('english_title','english_description','english_image','url');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }	
    public function getAllDisasterManagementWebPortal()
    {
        try {
            $data_output = DisasterManagementWebPortal::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_name','marathi_title','marathi_description','marathi_designation','marathi_image');
            } else {
                $data_output = $data_output->select('english_name','english_title','english_description','english_designation','english_image');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllDisasterManagementNews()
    {
        try {
            $data_output = DisasterManagementNews::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description','english_url','disaster_date','marathi_image','id');
            } else {
                $data_output = $data_output->select('english_title','english_description','english_url','disaster_date','english_image','id');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function getAllEmergencyContact()
    {
        try {
            $data_output = EmergencyContact::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_name','marathi_address','email','marathi_number','marathi_landline_no');
            } else {
                $data_output = $data_output->select('english_title','english_name','english_address','email','english_number','english_landline_no');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllDepartmentInformation()
    {
        try {
            $data_output = DepartmentInformation::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description','url','marathi_image','id');
            } else {
                $data_output = $data_output->select('english_title','english_description','url','english_image','id');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getById($id)
    {
        try {
            $data_output = DisasterManagementNews::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description','marathi_image');
            } else {
                $data_output = $data_output->select('english_title','english_description','english_image');
            }
            // $data_output =  $data_output->get()
            //                 ->toArray();
                            $data_output = $data_output->where('id', $id)->get()->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getByIdDepartmentInformation($id)
    {
        try {
            $data_output = DepartmentInformation::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description','marathi_image','marathi_image_new');
            } else {
                $data_output = $data_output->select('english_title','english_description','english_image','english_image_new');
            }
            // $data_output =  $data_output->get()
            //                 ->toArray();
                            $data_output = $data_output->where('id', $id)->get()->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getAllVacancies()
    {
        try {
            $data_output = VacanciesHeader::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_pdf');
            } else {
                $data_output = $data_output->select('english_title','english_pdf');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

    
    public function getAllRTI()
    {
        try {
            $data_output = RTI::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_pdf');
            } else {
                $data_output = $data_output->select('english_title','english_pdf');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getAllDisaterForcast(){
        try {
            $data_output = DisasterForcast::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_description');
            } else {
                $data_output = $data_output->select('english_description');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

    // public function getWebContact()
    // {
    //     try {
    //         $data_output = WebsiteContact::where('is_active','=',true);
    //         if (Session::get('language') == 'mar') {
    //             $data_output =  $data_output->select('address_marathi_title','marathi_address','email_title','email','contact_marathi_title','marathi_contact');
    //         } else {
    //             $data_output = $data_output->select('address_english_title','english_address','email_title','email','contact_english_title','english_contact');
    //         }
    //         $data_output =  $data_output->get()
    //                         ->toArray();
    //         return  $data_output;
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }


//     public function getById($id)
// {
//     try {
//         $disaster = DisasterManagementNews::find($id);
//         if ($disaster) {
//             return $disaster;
//                 echo $disaster;
//            die();
//         } else {
//             return null;
//         }
//     } catch (\Exception $e) {
//         return $e;
// 		return [
//             'msg' => 'Failed to get by id Disaster.',
//             'status' => 'error'
//         ];
//     }
// }
}