<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterManagementNews
};

class DisasterManagementNewsRepository  {
	public function getAll()
    {
        try {
            return DisasterManagementNews::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/home/disaster-news', $englishImageName);
        $request->marathi_image->storeAs('public/images/home/disaster-news', $marathiImageName);

        
        $disaster_data = new DisasterManagementNews();
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];
        $disaster_data->english_image = $englishImageName;
        $disaster_data->marathi_image =   $marathiImageName;
        $disaster_data->english_url = $request['english_url'];
        $disaster_data->disaster_date = $request['disaster_date'];
        $disaster_data->save();       
              
		return $disaster_data;

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
        $disaster = DisasterManagementNews::find($id);
        if ($disaster) {
            return $disaster;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Disaster.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $disaster_data = DisasterManagementNews::find($request->id);

        if (!$disaster_data) {
            return [
                'msg' => 'Disaster Management News not found.',
                'status' => 'error'
            ];
        }

        // Store the previous image names
        $previousEnglishImage = $disaster_data->english_image;
        $previousMarathiImage = $disaster_data->marathi_image;

        // Update the fields from the request
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];
        $disaster_data->english_url = $request['english_url'];
        $disaster_data->disaster_date = $request['disaster_date'];

        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/home/disaster-news/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/home/disaster-news/', $englishImageName);
            $disaster_data->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/home/disaster-news/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/home/disaster-news/', $marathiImageName);
            $disaster_data->marathi_image = $marathiImageName;
        }

        $disaster_data->save();

        return [
            'msg' => 'Disaster News updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Disaster News.',
            'status' => 'error',
            'error' => $e->getMessage() // Return the error message for debugging purposes
        ];
    }
}
public function updateOne($request)
{
    try {
        $marquee = DisasterManagementNews::find($request); // Assuming $request directly contains the ID        
        if ($marquee) {
            $is_active = $marquee->is_active === 1 ? 0 : 1;
            $marquee->is_active = $is_active;
            // dd($marquee);
            $marquee->save();

            return [
                'msg' => 'Disaster updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Disaster not found.',
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
        $disaster = DisasterManagementNews::find($id);
        if ($disaster) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/home/disaster-news/'.$disaster->english_image,
                'public/images/home/disaster-news/'.$disaster->marathi_image
            ]);

            // Delete the record from the database
            
            $disaster->delete();
            
            return $disaster;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}