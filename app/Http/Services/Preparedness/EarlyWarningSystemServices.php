<?php
namespace App\Http\Services\Preparedness;

use App\Http\Repository\Preparedness\EarlyWarningSystemRepository;

use App\Models\
{ EarlyWarningSystem };
use Carbon\Carbon;
use Config;
use Storage;

class EarlyWarningSystemServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new EarlyWarningSystemRepository();
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
            $path = Config::get('DocumentConstant.EARLY_WARNING_SYSTEM_ADD');
            //"\all_web_data\images\home\slides\\"."\\";
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Early Warning System Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Early Warning System Not Added.'];
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
            
            $path = Config::get('DocumentConstant.EARLY_WARNING_SYSTEM_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.EARLY_WARNING_SYSTEM_DELETE') . $return_data['english_image'])) {
                        removeImage(Config::get('DocumentConstant.EARLY_WARNING_SYSTEM_DELETE') . $return_data['english_image']);
                    }
                }
    
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
               
                $warning_data = EarlyWarningSystem::find($return_data['last_insert_id']);
                $warning_data->english_image = $englishImageName;
                $warning_data->save();
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.EARLY_WARNING_SYSTEM_DELETE') . $return_data['marathi_image'])) {
                        removeImage(Config::get('DocumentConstant.EARLY_WARNING_SYSTEM_DELETE') . $return_data['marathi_image']);
                    }             
                
                }
    
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);

                $warning_data = EarlyWarningSystem::find($return_data['last_insert_id']);
                $warning_data->marathi_image = $marathiImageName;
                $warning_data->save();
            }
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Early Warning System Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Early Warning System Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
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
   



}