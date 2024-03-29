<?php
namespace App\Http\Services\Admin\EmergencyResponse;

use App\Http\Repository\Admin\EmergencyResponse\EmergencyContactNumbersRepository;
use App\Models\
{
    EmergencyContactNumbers
};
use Config;

class EmergencyContactNumbersServices
{

    protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new EmergencyContactNumbersRepository();
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
            $path = Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_ADD');
            //"\all_web_data\images\home\slides\\"."\\";
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Emergency Contact Numbers Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Emergency Contact Numbers get Not Added.'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }
    }

    public function getAddMoreContactNumbers() {
        try {
            $contact_data = $this->repo->getAddMoreContactNumbers();
            return $contact_data;

        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error',
            ];
        }

    }

    public function addAllAddMore($request) {
        try {
            $last_id = $this->repo->addAllAddMore($request);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Emergency Contact Numbers Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Emergency Contact Numbers get Not Added.'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }
    }

    public function updateAll($request)
    {
        try {
            $return_data = $this->repo->updateAll($request);

            $path = Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_DELETE') . $return_data['english_image'])) {
                        removeImage(Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_DELETE') . $return_data['english_image']);
                    }
                }

                $englishImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);

                $emergency_contact_data = EmergencyContactNumbers::find($return_data['last_insert_id']);
                $emergency_contact_data->english_image = $englishImageName;
                $emergency_contact_data->save();
            }

            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_DELETE') . $return_data['marathi_image'])) {
                        removeImage(Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_DELETE') . $return_data['marathi_image']);
                    }

                }

                $marathiImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);

                $emergency_contact_data = EmergencyContactNumbers::find($return_data['last_insert_id']);
                $emergency_contact_data->marathi_image = $marathiImageName;
                $emergency_contact_data->save();
            }

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Emergency Contact Numbers Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Emergency Contact Numbers Not Updated.'];
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


    public function deleteaddmore($id){
        try {
            $delete = $this->repo->deleteaddmore($id);
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