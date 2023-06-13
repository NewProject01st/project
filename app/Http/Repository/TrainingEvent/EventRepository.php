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
            $training_data = Event::find($request->id);
            
            if (!$training_data) {
                return [
                    'msg' => 'Training Event not found.',
                    'status' => 'error'
                ];
            }
            // Store the previous image names
            $previousEnglishImage = $training_data->english_image;
            $previousMarathiImage = $training_data->marathi_image;
            // Update the fields from the request       
            $training_data->english_title = $request['english_title'];
            $training_data->marathi_title = $request['marathi_title'];
            $training_data->english_description = $request['english_description'];
            $training_data->marathi_description = $request['marathi_description'];
            $training_data->start_date = $request['start_date'];
            $training_data->end_date = $request['end_date'];

            $training_data->save();        
            $last_insert_id = $training_data->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;
            return  $return_data;
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Training Event',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id){
        try {
            $training = Event::find($id);
            if ($training) {
                // Delete the images from the storage folder
                unlink(storage_path(Config::get('DocumentConstant.SLIDER_DELETE') . $training->english_image));
                unlink(storage_path(Config::get('DocumentConstant.SLIDER_DELETE') . $training->marathi_image));
                $training->delete();

                // Delete the record from the database
                
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