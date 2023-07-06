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
use Config;

class SuccessStoriesRepository  {
	public function getAll(){
        try {
            return SuccessStories::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
	public function addAll($request){
    try {
        
        $news_events = new SuccessStories();
        $news_events->english_title = $request['english_title'];
        $news_events->marathi_title = $request['marathi_title'];
        $news_events->english_description = $request['english_description'];
        $news_events->marathi_description = $request['marathi_description'];
        $news_events->english_designation = $request['english_designation'];
        $news_events->marathi_designation = $request['marathi_designation'];

        $news_events->save();      
        $last_insert_id = $news_events->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        

        $news_events = SuccessStories::find($last_insert_id); // Assuming $request directly contains the ID
        $news_events->english_image = $englishImageName; // Save the image filename to the database
        $news_events->save();
        
        return $last_insert_id;

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
      }
    }

    public function getById($id){
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
                'msg' => 'Failed to get by id Success Stories.',
                'status' => 'error'
            ];
        }
    }

    public function updateAll($request){
        try {
            $return_data = array();
            $update_news_events = SuccessStories::find($request->id);
            
            if (!$update_news_events) {
                return [
                    'msg' => 'Success Stories Data not found.',
                    'status' => 'error'
                ];
            }
        // Store the previous image names
        $previousEnglishImage = $update_news_events->english_image;

            $update_news_events->english_title = $request['english_title'];
            $update_news_events->marathi_title = $request['marathi_title'];
            $update_news_events->english_description = $request['english_description'];
            $update_news_events->marathi_description = $request['marathi_description'];
            $update_news_events->english_designation = $request['english_designation'];
            $update_news_events->marathi_designation = $request['marathi_designation'];

            $update_news_events->save();
            // dd($update_news_events);
            $last_insert_id = $update_news_events->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            return  $return_data;

        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Success Stories Data.',
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

                $news_events->save();

                return [
                    'msg' => 'Success Stories updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'Success Stories not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update Success Stories.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id)
    {
        try {
            $stories = SuccessStories::find($id);
            if ($stories) {
                
                if (file_exists(storage_path(Config::get('DocumentConstant.SUCCESS_STORIES_DELETE') . $stories->english_image))) {
                    unlink(storage_path(Config::get('DocumentConstant.SUCCESS_STORIES_DELETE') . $stories->english_image));
                }
                $stories->delete();
               
                return $stories;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }


       
}