<?php
namespace App\Http\Services\Admin\Landing;

use App\Http\Repository\Admin\Landing\ContentRepository;

use App\Models\
{ LandingContent };
use Carbon\Carbon;
use Config;
use Storage;

class ContentServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ContentRepository();
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
            $path = Config::get('DocumentConstant.LANDING_CONTENT_ADD');
            $englishImageName = $last_id['englishImageName'];
            uploadImage($request, 'image', $path, $englishImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Landing Logo Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Landing Logo get Not Added.'];
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
            
            $path = Config::get('DocumentConstant.LANDING_CONTENT_ADD');
            if ($request->hasFile('image')) {
                if ($return_data['image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.LANDING_CONTENT_DELETE') . $return_data['image'])) {
                        removeImage(Config::get('DocumentConstant.LANDING_CONTENT_DELETE') . $return_data['image']);
                    }

                }
                $englishImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_english.' . $request->image->extension();
                uploadImage($request, 'image', $path, $englishImageName);
                $landingcontent_data = LandingContent::find($return_data['last_insert_id']);
                $landingcontent_data->image = $englishImageName;
                $landingcontent_data->save();
            }
                
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Landing Content Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Landing Content  Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateOne($id){
        return $this->repo->updateOne($id);
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