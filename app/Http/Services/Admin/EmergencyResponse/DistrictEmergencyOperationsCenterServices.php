<?php
namespace App\Http\Services\Admin\EmergencyResponse;

use App\Http\Repository\Admin\EmergencyResponse\DistrictEmergencyOperationsCenterRepository;

use App\Models\
{ DistrictEmergencyOperationsCenter };
use Carbon\Carbon;
use Config;
use Storage;

class DistrictEmergencyOperationsCenterServices{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct(){
        $this->repo = new DistrictEmergencyOperationsCenterRepository();
    }
    public function getAll(){
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request){
        try {
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.DISTRICT_OPERATION_CENTER_ADD');
            //"\all_web_data\images\home\slides\\"."\\";
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'District Emergency Operations Center Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'District Emergency Operations Center get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request){
        try {
            $return_data = $this->repo->updateAll($request);
            
            $path = Config::get('DocumentConstant.DISTRICT_OPERATION_CENTER_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.DISTRICT_OPERATION_CENTER_DELETE') . $return_data['english_image'])) {
                        removeImage(Config::get('DocumentConstant.DISTRICT_OPERATION_CENTER_DELETE') . $return_data['english_image']);
                    }
                }
    
                $englishImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
               
                $district_operation_data = DistrictEmergencyOperationsCenter::find($return_data['last_insert_id']);
                $district_operation_data->english_image = $englishImageName;
                $district_operation_data->save();
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.DISTRICT_OPERATION_CENTER_DELETE') . $return_data['marathi_image'])) {
                        removeImage(Config::get('DocumentConstant.DISTRICT_OPERATION_CENTER_DELETE') . $return_data['marathi_image']);
                    }    

                 }
    
                $marathiImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);

                $district_operation_data = DistrictEmergencyOperationsCenter::find($return_data['last_insert_id']);
                $district_operation_data->marathi_image = $marathiImageName;
                $district_operation_data->save();
            }


           
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'District Emergency Operations Center Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'District Emergency Operations Center Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function getById($id) {
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function deleteById($id)
    {
        try {
            $delete = $this->repo->deleteById($id);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }



}