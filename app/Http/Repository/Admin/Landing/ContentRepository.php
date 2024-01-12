<?php
namespace App\Http\Repository\Admin\Landing;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	LandingContent
};
use Config;

class ContentRepository  {
	public function getAll(){
        try {
            return LandingContent::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
        try {
            $data =array();
            $landingcontent = new LandingContent();
            $landingcontent->title = $request['title'];
            $landingcontent->description = $request['description'];
            $landingcontent->url = $request['url'];
            $landingcontent->save(); 
            $last_insert_id = $landingcontent->id;

            $englishImageName = $last_insert_id .'_' . rand(100000, 999999) . '_english.' . $request->image->extension();
            
            $finalcontent = LandingContent::find($last_insert_id); // Assuming $request directly contains the ID
            $finalcontent->image = $englishImageName; // Save the image filename to the database
            $finalcontent->save();
            
            $data['englishImageName'] =$englishImageName;
            return $data;

        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }

    public function getById($id){
        try {
            $landingcontent = LandingContent::find($id);
            if ($landingcontent) {
                return $landingcontent;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id content.',
                'status' => 'error'
            ];
        }
    }
    
    public function updateAll($request){
        try {
            $return_data = array();
            $landingcontent_data = LandingContent::find($request->id);

            if (!$landingcontent_data) {
                return [
                    'msg' => 'Report Incident Crowdsourcing not found.',
                    'status' => 'error'
                ];
            }

            // Store the previous image names
            $previousEnglishImage = $landingcontent_data->image;

            // Update the fields from the request
            $landingcontent_data->title = $request['title'];
            $landingcontent_data->description = $request['description'];
            $landingcontent_data->url = $request['url'];
            $landingcontent_data->save();
            $last_insert_id = $landingcontent_data->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['image'] = $previousEnglishImage;
            return  $return_data;
        
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update landing content.',
                'status' => 'error',
                'error' => $e->getMessage() // Return the error message for debugging purposes
            ];
        }
    }

    public function updateOne($request){
        try {
            $landingcontent = LandingContent::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the landingcontent model
            if ($landingcontent) {
                $is_active = $landingcontent->is_active === 1 ? 0 : 1;
                $landingcontent->is_active = $is_active;
                $landingcontent->save();

                return [
                    'msg' => 'Content updated successfully.',
                    'status' => 'success'
                ];
            }

            return [
                'msg' => 'Content not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update Content.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id){
            try {
                $landingcontent = LandingContent::find($id);
                if ($landingcontent) {
                    if (file_exists_s3(Config::get('DocumentConstant.LANDING_CONTENT_DELETE') . $landingcontent->image)){
                        removeImage(Config::get('DocumentConstant.LANDING_CONTENT_DELETE') . $landingcontent->image);
                    }
                    $landingcontent->delete();
                    
                    return $landingcontent;
                } else {
                    return null;
                }
            } catch (\Exception $e) {
                return $e;
            }
    }


}