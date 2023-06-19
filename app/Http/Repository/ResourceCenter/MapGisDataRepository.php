<?php
namespace App\Http\Repository\ResourceCenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	MAPGISData
};
use Config;

class MapGisDataRepository  {
    public function getAll()
    {
        try {
            return MAPGISData::all();
        } catch (\Exception $e) {
            return $e;
        }
    }	

	public function addAll($request){
        try {
        
            $mapgis_data = new MAPGISData();
            $mapgis_data->latitude = $request['latitude'];
            $mapgis_data->longitude = $request['longitude'];
            $mapgis_data->english_police_station = $request['english_police_station'];
            $mapgis_data->marathi_police_station = $request['marathi_police_station'];
            $mapgis_data->english_address = $request['english_address'];
            $mapgis_data->marathi_address = $request['marathi_address'];
            $mapgis_data->save();       
     
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
            $mapgis = MAPGISData::find($id);
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
            $mapgis_data = MAPGISData::find($request->id);
            $mapgis_data->latitude = $request['latitude'];
            $mapgis_data->longitude = $request['longitude'];
            $mapgis_data->english_police_station = $request['english_police_station'];
            $mapgis_data->marathi_police_station = $request['marathi_police_station'];
            $mapgis_data->english_address = $request['english_address'];
            $mapgis_data->marathi_address = $request['marathi_address'];
          
            $mapgis_data->update();  
            
        //    dd($budget_data);
            // print_r($budget_data);
            // die();
         
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
        $mapgis = MAPGISData::destroy($id);
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