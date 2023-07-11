<?php
namespace App\Http\Services\Website\CitizenAction;

use App\Http\Repository\Website\CitizenAction\CitizenActionRepository;

use Carbon\Carbon;
use Config;
use Storage;


class CitizenActionServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new CitizenActionRepository();
    }
    public function getAllIncidentType()
    {
        try {
            return $this->repo->getAllIncidentType();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    public function getAllVolunteerCitizenSupport(){
        try {
            return $this->repo->getAllVolunteerCitizenSupport();
        } catch (\Exception $e) {
            return $e;
        }
    } 
  
    
    public function addIncidentModalInfo($request){
        try {
            $last_id = $this->repo->addIncidentModalInfo($request);
            $path = Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_ADD');
            $englishImageName = $last_id . '_english.' . $request->media_upload->extension();
            uploadImage($request, 'media_upload', $path, $englishImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing Modal  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Modal Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function addVolunteerModalInfo($request)
{
    try {

        $last_id = $this->repo->addVolunteerModalInfo($request);
        $path = Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_ADD');
        $englishImageName = $last_id . '_english.' . $request->media_upload->extension();
        $marathiImageName = $last_id . '_english1.' . $request->ngo_photo->extension();
        uploadImage($request, 'media_upload', $path, $englishImageName);
        // uploadImage($request, 'ngo_photo', $path, $marathiImageName);


        // $last_id = $this->repo->addVolunteerModalInfo($request);
        // $path = Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_ADD');
        // $path1 = Config::get('DocumentConstant.VOLUNTEER_CITIZEN_NGO_ADD');
        // // $englishImageName = $last_id . '_english.' . $request->file('media_upload')->getClientOriginalExtension();
        // // $marathiImageName = $last_id . '_english1.' . $request->file('ngo_photo')->getClientOriginalExtension();

        // $englishImageName = $last_id . '_english.' . $request->media_upload->extension();
        // $marathiImageName = $last_id . '_english1.' . $request->ngo_photo->extension();

        // uploadImage($request, 'media_upload', $path, $englishImageName);
        
        if ($request->has('checkbox_field') && $request->input('checkbox_field') == 1) {
            uploadImage($request, 'ngo_photo', $path, $marathiImageName);
            
        }
dd($last_id);
        if ($last_id) {
            return ['status' => 'success', 'msg' => 'Volunteer Citizen Added Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Volunteer Citizen Not Added.'];
        }
    } catch (Exception $e) {
        return ['status' => 'error', 'msg' => $e->getMessage()];
    }
}

//     public function addVolunteerModalInfo($request)
// {
//     try {
//         $last_id = $this->repo->addVolunteerModalInfo($request);
//         $path = Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_ADD');
//         $path1 = Config::get('DocumentConstant.VOLUNTEER_CITIZEN_NGO_ADD');
        
//         $englishImageName = $last_id . '_english.' . $request->media_upload->extension();
//         uploadImage($request, 'media_upload', $path, $englishImageName);
        
//         // Upload ngo_photo if present
//         if ($request->hasFile('ngo_photo')) {
//             $marathiImageName = $last_id . '_marathi.' . $request->ngo_photo->extension();
//             uploadImage($request, 'ngo_photo', $path1, $marathiImageName);
//         }
        
//         if ($last_id) {
//             return ['status' => 'success', 'msg' => 'Volunteer Citizen Added Successfully.'];
//         } else {
//             return ['status' => 'error', 'msg' => 'Volunteer Citizen Not Added.'];
//         }  
//     } catch (Exception $e) {
//         return ['status' => 'error', 'msg' => $e->getMessage()];
//     }      
// }


    // public function addVolunteerModalInfo($request)
    // {
    //     try {
    //         $last_id = $this->repo->addVolunteerModalInfo($request);
    //         $path = Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_ADD');
    //         $path1 = Config::get('DocumentConstant.VOLUNTEER_CITIZEN_NGO_ADD');
    //         // $path =  "\all_web_data\images\home\slides\\"."\\";
    //         $englishImageName = $last_id . '_english.' . $request->media_upload->extension();
    //         $marathiImageName = $last_id . '_marathi.' . $request->ngo_photo->extension();
    //         uploadImage($request, 'media_upload', $path, $englishImageName);
    //         uploadImage($request, 'ngo_photo', $path1, $marathiImageName);

    //         if ($last_id) {
    //             return ['status' => 'success', 'msg' => 'Volunteer Citizen Added Successfully.'];
    //         } else {
    //             return ['status' => 'error', 'msg' => 'Volunteer Citizen  Not Added.'];
    //         }  
    //     } catch (Exception $e) {
    //         return ['status' => 'error', 'msg' => $e->getMessage()];
    //     }      
    // }




}