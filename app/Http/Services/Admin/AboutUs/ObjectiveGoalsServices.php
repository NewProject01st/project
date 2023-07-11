<?php
namespace App\Http\Services\Admin\AboutUs;

use App\Http\Repository\Admin\AboutUs\ObjectiveGoalsRepository;

use App\Models\
{
    ObjectiveGoals
};
use Carbon\Carbon;
use Config;


class ObjectiveGoalsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ObjectiveGoalsRepository();
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
            $path = Config::get('DocumentConstant.OBJECTIVE_GOALS_ADD');
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Objective Goals Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Objective Goals get Not Added.'];
            }  
           
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
   
    public function updateAll($request)
    {
        $return_data = $this->repo->updateAll($request);
        $path = Config::get('DocumentConstant.OBJECTIVE_GOALS_ADD');
        if ($request->hasFile('english_image')) {
            if ($return_data['english_image']) {
                if (file_exists_s3(Config::get('DocumentConstant.OBJECTIVE_GOALS_DELETE') . $return_data['english_image'])) {
                    removeImage(Config::get('DocumentConstant.OBJECTIVE_GOALS_DELETE') . $return_data['english_image']);
                }
            }
            $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            $disaster_mgt_data = ObjectiveGoals::find($return_data['last_insert_id']);
            $disaster_mgt_data->english_image = $englishImageName;
            $disaster_mgt_data->save();
        }

        if ($request->hasFile('marathi_image')) {
            if ($return_data['marathi_image']) {
                if (file_exists_s3(Config::get('DocumentConstant.OBJECTIVE_GOALS_DELETE') . $return_data['marathi_image'])) {
                    removeImage(Config::get('DocumentConstant.OBJECTIVE_GOALS_DELETE') . $return_data['marathi_image']);
                }
            }
            $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            $disaster_mgt_data = ObjectiveGoals::find($return_data['last_insert_id']);
            $disaster_mgt_data->marathi_image = $marathiImageName;
            $disaster_mgt_data->save();
        }


        if ($return_data) {
            return ['status' => 'success', 'msg' => 'Objective Goals Updated Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Objective Goals Not Updated.'];
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