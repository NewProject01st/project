<?php
namespace App\Http\Repository\Admin\ResourceCenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Gallery,
    GalleryCategory
};
use Config;

class GalleryRepository  {
	public function getAll(){
        try {
            $gallery = Gallery::join('gallery_category', 'gallery_category.id','=', 'gallery.Category_id')
            ->select('gallery.is_active as is_active', 'gallery_category.english_name as english_name','gallery.id as id','gallery.category_id as category_id', 'gallery.english_image as english_image', 'gallery.marathi_image as marathi_image')
            ->get();
        return $gallery;
            
        } catch (\Exception $e) {
            return $e;
        }
    }
	public function addAll($request){
    try {
        $data =array();
        $gallery = new Gallery();
        $gallery->category_id = $request['category_id'];
        $gallery->save();
          
        $last_insert_id = $gallery->id;
        

        $englishImageName = $last_insert_id .'_'. rand(100000, 999999) . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id .'_'. rand(100000, 999999) . '_marathi.' . $request->marathi_image->extension();
        
        $gallerys = Gallery::find($last_insert_id); // Assuming $request directly contains the ID
       
        $gallerys->english_image = $englishImageName; // Save the image filename to the database
        $gallerys->marathi_image = $marathiImageName; // Save the image filename to the database
     
        $gallerys->save();

         $data['englishImageName'] =$englishImageName;
        $data['marathiImageName'] =$marathiImageName;
        return $data;

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
        $gallery = Gallery::find($id);
        if ($gallery) {
            return $gallery;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}

public function updateAll($request)
{
    try {
        $return_data = array();
        $update_gallery = Gallery::find($request->id);
        
        if (!$update_gallery) {
            return [
                'msg' => 'Gallery data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
       $previousEnglishImage = $update_gallery->english_image;
       $previousMarathiImage = $update_gallery->marathi_image;

       $update_gallery->save();        
       $last_insert_id = $update_gallery->id;

       $return_data['last_insert_id'] = $last_insert_id;
       $return_data['english_image'] = $previousEnglishImage;
       $return_data['marathi_image'] = $previousMarathiImage;
       return  $return_data;
       
    } catch (\Exception $e) {
        return $e;
    }
}
public function updateOne($request)
{
    try {
        $gallery = Gallery::find($request); // Assuming $request directly contains the ID

        // Assuming 'is_active' is a field in the Slider model
        if ($gallery) {
            $is_active = $gallery->is_active === 1 ? 0 : 1;
            $gallery->is_active = $is_active;
            $gallery->save();

            return [
                'msg' => 'Gallery updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Gallery not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Gallery.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $gallery = Gallery::find($id);
        if ($gallery) {
             // Delete the images from the storage folder
             if (file_exists_s3(Config::get('DocumentConstant.Gallery_DELETE') . $gallery->english_image)) {
                removeImage(Config::get('DocumentConstant.Gallery_DELETE') . $gallery->english_image);
            }
            if (file_exists_s3(Config::get('DocumentConstant.Gallery_DELETE') . $gallery->marathi_image)) {
                removeImage(Config::get('DocumentConstant.Gallery_DELETE') . $gallery->marathi_image);
            }
            $gallery->delete();

            return $gallery;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}