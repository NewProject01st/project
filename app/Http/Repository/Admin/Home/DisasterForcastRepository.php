<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterForcast
};

class DisasterForcastRepository  {
	public function getAll()
    {
        try {
            return DisasterForcast::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {

        $englishImage = time() . '_english.' . $request->english_image->extension();
        $marathiImage= time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/home/disaster-forcast', $englishImage);
        $request->marathi_image->storeAs('public/images/home/disaster-forcast', $marathiImage);

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();

        $request->english_pdf->storeAs('public/pdf/disaster-forcast', $englishPdf);
        $request->english_pdf->storeAs('public/pdf/disaster-forcast', $marathiPdf);
        
        $disasterforcast_data = new DisasterForcast();
        $disasterforcast_data->english_title = $request['english_title'];
        $disasterforcast_data->marathi_title = $request['marathi_title'];
        $disasterforcast_data->english_description = $request['english_description'];
        $disasterforcast_data->marathi_description = $request['marathi_description'];
        $disasterforcast_data->forcast_date = $request['forcast_date'];
        $disasterforcast_data->expired_date = $request['expired_date'];
        $disasterforcast_data->english_image = $englishImage;
        $disasterforcast_data->marathi_image = $marathiImage;
        $disasterforcast_data->english_pdf = $englishPdf;
        $disasterforcast_data->marathi_pdf = $marathiPdf;
        $disasterforcast_data->save();       
              
		return $disasterforcast_data;
        dd($disasterforcast_data);

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
        $disasterforcast = DisasterForcast::find($id);
        if ($disasterforcast) {
            return $disasterforcast;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Disaster Forcast.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $disasterforcast_data = DisasterForcast::find($request->id);
        
        if (!$disasterforcast_data) {
            return [
                'msg' => 'Disaster Forcast not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/images/home/disaster-forcast/' . $disasterforcast_data->marathi_image,
            'public/images/home/disaster-forcast/' . $disasterforcast_data->english_image
        ]);

        $englishImage = time() . '_english.' . $request->english_image->extension();
        $marathiImage = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/home/disaster-forcast', $englishImage);
        $request->marathi_image->storeAs('public/images/home/disaster-forcast', $marathiImage);
        
        $disasterforcast_data->english_title = $request['english_title'];
        $disasterforcast_data->marathi_title = $request['marathi_title'];
        $disasterforcast_data->english_description = $request['english_description'];
        $disasterforcast_data->marathi_description = $request['marathi_description'];
        $disasterforcast_data->forcast_date = $request['forcast_date'];
        $disasterforcast_data->expired_date = $request['expired_date'];
        $disasterforcast_data->marathi_image = $englishImage;
        $disasterforcast_data->english_image = $marathiImage;
        $disasterforcast_data->save();        
     
        return [
            'msg' => 'Disaster Forcast updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Disaster Forcast.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $disasterforcast = DisasterForcast::find($id);
        if ($disasterforcast) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/home/disaster-forcast/'.$disasterforcast->marathi_image,
                'public/images/home/disaster-forcast/'.$disasterforcast->english_image,
                'public/pdf/disaster-forcast/'.$disasterforcast->marathi_pdf,
                'public/pdf/disaster-forcast/'.$disasterforcast->english_pdf
            ]);

            // Delete the record from the database
            $disasterforcast->delete();
            
            return $disasterforcast;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}


