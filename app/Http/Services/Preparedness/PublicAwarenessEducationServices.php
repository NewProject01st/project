<?php
namespace App\Http\Services\Preparedness;

use App\Http\Repository\Preparedness\PublicAwarenessEducationRepository;

use App\Models\
{ PublicAwarenessEducation };
use Carbon\Carbon;
use Config;
use Storage;


class PublicAwarenessEducationServices{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new PublicAwarenessEducationRepository();
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
            $path = Config::get('DocumentConstant.PUBLIC_AWARENESS_EDUCATION_ADD');
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Public Awareness Education  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Public Awareness Education Not Added.'];
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
            
            $path = Config::get('DocumentConstant.PUBLIC_AWARENESS_EDUCATION_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.PUBLIC_AWARENESS_EDUCATION_DELETE') . $return_data['english_image']))) {
                        unlink(storage_path(Config::get('DocumentConstant.PUBLIC_AWARENESS_EDUCATION_DELETE') . $return_data['english_image']));
                    }
                }
    
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
               
                $awareness_data = PublicAwarenessEducation::find($return_data['last_insert_id']);
                $awareness_data->english_image = $englishImageName;
                $awareness_data->save();
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.PUBLIC_AWARENESS_EDUCATION_DELETE') . $return_data['marathi_image']))) {
                        unlink(storage_path(Config::get('DocumentConstant.PUBLIC_AWARENESS_EDUCATION_DELETE') . $return_data['marathi_image']));
                    }

                 }
    
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);

                $awareness_data = PublicAwarenessEducation::find($return_data['last_insert_id']);
                $awareness_data->marathi_image = $marathiImageName;
                $awareness_data->save();
            }
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Public Awareness Education Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Public Awareness Education Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    
   
    public function deleteById($id){
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}