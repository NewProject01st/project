<?php
namespace App\Http\Services\CitizenAction;

use App\Http\Repository\CitizenAction\ReportIncidentCrowdsourcingRepository;

use App\Models\
{ ReportIncidentCrowdsourcing };
use Carbon\Carbon;
use Config;
use Storage;


class ReportIncidentCrowdsourcingServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ReportIncidentCrowdsourcingRepository();
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
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_ADD');
            //"\all_web_data\images\home\slides\\"."\\";
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Not Added.'];
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
            $return_data = $this->repo->updateAll($request);
            
            $path = Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    unlink(storage_path(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_DELETE') . $return_data['english_image']));

                }
    
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
               
                $incident_data = ReportIncidentCrowdsourcing::find($return_data['last_insert_id']);
                $incident_data->english_image = $englishImageName;
                $incident_data->save();
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    unlink(storage_path(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_DELETE') . $return_data['marathi_image']));
                }
    
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);

                $incident_data = ReportIncidentCrowdsourcing::find($return_data['last_insert_id']);
                $incident_data->marathi_image = $marathiImageName;
                $incident_data->save();
            }
 
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
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