<?php
namespace App\Http\Repository\ResearchCenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Gallery,
    GalleryCategory
};

class GalleryRepository  {
	public function getAll()
    {
        try {

            $gallery = Gallery::join('gallery_category', 'gallery_category.id','=', 'gallery.Category_id')
            ->get();
        return $gallery;
            
        } catch (\Exception $e) {
            return $e;
        }
    }
	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/news-events/gallery', $englishImageName);
        $request->marathi_image->storeAs('public/images/news-events/gallery', $marathiImageName);

        
        $gallery = new Gallery();
        $gallery->category_id = $request['category_id'];
        $gallery->english_image = $englishImageName;
        $gallery->marathi_image =   $marathiImageName;
        // dd( $gallery);
        $gallery->save();       
              
		return $gallery;

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
		return [
            'msg' => 'Failed to get by id Gallery.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request)
{
    try {
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
       
        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/news-events/gallery/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/news-events/gallery/', $englishImageName);
            $update_gallery->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/news-events/gallery/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/news-events/gallery/', $marathiImageName);
            $update_gallery->marathi_image = $marathiImageName;
        }

        $update_gallery->save();        
     
        return [
            'msg' => 'Gallery data updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Gallery data.',
            'status' => 'error'
        ];
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
            // dd($slide);
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
             Storage::delete([
                'public/images/news-events/gallery/'.$gallery->english_image,
                'public/images/news-events/gallery/'.$gallery->marathi_image
            ]);
            // Delete the record from the database
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