<?php
namespace App\Http\Services\ResourceCenter;

use App\Http\Repository\ResourceCenter\GalleryRepository;

use App\Models\
{ Gallery };
use Carbon\Carbon;
use Config;
use Storage;

class GalleryServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new GalleryRepository();
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
            $path = Config::get('DocumentConstant.Gallery_ADD');
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Gallery Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Gallery get Not Added.'];
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

            
            $path = Config::get('DocumentConstant.Gallery_ADD');

            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    $delete_file_eng= storage_path(Config::get('DocumentConstant.Gallery_DELETE') . $return_data['english_image']);
                    if(file_exists($delete_file_eng)){
                        unlink($delete_file_eng);
                    }
                }
    
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $gallery = Gallery::find($return_data['last_insert_id']);
                $gallery->english_image = $englishImageName;
                $gallery->save();
    
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    $delete_file_mar= storage_path(Config::get('DocumentConstant.Gallery_DELETE') . $return_data['marathi_image']);
                    if(file_exists($delete_file_mar)){
                        unlink($delete_file_mar);
                    }
                }
    
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);
                $district_plan = Gallery::find($return_data['last_insert_id']);
                $district_plan->marathi_image = $marathiImageName;
                $district_plan->save();
            }       

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Gallery Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Gallery  Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateOne($id){
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