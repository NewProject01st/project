<?php
namespace App\Http\Services\Admin\ResourceCenter;

use App\Http\Repository\Admin\ResourceCenter\DocumentsPublicationsRepository;

use App\Models\
{ Documentspublications };
use Carbon\Carbon;
use Config;
use Storage;

class DocumentsPublicationsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct(){
        $this->repo = new DocumentsPublicationsRepository();
    }
    public function getAll(){
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
            $path = Config::get('DocumentConstant.DOCUMENT_PUBLICATION_ADD');
            $englishPdfName = $last_id['englishPdfName'];
            $marathiPdfName = $last_id['marathiPdfName'];
            uploadImage($request, 'english_pdf', $path, $englishPdfName);
            uploadImage($request, 'marathi_pdf', $path, $marathiPdfName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Document Publication Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Document Publication Not Added.'];
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
            
            $path = Config::get('DocumentConstant.DOCUMENT_PUBLICATION_ADD');
            if ($request->hasFile('english_pdf')) {
                if ($return_data['english_pdf']) {
                    $delete_file_eng= Config::get('DocumentConstant.DOCUMENT_PUBLICATION_DELETE') . $return_data['english_pdf'];
                    if(file_exists_s3($delete_file_eng)){
                        removeImage($delete_file_eng);
                    }
                }
    
                $englishPdfName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_english.' . $request->english_pdf->extension();
                uploadImage($request, 'english_pdf', $path, $englishPdfName);
                $district_plan = Documentspublications::find($return_data['last_insert_id']);
                $district_plan->english_pdf = $englishPdfName;
                $district_plan->save();
    
            }
    
            if ($request->hasFile('marathi_pdf')) {
                if ($return_data['marathi_pdf']) {
                    $delete_file_mar= Config::get('DocumentConstant.DOCUMENT_PUBLICATION_DELETE') . $return_data['marathi_pdf'];
                    if(file_exists_s3($delete_file_mar)){
                        removeImage($delete_file_mar);
                    }
                }
    
                $marathiPdfName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_marathi.' . $request->marathi_pdf->extension();
                uploadImage($request, 'marathi_pdf', $path, $marathiPdfName);
                $district_plan = Documentspublications::find($return_data['last_insert_id']);
                $district_plan->marathi_pdf = $marathiPdfName;
                $district_plan->save();
            }

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Document Publication Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Document Publication Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    
    public function deleteById($id){
        try {
            $delete = $this->repo->deleteById($id);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }
   
    
}