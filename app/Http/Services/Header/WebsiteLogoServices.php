<?php
namespace App\Http\Services\Header;

use App\Http\Repository\Header\WebsiteLogoRepository;

use App\Models\
{ WebsiteLogo };
use Carbon\Carbon;
use Config;
use Storage;


class WebsiteLogoServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new WebsiteLogoRepository();
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
            $path = Config::get('DocumentConstant.WEBSITE_LOGO_ADD');
            $englishImageName = 'logo' . $request->logo->extension();
            uploadImage($request, 'logo', $path, $englishImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Website Logo Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Website Logo Added.'];
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
            $path = Config::get('DocumentConstant.WEBSITE_LOGO_ADD');
            if ($request->hasFile('logo')) {
                if ($return_data['logo']) {
                    $delete_file_path_eng  = storage_path(Config::get('DocumentConstant.WEBSITE_LOGO_DELETE'));
                    if (file_exists($delete_file_path_eng)) {
                        unlink($delete_file_path_eng);
                    }
                }
                $englishImageName = 'logo.' . $request->logo->extension();
                uploadImage($request, 'logo', $path, $englishImageName);
                $website_logo = WebsiteLogo::find($return_data['last_insert_id']);
                $website_logo->logo = $englishImageName;
                $website_logo->save();
            }
    
           
            
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Website logo Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Website logo Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    
    // public function updateOne($id)
    // {
    //     return $this->repo->updateOne($id);
    // }
    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}