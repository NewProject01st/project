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
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/header/social-icon', $englishImageName);
        $request->marathi_image->storeAs('public/images/header/social-icon', $marathiImageName);

        
        $social_icon = new SocialIcon();
        $social_icon->english_image = $englishImageName;
        $social_icon->marathi_image =   $marathiImageName;
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
            'public/images/header/social-icon/' . $social_icon->english_image,
            'public/images/header/social-icon/' . $social_icon->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/header/social-icon/', $englishImageName);
        $request->marathi_image->storeAs('public/images/header/social-icon/', $marathiImageName);

                
        $social_icon->english_image = $englishImageName;
        $social_icon->marathi_image =   $marathiImageName;
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
                'public/images/header/social-icon/'.$social_icon->english_image,
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