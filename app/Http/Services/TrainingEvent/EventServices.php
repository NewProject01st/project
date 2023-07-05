<?php
namespace App\Http\Services\TrainingEvent;

use App\Http\Repository\TrainingEvent\EventRepository;

use App\Models\
{ Event };
use Carbon\Carbon;
use Config;
use Storage;

class EventServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct(){
        $this->repo = new EventRepository();
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
            $path = Config::get('DocumentConstant.TRAINING_EVENT_ADD');
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Training Event Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Training Event Not Added.'];
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
            
            $path = Config::get('DocumentConstant.TRAINING_EVENT_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.TRAINING_EVENT_DELETE') . $return_data['english_image']))) {
                        unlink(storage_path(Config::get('DocumentConstant.TRAINING_EVENT_DELETE') . $return_data['english_image']));
                    }

                }
    
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $slide_data = Event::find($return_data['last_insert_id']);
                $slide_data->english_image = $englishImageName;
                $slide_data->save();
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.TRAINING_EVENT_DELETE') . $return_data['marathi_image']))) {
                        unlink(storage_path(Config::get('DocumentConstant.TRAINING_EVENT_DELETE') . $return_data['marathi_image']));
                    }
                }
    
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);
                $slide_data = Event::find($return_data['last_insert_id']);
                $slide_data->marathi_image = $marathiImageName;
                $slide_data->save();
            }
            
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Training Event Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Training Event Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
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