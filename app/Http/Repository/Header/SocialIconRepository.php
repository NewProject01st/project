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
        $englishImageName = time() . '_english.' . $request->icon->extension();
        
        $request->icon->storeAs('public/images/header/social-icon', $englishImageName);

        
        $social_icon = new SocialIcon();
        $social_icon->icon = $englishImageName;
        $social_icon->url = $request['url'];
        $social_icon->save();       
              
		return $social_icon;

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
        $social_icon = SocialIcon::find($request->id);
        
        if (!$social_icon) {
            return [
                'msg' => 'social icon not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/header/social-icon/' . $social_icon->icon,
        ]);
        
        $englishImageName = time() . '_english.' . $request->icon->extension();
        
        $request->icon->storeAs('public/images/header/social-icon/', $englishImageName);

                
        $social_icon->icon = $englishImageName;
        $social_icon->url =   $request['url'];

        $social_icon->save();        
     
        return [
            'msg' => 'social icon updated successfully.',
            'status' => 'success'
        ];
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
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/header/social-icon/'.$social_icon->icon,
                'public/images/header/social-icon/'.$social_icon->marathi_image
            ]);

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