<?php
namespace App\Http\Services\Admin\Preparedness;

use App\Http\Repository\Admin\Preparedness\CapacityTrainingRepository;

use App\Models\
{ CapacityTraining };
use Carbon\Carbon;
use Config;
use Storage;

class CapacityTrainingServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new CapacityTrainingRepository();
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
            $path = Config::get('DocumentConstant.CAPACITY_TRAINING_ADD');
            //"\all_web_data\images\home\slides\\"."\\";
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Capacity Building and Training  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Capacity Building and Training Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function getById($id){
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateAll($request){
        try {
            $return_data = $this->repo->updateAll($request);
            
            $path = Config::get('DocumentConstant.CAPACITY_TRAINING_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.CAPACITY_TRAINING_DELETE') . $return_data['english_image'])) {
                        removeImage(Config::get('DocumentConstant.CAPACITY_TRAINING_DELETE') . $return_data['english_image']);
                    }
                }
    
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
               
                $training_data = CapacityTraining::find($return_data['last_insert_id']);
                $training_data->english_image = $englishImageName;
                $training_data->save();
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.CAPACITY_TRAINING_DELETE') . $return_data['marathi_image'])) {
                        removeImage(Config::get('DocumentConstant.CAPACITY_TRAINING_DELETE') . $return_data['marathi_image']);
                    }          
                    }
    
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);

                $training_data = CapacityTraining::find($return_data['last_insert_id']);
                $training_data->marathi_image = $marathiImageName;
                $training_data->save();
            }


           
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Capacity Building and Training Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Capacity Building and Training Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    
   
    public function deleteById($id) {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}