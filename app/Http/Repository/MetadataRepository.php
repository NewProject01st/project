<?php
namespace App\Http\Repository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Metadata
};

class MetadataRepository  {
	public function getAll()
    {
        try {
            return Metadata::first();
            // return Metadata::all()->first();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $metadata_data = new Metadata();
        $metadata_data->english_name = $request['english_name'];
        $metadata_data->keywords = $request['keywords'];
        $metadata_data->save();      
     
        // echo $metadata_data;
        // die();
		return $metadata_data;
      

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
        $metadata = Metadata::find($id);
        if ($metadata) {
            return $metadata;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Metadata.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $metadata_data = Metadata::find($request->id);                
        $metadata_data->english_name = $request['english_name'];
        $metadata_data->keywords = $request['keywords'];
        $metadata_data->save();        
     
        return [
            'msg' => 'Metadata updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Metadata.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $metadata = Metadata::destroy($id);
        if ($metadata) {
            return $metadata;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete Metadata.',
            'status' => 'error'
        ];
    }
}
       
}


