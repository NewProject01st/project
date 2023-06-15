<?php
namespace App\Http\Services\ResourceCenter;

use App\Http\Repository\ResourceCenter\TrainingAndWorkshopRepository;


use App\Models\
{ TrainingMaterialsWorkshops };
use Carbon\Carbon;
use Config;
use Storage;


class TrainingAndWorkshopServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new TrainingAndWorkshopRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function addAll($request)
    {
        try {
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.TRAINING_MATERIAL_ADD');
            $englishPdfName = $last_id . '_english.' . $request->english_pdf->extension();
            $marathiPdfName = $last_id . '_marathi.' . $request->marathi_pdf->extension();
            uploadImage($request, 'english_pdf', $path, $englishPdfName);
            uploadImage($request, 'marathi_pdf', $path, $marathiPdfName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Training Material and Workshop Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Training Material and Workshop Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    
    public function getById($id)
    {
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function updateAll($request)
    {
        try {
            $return_data = $this->repo->updateAll($request);
            
            $path = Config::get('DocumentConstant.TRAINING_MATERIAL_ADD');
            if ($request->hasFile('english_pdf')) {
                if ($return_data['english_pdf']) {
                    $delete_file_eng= storage_path(Config::get('DocumentConstant.TRAINING_MATERIAL_DELETE') . $return_data['english_image']);
                    if(file_exists($delete_file_eng)){
                        unlink($delete_file_eng);
                    }
                }
    
                $englishPdfName = $return_data['last_insert_id'] . '_english.' . $request->english_pdf->extension();
                uploadImage($request, 'english_pdf', $path, $englishPdfName);
                $district_plan = Documentspublications::find($return_data['last_insert_id']);
                $district_plan->english_pdf = $englishPdfName;
                $district_plan->save();
    
            }
    
            if ($request->hasFile('marathi_pdf')) {
                if ($return_data['marathi_pdf']) {
                    $delete_file_mar= storage_path(Config::get('DocumentConstant.TRAINING_MATERIAL_DELETE') . $return_data['marathi_image']);
                    if(file_exists($delete_file_mar)){
                        unlink($delete_file_mar);
                    }
                }
    
                $marathiPdfName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_pdf->extension();
                uploadImage($request, 'marathi_pdf', $path, $marathiPdfName);
                $district_plan = Documentspublications::find($return_data['last_insert_id']);
                $district_plan->marathi_pdf = $marathiPdfName;
                $district_plan->save();
            }
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Training Material and Workshop Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Training Material and Workshop Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    

    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    
   



}