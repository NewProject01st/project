<?php
namespace App\Http\Services\Admin\Footer;

use App\Http\Repository\Admin\Footer\SocialIconRepository;

use App\Models\
{ SocialIcon };
use Carbon\Carbon;
use Config;
use Storage;



class SocialIconServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new SocialIconRepository();
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
            $path = Config::get('DocumentConstant.SOCIAL_ICON_ADD');
            $englishImageName = $last_id['englishImageName'];
            uploadImage($request, 'icon', $path, $englishImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Social Icon  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Social Icon Not Added.'];
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
            
            $path = Config::get('DocumentConstant.SOCIAL_ICON_ADD');

            if ($request->hasFile('icon')) {
                if ($return_data['icon']) {
                    if (file_exists_s3(Config::get('DocumentConstant.SOCIAL_ICON_DELETE') . $return_data['icon'])) {
                        removeImage(Config::get('DocumentConstant.SOCIAL_ICON_DELETE') . $return_data['icon']);
                    }
                }
    
                $iconImage = $return_data['last_insert_id'] .'_' . rand(100000, 999999) . '_english.' . $request->icon->extension();
                uploadImage($request, 'icon', $path, $iconImage);
               
                $social_icon = SocialIcon::find($return_data['last_insert_id']);
                $social_icon->icon = $iconImage;
                $social_icon->save();
            }
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Social Icon Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Social Icon Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }





    // public function updateAll($request)
    // {
    //     try {
    //         $return_data = $this->repo->updateAll($request);
            
    //         $path = Config::get('DocumentConstant.SOCIAL_ICON_ADD');
    //         if ($request->hasFile('icon')) {
    //             if ($return_data['icon']) {
    //                 $delete_file_eng= Config::get('DocumentConstant.SOCIAL_ICON_DELETE') . $return_data['icon'];
    //                 if(file_exists_s3($delete_file_eng)){
    //                     removeImage($delete_file_eng);
    //                 }

    //             }
    
    //             $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->icon->extension();
    //             uploadImage($request, 'icon', $path, $englishImageName);
               
    //             $feedback_data = SocialIcon::find($return_data['last_insert_id']);
    //             $feedback_data->icon = $englishImageName;
    //             $feedback_data->save();
    //         }
 
    //         if ($return_data) {
    //             return ['status' => 'success', 'msg' => 'Social Icon Updated Successfully.'];
    //         } else {
    //             return ['status' => 'error', 'msg' => 'Social Icon Not Updated.'];
    //         }  
    //     } catch (Exception $e) {
    //         return ['status' => 'error', 'msg' => $e->getMessage()];
    //     }      
    // }






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