<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\DepartmentInformationRepository;

use App\Models\DepartmentInformation;
use Carbon\Carbon;
use Config;

class DepartmentInformationServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DepartmentInformationRepository();
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
            $path = Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_ADD');
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $englishImageName1 = $last_id . '_english1.' . $request->english_image_new->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            $marathiImageName1 = $last_id . '_marathi1.' . $request->marathi_image_new->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'english_image_new', $path, $englishImageName1);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            uploadImage($request, 'marathi_image_new', $path, $marathiImageName1);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'State Disaster Management Authority Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Disaster Management Authority get Not Added.'];
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

            $path = Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['english_image']))) {
                        unlink(storage_path(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['english_image']));
                    }
                }
                $englishImageName = $return_data['last_insert_id'] . '_english_icon.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $disaster_mgt_data = DepartmentInformation::find($return_data['last_insert_id']);
                $disaster_mgt_data->english_image = $englishImageName;
                $disaster_mgt_data->save();
            }

            if ($request->hasFile('english_image_new')) {
                if ($return_data['english_image_new']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['english_image_new']))) {
                        unlink(storage_path(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['english_image_new']));
                    }
                }
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image_new->extension();
                uploadImage($request, 'english_image_new', $path, $englishImageName);
                $disaster_mgt_data = DepartmentInformation::find($return_data['last_insert_id']);
                $disaster_mgt_data->english_image_new = $englishImageName;
                $disaster_mgt_data->save();
            }

            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['marathi_image']))) {
                        unlink(storage_path(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['marathi_image']));
                    }
                }
                $marathiImageName = $return_data['last_insert_id'] . '_marathi_icon.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);
                $disaster_mgt_data = DepartmentInformation::find($return_data['last_insert_id']);
                $disaster_mgt_data->marathi_image = $marathiImageName;
                $disaster_mgt_data->save();
            }

            if ($request->hasFile('marathi_image_new')) {
                if ($return_data['marathi_image_new']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['marathi_image_new']))) {
                        unlink(storage_path(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['marathi_image_new']));
                    }
                }
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image_new->extension();
                uploadImage($request, 'marathi_image_new', $path, $marathiImageName);
                $disaster_mgt_data = DepartmentInformation::find($return_data['last_insert_id']);
                $disaster_mgt_data->marathi_image_new = $marathiImageName;
                $disaster_mgt_data->save();
            }

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Department Data Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Department Data  Not Added.'];
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