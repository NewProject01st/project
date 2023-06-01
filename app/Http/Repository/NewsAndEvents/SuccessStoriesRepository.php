<?php
namespace App\Http\Repository\NewsAndEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	SuccessStories
};

class SuccessStoriesRepository  {
	public function getAll()
    {
        try {
            return SuccessStories::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/news-events/success-stories', $englishImageName);
        $request->marathi_image->storeAs('public/images/news-events/success-stories', $marathiImageName);

        
        $news_events = new SuccessStories();
        $news_events->english_title = $request['english_title'];
        $news_events->marathi_title = $request['marathi_title'];
        $news_events->english_description = $request['english_description'];
        $news_events->marathi_description = $request['marathi_description'];
        $news_events->english_designation = $request['english_designation'];
        $news_events->marathi_designation = $request['marathi_designation'];
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
        $news_events = SuccessStories::find($id);
        if ($news_events) {
            return $news_events;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id documents.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request)
{
    try {
        $update_news_events = SuccessStories::find($request->id);
        
        if (!$update_news_events) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
       $previousEnglishImage = $update_news_events->english_image;
       $previousMarathiImage = $update_news_events->marathi_image;

        $update_news_events->english_title = $request['english_title'];
        $update_news_events->marathi_title = $request['marathi_title'];
        $update_news_events->english_description = $request['english_description'];
        $update_news_events->marathi_description = $request['marathi_description'];
        $update_news_events->english_designation = $request['english_designation'];
        $update_news_events->marathi_designation = $request['marathi_designation'];
       
        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/news-events/success-stories/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/news-events/success-stories/', $englishImageName);
            $update_news_events->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/news-events/success-stories/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/news-events/success-stories/', $marathiImageName);
            $update_news_events->marathi_image = $marathiImageName;
        }

        $update_news_events->save();        
     
        return [
            'msg' => 'volunteer data updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update volunteer data.',
            'status' => 'error'
        ];
    }
}
public function updateOne($request)
{
    try {
        $news_events = SuccessStories::find($request); // Assuming $request directly contains the ID

        // Assuming 'is_active' is a field in the Slider model
        if ($news_events) {
            $is_active = $news_events->is_active === 1 ? 0 : 1;
            $news_events->is_active = $is_active;
            // dd($slide);
            $news_events->save();

            return [
                'msg' => 'Slide updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Slide not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update slide.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $news_events = SuccessStories::find($id);
        if ($news_events) {
             // Delete the images from the storage folder
             Storage::delete([
                'public/images/news-events/success-stories/'.$news_events->english_image,
                'public/images/news-events/success-stories/'.$news_events->marathi_image
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