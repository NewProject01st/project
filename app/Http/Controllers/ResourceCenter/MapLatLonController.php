<?php

namespace App\Http\Controllers\ResourceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MapLatLon;
use App\Http\Services\ResourceCenter\MapLatLonServices;
use Validator;
class MapLatLonController extends Controller
{

   public function __construct()
    {
        $this->service = new MapLatLonServices();
    }
    public function index()
    {
        try {
            $map_gis = $this->service->getAll();
            return view('admin.pages.research-center.map-gis-data.list-map-gis-data', compact('map_gis'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.research-center.map-gis-data.add-map-gis-data');
    }

    public function store(Request $request) {
        $rules = [
            'lat' => ['required','regex:/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$/'],
            'lon' => ['required','regex:/^[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/',],
            'location_name_english' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'location_name_marathi' => 'required|max:255',
            'location_address_english' => ['required','regex:/^(?![0-9\s]+$)[A-Za-z0-9\s\.,#\-\(\)\[\]\{\}]+$/','max:255'],
            'location_address_marathi' => 'required|max:255',
            // 'data_for' => 'required',
            
         ];
    $messages = [   
        'lat.required' => 'Please enter latitude.',
        'lat.regex' => 'latitude must be a valid coordinate in decimal degrees format.',
        'lat.max'   => 'Please  enter text length upto 255 character only.',
        'lon.required' => 'Please enter longitude.',
        'lon.regex' => 'longitude must be a valid coordinate in decimal degrees format.',
        'lon.max'   => 'Please  enter text length upto 255 character only.',
        'location_name_english.required' => 'Please enter location name.',
        'location_name_english.regex' => 'Please  enter text only.',
        'location_name_english.max'   => 'Please  enter text length upto 255 character only.',
        'location_name_marathi.required' => 'कृपया स्थानाचे नाव प्रविष्ट करा.',
        'location_name_marathi.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',
        'location_address_english.required' => 'Please enter address.',
        'location_address_english.regex' => 'Please enter right address.',
        'location_address_english.max'   => 'Please  enter address length upto 255 character only.',
        'location_address_marathi.required' => 'कृपया पत्ता प्रविष्ट करा.',
        // 'location_address_marathi.regex' => 'कृपया बरोबर पत्ता प्रविष्ट करा.',
        'location_address_marathi.max'   => 'कृपया पत्त्याची लांबी 255 पर्यंत प्रविष्ट करा.',

        // 'data_for.required' => 'Please enter data.',
       
    ];
    

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-map-lot-lons')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_map_gis = $this->service->addAll($request);
            if($add_map_gis)
            {
                $msg = $add_map_gis['msg'];
                $status = $add_map_gis['status'];
                if($status=='success') {
                    return redirect('list-map-lat-lons')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-map-lot-lons')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-map-lot-lons')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $map_gis = $this->service->getById($request->show_id);
            return view('admin.pages.research-center.map-gis-data.show-map-gis-data', compact('map_gis'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $map_gis = MapLatLon::find($request->edit_id);

        return view('admin.pages.research-center.map-gis-data.edit-map-gis-data', compact('map_gis'));
    }

    public function update(Request $request) {
        $rules = [
            'lat' => ['required','regex:/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$/'],
            'lon' => ['required','regex:/^[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/',],
            'location_name_english' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'location_name_marathi' => 'required|max:255',
            'location_address_english' => ['required','regex:/^(?![0-9\s]+$)[A-Za-z0-9\s\.,#\-\(\)\[\]\{\}]+$/','max:255'],
            'location_address_marathi' => 'required|max:255',
            // 'data_for' => 'required',
            
         ];
    $messages = [   
        'lat.required' => 'Please enter latitude.',
        'lat.regex' => 'latitude must be a valid coordinate in decimal degrees format.',
        'lat.max'   => 'Please  enter text length upto 255 character only.',
        'lon.required' => 'Please enter longitude.',
        'lon.regex' => 'longitude must be a valid coordinate in decimal degrees format.',
        'lon.max'   => 'Please  enter text length upto 255 character only.',
        'location_name_english.required' => 'Please enter location name.',
        'location_name_english.regex' => 'Please  enter text only.',
        'location_name_english.max'   => 'Please  enter text length upto 255 character only.',
        'location_name_marathi.required' => 'कृपया स्थानाचे नाव प्रविष्ट करा.',
        'location_name_marathi.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',
        'location_address_english.required' => 'Please enter address.',
        'location_address_english.regex' => 'Please enter right address.',
        'location_address_english.max'   => 'Please  enter address length upto 255 character only.',
        'location_address_marathi.required' => 'कृपया पत्ता प्रविष्ट करा.',
        // 'location_address_marathi.regex' => 'कृपया बरोबर पत्ता प्रविष्ट करा.',
        'location_address_marathi.max'   => 'कृपया पत्त्याची लांबी 255 पर्यंत प्रविष्ट करा.',
        // 'data_for.required' => 'Please enter data.',
    ];
    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_gis = $this->service->updateAll($request);
            if ($update_gis) {
                $msg = $update_gis['msg'];
                $status = $update_gis['status'];
                if ($status == 'success') {
                    return redirect('list-map-lat-lons')->with(compact('msg', 'status'));
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        }
        
    } catch (Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
// public function updateOne(Request $request)
// {
//     try {
//         $active_id = $request->active_id;
//     $result = $this->service->updateOne($active_id);
//         return redirect('list-map-gis-data')->with('flash_message', 'Updated!');  
//     } catch (\Exception $e) {
//         return $e;
//     }
// }
public function destroy(Request $request){
    try {
        $delete = $this->service->deleteById($request->delete_id);
        if ($delete) {
            $msg = $delete['msg'];
            $status = $delete['status'];
            if ($status == 'success') {
                return redirect('list-map-lat-lons')->with(compact('msg', 'status'));
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with(compact('msg', 'status'));
            }
        }
    } catch (\Exception $e) {
        return $e;
    }
} 
  

}