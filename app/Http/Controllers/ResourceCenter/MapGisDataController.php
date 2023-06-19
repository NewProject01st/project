<?php

namespace App\Http\Controllers\ResourceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MAPGISData;
use App\Http\Services\ResourceCenter\MapGisDataServices;
use Validator;
class MapGisDataController extends Controller
{

   public function __construct()
    {
        $this->service = new MapGisDataServices();
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
            'latitude' => 'required',
            'longitude' => 'required',
            'english_police_station' => 'required',
            'marathi_police_station' => 'required',
            'english_address' => 'required',
            'marathi_address' => 'required',
            
         ];
    $messages = [   
        'latitude' => 'Please enter latitude.',
        'longitude' => 'Please enter longitude.',
        'english_police_station' => 'Please enter police station name.',
        'marathi_police_station' => 'कृपया पोलीस ठाण्याचे नाव टाका. ',
        'english_address' => 'Please enter address.',
        'marathi_address' => 'कृपया पत्ता प्रविष्ट करा.',
       
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-map-gis-data')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_map_gis = $this->service->add($request);
            if($add_map_gis)
            {
                $msg = $add_map_gis['msg'];
                $status = $add_map_gis['status'];
                if($status=='success') {
                    return redirect('list-map-gis-data')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-map-gis-data')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-map-gis-data')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
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
        $map_gis = MAPGISData::find($request->edit_id);
        // dd($budgets);

        return view('admin.pages.research-center.map-gis-data.edit-map-gis-data', compact('map_gis'));
    }

    public function update(Request $request) {
        $rules = [
            'latitude' => 'required',
            'longitude' => 'required',
            'english_police_station' => 'required',
            'marathi_police_station' => 'required',
            'english_address' => 'required',
            'marathi_address' => 'required',
            
         ];
    $messages = [   
        'latitude' => 'Please enter latitude.',
        'longitude' => 'Please enter longitude.',
        'english_police_station' => 'Please enter police station name.',
        'marathi_police_station' => 'कृपया पोलीस ठाण्याचे नाव टाका. ',
        'english_address' => 'Please enter address.',
        'marathi_address' => 'कृपया पत्ता प्रविष्ट करा.',
       
    ];
    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_marquee = $this->service->update($request);
            if ($update_marquee) {
                $msg = $update_marquee['msg'];
                $status = $update_marquee['status'];
                if ($status == 'success') {
                    return redirect('list-map-gis-data')->with(compact('msg', 'status'));
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
            return redirect('list-map-gis-data')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}