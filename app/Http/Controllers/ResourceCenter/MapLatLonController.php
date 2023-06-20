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
            // dd($map_gis);
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
            'lat' => 'required',
            'lon' => 'required',
            'location_name_english' => 'required',
            'location_name_marathi' => 'required',
            'location_address_english' => 'required',
            'location_address_marathi' => 'required',
            // 'data_for' => 'required',
            
         ];
    $messages = [   
        'lat.required' => 'Please enter latitude.',
        'lon.required' => 'Please enter longitude.',
        'location_name_english.required' => 'Please enter location name.',
        'location_name_marathi.required' => 'कृपया स्थानाचे नाव प्रविष्ट करा.',
        'location_address_english.required' => 'Please enter address.',
        'location_address_marathi.required' => 'कृपया पत्ता प्रविष्ट करा.',
        // 'data_for.required' => 'Please enter data.',
       
    ];
    // print_r($messages);
    // die();

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
            //  dd($request->show_id);
            $map_gis = $this->service->getById($request->show_id);
            return view('admin.pages.research-center.map-gis-data.show-map-gis-data', compact('map_gis'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $map_gis = MapLatLon::find($request->edit_id);
        // dd($budgets);

        return view('admin.pages.research-center.map-gis-data.edit-map-gis-data', compact('map_gis'));
    }

    public function update(Request $request) {
        $rules = [
            'lat' => 'required',
            'lon' => 'required',
            'location_name_english' => 'required',
            'location_name_marathi' => 'required',
            'location_address_english' => 'required',
            'location_address_marathi' => 'required',
            // 'data_for' => 'required',
            
         ];
    $messages = [   
        'lat.required' => 'Please enter latitude.',
        'lon.required' => 'Please enter longitude.',
        'location_name_english.required' => 'Please enter location name.',
        'location_name_marathi.required' => 'कृपया स्थानाचे नाव प्रविष्ट करा.',
        'location_address_english.required' => 'Please enter address.',
        'location_address_marathi.required' => 'कृपया पत्ता प्रविष्ट करा.',
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
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $map_gis = $this->service->deleteById($request->delete_id);
            return redirect('list-map-lat-lons')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}