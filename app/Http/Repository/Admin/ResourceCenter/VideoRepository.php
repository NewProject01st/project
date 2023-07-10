<?php
namespace App\Http\Repository\Admin\ResourceCenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Video
};

class VideoRepository  {
	public function getAll()
    {
        try {
            return Video::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request)
{
    try {
        $video = new Video();
        $video->video_name = $request['video_name'];

        $video->save();       
              
		return $video;

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
        $video = Video::find($id);
        if ($video) {
            return $video;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id documents.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request)
{
    try {
        $update_video = Video::find($request->id);
        
        if (!$update_video) {
            return [
                'msg' => 'Video not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
        $update_video->video_name = $request['video_name'];
       
        $update_video->save();        
     
        return [
            'msg' => 'Video updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Video.',
            'status' => 'error'
        ];
    }
}
public function updateOne($request)
{
    try {
        $video = Video::find($request); // Assuming $request directly contains the ID

        // Assuming 'is_active' is a field in the Videor model
        if ($video) {
            $is_active = $video->is_active === 1 ? 0 : 1;
            $video->is_active = $is_active;
            $video->save();

            return [
                'msg' => 'Video updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Video not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Video.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $video = Video::destroy($id);
        if ($video) {
            return $video;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete Video.',
            'status' => 'error'
        ];
    }

}   
}