<?php
namespace App\Http\Repository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Projects
};

class ProjectsRepository  {
	public function getAll()
    {
        try {
            return Projects::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/projects', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/projects', $marathiPdf);
        
        $projects_data = new Projects();
        $projects_data->english_title = $request['english_title'];
        $projects_data->marathi_title = $request['marathi_title'];
        $projects_data->english_description = $request['english_description'];
        $projects_data->marathi_description = $request['marathi_description'];
        $projects_data->english_link = $request['english_link'];
        $projects_data->marathi_link = $request['marathi_link'];
        $projects_data->status = $request['status'];
        $projects_data->marathi_pdf = $englishPdf;
        $projects_data->english_pdf = $marathiPdf;
        $projects_data->save();       
              
		return $projects_data;

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
        $tender = Projects::find($id);
        if ($tender) {
            return $tender;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Projects.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        // dd($request);
        $projects_data = Projects::find($request->id);
        
        if (!$projects_data) {
            return [
                'msg' => 'Projects not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/pdf/projects/' . $projects_data->marathi_pdf,
            'public/pdf/projects/' . $projects_data->english_pdf
        ]);

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/projects', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/projects', $marathiPdf);
        
        $projects_data = Projects::find($request->$id);
        $projects_data->english_title = $request['english_title'];
        $projects_data->marathi_title = $request['marathi_title'];
        $projects_data->english_description = $request['english_description'];
        $projects_data->marathi_description = $request['marathi_description'];
        $projects_data->english_link = $request['english_link'];
        $projects_data->marathi_link = $request['marathi_link'];
        $projects_data->status = $request['status'];
        $projects_data->marathi_description = $englishPdf;
        $projects_data->marathi_description = $marathiPdf;
        $projects_data->save();   
        
        // dd($projects_data);
     
        return [
            'msg' => 'Projects updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Projects.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $projects = Projects::find($id);
        if ($projects) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/pdf/projects/'.$projects->marathi_pdf,
                'public/pdf/projects/'.$projects->english_pdf
            ]);

            // Delete the record from the database
            $projects->delete();
            
            return $projects;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
}


