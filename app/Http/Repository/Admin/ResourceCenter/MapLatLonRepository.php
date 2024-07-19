<?php
namespace App\Http\Repository\Admin\ResourceCenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	MapLatLon
};
use Config;

class MapLatLonRepository  {
    public function getAll()
    {
        try {
            return MapLatLon::all();
        } catch (\Exception $e) {
            return $e;
        }
    }	

	public function addAll($request){
        try {
        
            $mapgis_data = new MapLatLon();
            $mapgis_data->lat = $request['lat'];
            $mapgis_data->lon = $request['lon'];
            $mapgis_data->location_name_english = $request['location_name_english'];
            $mapgis_data->location_name_marathi = $request['location_name_marathi'];
            $mapgis_data->location_address_english = $request['location_address_english'];
            $mapgis_data->location_address_marathi = $request['location_address_marathi'];
            $mapgis_data->google_map_link = $request['google_map_link'];           
            $mapgis_data->save();   

            if (isset($request['english_description'])) {
                $mapgis_data->english_description = $request['english_description'];
            }
            if (isset($request['marathi_description'])) {
                $mapgis_data->marathi_description = $request['marathi_description'];
            }  
		return $mapgis_data;

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
            $mapgis = MapLatLon::find($id);
            if ($mapgis) {
                return $mapgis;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id MAP GIS.',
                'status' => 'error'
            ];
        }
    }

    public function updateAll($request)
    {
        try {
            $mapgis_data = MapLatLon::find($request->id);
            $mapgis_data->lat = $request['lat'];
            $mapgis_data->lon = $request['lon'];
            $mapgis_data->location_name_english = $request['location_name_english'];
            $mapgis_data->location_name_marathi = $request['location_name_marathi'];
            $mapgis_data->location_address_english = $request['location_address_english'];
            $mapgis_data->location_address_marathi = $request['location_address_marathi'];
            $mapgis_data->google_map_link = $request['google_map_link'];
            $mapgis_data->english_description = $request['english_description'];
            $mapgis_data->marathi_description = $request['marathi_description'];
            // $mapgis_data->data_for = $request['data_for'];
            $mapgis_data->update();  
                     
            return [
                'msg' => 'MAP GIS Data updated successfully.',
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update MAP GIS Data.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id)
    { try {
        $mapgis = MapLatLon::destroy($id);
        if ($mapgis) {
            return $mapgis;
        } else {
            return null;
        }
        } catch (\Exception $e) {
            return $e;
        }
    }
       
}