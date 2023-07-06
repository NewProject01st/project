<?php
namespace App\Http\Services\NewsAndEvents;

use App\Http\Repository\NewsAndEvents\SuccessStoriesRepository;

use App\Models\
{ SuccessStories };
use Carbon\Carbon;
use Config;
use Storage;


class SuccessStoriesServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new SuccessStoriesRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request){
        try {
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.SUCCESS_STORIES_ADD');
            // $path =  "\all_web_data\images\home\slides\\"."\\";
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
           

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Success Stories Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Success Stories  get Not Added.'];
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
   



    public function updateAll($request){
        try {
            $return_data = $this->repo->updateAll($request);
            
            $path = Config::get('DocumentConstant.SUCCESS_STORIES_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists(storage_path(Config::get('DocumentConstant.SUCCESS_STORIES_DELETE') . $return_data['english_image']))) {
                        unlink(storage_path(Config::get('DocumentConstant.SUCCESS_STORIES_DELETE') . $return_data['english_image']));
                    }

                }
    
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $slide_data = SuccessStories::find($return_data['last_insert_id']);
                $slide_data->english_image = $englishImageName;
                $slide_data->save();
            }
                
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Success Stories Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Success Stories  Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }   
    public function updateOne($id)
    {
        return $this->repo->updateOne($id);
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