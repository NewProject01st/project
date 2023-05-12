<?php
namespace App\Http\Repository\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Slider
};

class SliderRepository  {
	public function getAll()
    {
        try {
            return Slider::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/slides', $englishImageName);
        $request->marathi_image->storeAs('public/images/slides', $marathiImageName);

        $slides = new Slider();
        $slides->english_image = $englishImageName; // Save the image filename to the database
        $slides->marathi_image = $marathiImageName; // Save the image filename to the database
        $slides->save();       
     
        return $slides;
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
        $slider = Slider::find($id);
        if ($slider) {
            return $slider;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id slide.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
   
    try {
        $slide_data = Slider::find($request->id);
        
        if (!$slide_data) {
            return [
                'msg' => 'Slide not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/images/slides/' . $slide_data->english_image,
            'public/images/slides/' . $slide_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/slides/', $englishImageName);
        $request->marathi_image->storeAs('public/images/slides/', $marathiImageName);


        $slide_data = Slider::find($request->id);
        $slide_data->english_image = $englishImageName; // Save the image filename to the database
        $slide_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $slide_data->save();       
     
        return [
            'msg' => 'Slide updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update slide.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $slider = Slider::find($id);
        if ($slider) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/slides/'.$slider->english_image,
                'public/images/slides/'.$slider->marathi_image
            ]);

            // Delete the record from the database
            $slider->delete();
            
            return $slider;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}