<?php
namespace App\Http\Repository\Header;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	WebsiteLogo
};
use Config;

class WebsiteLogoRepository{
	public function getAll()
    {
        try {
            return WebsiteLogo::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        
        $website_logo = new WebsiteLogo();
        // $website_logo->url = $request['url'];
        $website_logo->save();       
              
        $last_insert_id = $website_logo->id;

        $englishImageName = $last_insert_id . '_english.' . $request->logo->extension();
        
        $website_logo = WebsiteLogo::find($last_insert_id); // Assuming $request directly contains the ID
        $website_logo->logo = $englishImageName; // Save the image filename to the database
        $website_logo->save();
        
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
        $website_logo = WebsiteLogo::find($id);
        if ($website_logo) {
            return $website_logo;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id website logo.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $return_data = array();
        $website_logo = WebsiteLogo::find($request->id);

        if (!$website_logo) {
            return [
                'msg' => 'Website logo not found.',
                'status' => 'error'
            ];
        }

        // Store the previous image names
        $previousEnglishImage = $website_logo->logo;

       
        $website_logo->save();
        $last_insert_id = $website_logo->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['logo'] = $previousEnglishImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update website logo.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $logo = WebsiteLogo::find($id);
        if ($logo) {
            if (file_exists(storage_path(Config::get('DocumentConstant.WEBSITE_LOGO_DELETE')))) {
                unlink(storage_path(Config::get('DocumentConstant.WEBSITE_LOGO_DELETE')));
            }
            
            $logo->delete();
            
            return $logo;
            
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}