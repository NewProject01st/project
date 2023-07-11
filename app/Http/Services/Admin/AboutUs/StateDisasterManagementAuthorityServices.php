<?php
namespace App\Http\Services\Admin\AboutUs;

use App\Http\Repository\Admin\AboutUs\StateDisasterManagementAuthorityRepository;

use App\Models\
{
    StateDisasterManagementAuthority
};
use Carbon\Carbon;
use Config;

class StateDisasterManagementAuthorityServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new StateDisasterManagementAuthorityRepository();
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
            $path = Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_ADD');
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'State Disaster Management Authority Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Disaster Management Authority get Not Added.'];
            }  
            if ($add_StateDisasterManagementAuthority) {
                return ['status' => 'success', 'msg' => 'State Disaster Management Authority Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Disaster Management Authority get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $return_data = $this->repo->updateAll($request);
            $path = Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_DELETE') . $return_data['english_image'])) {
                        removeImage(Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_DELETE') . $return_data['english_image']);
                    }

                }
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $disaster_mgt_data = StateDisasterManagementAuthority::find($return_data['last_insert_id']);
                $disaster_mgt_data->english_image = $englishImageName;
                $disaster_mgt_data->save();
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_DELETE') . $return_data['marathi_image'])) {
                        removeImage(Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_DELETE') . $return_data['marathi_image']);
                    }
                }
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);
                $disaster_mgt_data = StateDisasterManagementAuthority::find($return_data['last_insert_id']);
                $disaster_mgt_data->marathi_image = $marathiImageName;
                $disaster_mgt_data->save();
            }

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'State Disaster Management Authority Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Disaster Management Authority Not Updated.'];
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
    public function deleteById($id){
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