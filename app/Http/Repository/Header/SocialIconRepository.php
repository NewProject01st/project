<?php
namespace App\Http\Repository\Header;
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
public function updateAll($request)
{
    try {
        $return_data = array();
        $social_icon = SocialIcon::find($request->id);
        
        if (!$social_icon) {
            return [
                'msg' => 'social icon not found.',
                'status' => 'error'
            ];
        }
      
        // $social_icon->icon = $englishImageName;
        $social_icon->url =   $request['url'];
        $social_icon->save();        
     
        $last_insert_id = $social_icon->id;

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

public function deleteById($id)
{
    try {
        $social_icon = SocialIcon::find($id);
        if ($social_icon) {
            unlink(storage_path(Config::get('DocumentConstant.SOCIAL_ICON_DELETE') . $social_icon->icon));
            // Delete the record from the database
            
            $social_icon->delete();
            
            return $social_icon;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}