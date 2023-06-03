<?php
namespace App\Http\Repository\NewsAndEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Gallery
};

class GalleryRepository  {
	public function getAll()
    {
        try {
            return Gallery::all();
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

        
        $news_events = new Gallery();
        $news_events->english_image = $englishImageName;
        $news_events->marathi_image =   $marathiImageName;
        $news_events->save();       
              
		return $news_events;

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
        $news_events = Gallery::find($id);
        if ($news_events) {
            return $news_events;
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
        $update_news_events = Gallery::find($request->id);
        
        if (!$update_news_events) {
            return [
                'msg' => 'Gallery data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
       $previousEnglishImage = $update_news_events->english_image;
       $previousMarathiImage = $update_news_events->marathi_image;
       
        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/news-events/gallery/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/news-events/gallery/', $englishImageName);
            $update_news_events->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/news-events/gallery/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/news-events/gallery/', $marathiImageName);
            $update_news_events->marathi_image = $marathiImageName;
        }

        $update_news_events->save();        
     
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
        $news_events = Gallery::find($request); // Assuming $request directly contains the ID

        // Assuming 'is_active' is a field in the Slider model
        if ($news_events) {
            $is_active = $news_events->is_active === 1 ? 0 : 1;
            $news_events->is_active = $is_active;
            // dd($slide);
            $news_events->save();

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
        $news_events = Gallery::find($id);
        if ($news_events) {
             // Delete the images from the storage folder
             Storage::delete([
                'public/images/news-events/gallery/'.$news_events->english_image,
                'public/images/news-events/gallery/'.$news_events->marathi_image
            ]);
            // Delete the record from the database
            $news_events->delete();
            
            return $news_events;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}