<?php
namespace App\Http\Repository\Footer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	SocialIcon
};
use Config;

class SocialIconRepository{
	public function getAll()
    {
        try {
            return SocialIcon::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $social_icon = new SocialIcon();
        $social_icon->url = $request['url'];
        $social_icon->save();       
              
        $last_insert_id = $social_icon->id;

        $englishImageName = $last_insert_id . '_english.' . $request->icon->extension();
        
        $social_icons = SocialIcon::find($last_insert_id); // Assuming $request directly contains the ID
        $social_icons->icon = $englishImageName; // Save the image filename to the database
        $social_icons->save();

        return $last_insert_id;

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $social_icon = SocialIcon::find($id);
        if ($social_icon) {
            return $social_icon;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id social icon.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request){
    try {
        $return_data = array();
        $update_news_events = SocialIcon::find($request->id);
        
        if (!$update_news_events) {
            return [
                'msg' => 'social icon not found.',
                'status' => 'error'
            ];
        }
    // Store the previous image names
    $previousEnglishImage = $update_news_events->icon;

        $update_news_events->url = $request['url'];
    

        $update_news_events->save();
        $last_insert_id = $update_news_events->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['icon'] = $previousEnglishImage;
        return  $return_data;

    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update social icon.',
            'status' => 'error'
        ];
    }
}



public function deleteById($id){
    try {
        $social = SocialIcon::find($id);
        if ($social) {
            if (file_exists_s3(Config::get('DocumentConstant.SOCIAL_ICON_DELETE') . $social->icon)) {
                removeImage(Config::get('DocumentConstant.SOCIAL_ICON_DELETE') . $social->icon);
            }
            $social->delete();
            
            return $social;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
     
public function updateOne($request){
    try {
        $social = SocialIcon::find($request); // Assuming $request directly contains the ID

        // Assuming 'is_active' is a field in the socialr model
        if ($social) {
            $is_active = $social->is_active === 1 ? 0 : 1;
            $social->is_active = $is_active;
            $social->save();

            return [
                'msg' => 'Social updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Social not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update social.',
            'status' => 'error'
        ];
    }
}
}