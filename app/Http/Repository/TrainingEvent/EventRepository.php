<?php
namespace App\Http\Repository\TrainingEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Event
};
use Config;

class EventRepository{
	public function getAll(){
        try {
            return Event::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
        try {
            $training_data = new Event();
            $training_data->english_title = $request['english_title'];
            $training_data->marathi_title = $request['marathi_title'];
            $training_data->english_description = $request['english_description'];
            $training_data->marathi_description = $request['marathi_description'];
            $training_data->start_date = $request['start_date'];
            $training_data->end_date = $request['end_date'];
            
            $training_data->save();    
            $last_insert_id = $training_data->id;   
                
            $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
            

            $news = Event::find($last_insert_id); // Assuming $request directly contains the ID
            $news->english_image = $englishImageName; // Save the image filename to the database
            $news->marathi_image = $marathiImageName; // Save the image filename to the database
            $news->save();
           
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
            $training = Event::find($id);
            if ($training) {
                return $training;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Training',
                'status' => 'error'
            ];
        }
    }
    public function updateAll($request){
   
        try {
            $return_data = array();
            $evacuationplans_data = Event::find($request->id);
            
            if (!$evacuationplans_data) {
                return [
                    'msg' => 'Training Event not found.',
                    'status' => 'error'
                ];
            }
             
            //Store the previous image name
            $previousEnglishImage = $evacuationplans_data->english_image;
            $previousMarathiImage = $evacuationplans_data->marathi_image;
          
            $evacuationplans_data = Event::find($request->id);
            $evacuationplans_data->english_title = $request['english_title'];
            $evacuationplans_data->marathi_title = $request['marathi_title'];
            $evacuationplans_data->english_description = $request['english_description'];
            $evacuationplans_data->marathi_description = $request['marathi_description'];
            $evacuationplans_data->start_date = $request['start_date'];
            $evacuationplans_data->end_date = $request['end_date'];
            $evacuationplans_data->save();       
         
            $last_insert_id = $evacuationplans_data->id;
    
            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;
            return  $return_data;
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Training Event.',
                'status' => 'error'
            ];
        }
    }


   
    public function deleteById($id){
        try {
            $training = Event::find($id);
            if ($training) {
                if (file_exists(storage_path(Config::get('DocumentConstant.TRAINING_EVENT_VIEW') . $training->english_image))) {
                    unlink(storage_path(Config::get('DocumentConstant.TRAINING_EVENT_VIEW') . $training->english_image));
                }
                if (file_exists(storage_path(Config::get('DocumentConstant.TRAINING_EVENT_VIEW') . $training->marathi_image))) {
                    unlink(storage_path(Config::get('DocumentConstant.TRAINING_EVENT_VIEW') . $training->marathi_image));
                }
                $training->delete();
    
                return $training;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
       
}