<?php
namespace App\Http\Services\Header;

use App\Http\Repository\Header\VacanciesRepository;

use App\Models\
{ VacanciesHeader };
use Carbon\Carbon;
use Config;
use Storage;



class VacanciesHeaderServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new VacanciesRepository();
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
            $path =  Config::get('DocumentConstant.VACANCIES_PDF_ADD');
            $englishPdfName = $last_id . '_english.' . $request->english_pdf->extension();
            $marathiPdfName = $last_id . '_marathi.' . $request->marathi_pdf->extension();
            uploadImage($request, 'english_pdf', $path, $englishPdfName);
            uploadImage($request, 'marathi_pdf', $path, $marathiPdfName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Vacancy Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Vacancy Not Added.'];
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
            
            $path = Config::get('DocumentConstant.VACANCIES_PDF_ADD');
            if ($request->hasFile('english_pdf')) {
                if ($return_data['english_pdf']) {
                    $delete_file_eng= storage_path(Config::get('DocumentConstant.VACANCIES_PDF_DELETE') . $return_data['english_pdf']);
                    if(file_exists($delete_file_eng)){
                        unlink($delete_file_eng);
                    }

                }
    
                $englishPdfName = $return_data['last_insert_id'] . '_english.' . $request->english_pdf->extension();
                uploadImage($request, 'english_pdf', $path, $englishPdfName);
               
                $rti_data = VacanciesHeader::find($return_data['last_insert_id']);
                $rti_data->english_pdf = $englishPdfName;
                $rti_data->save();
            }
           
            if ($request->hasFile('marathi_pdf')) {
                if ($return_data['marathi_pdf']) {
                    $delete_file_mar= storage_path(Config::get('DocumentConstant.VACANCIES_PDF_DELETE') . $return_data['marathi_pdf']);
                    if(file_exists($delete_file_mar)){
                        unlink($delete_file_mar);
                    }
                }
    
                $marathiPdfName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_pdf->extension();
                uploadImage($request, 'marathi_pdf', $path, $marathiPdfName);

                $rti_data = VacanciesHeader::find($return_data['last_insert_id']);
                $rti_data->marathi_pdf = $marathiPdfName;
                $rti_data->save();
            }
 
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Vacancy Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Vacancy Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    public function updateOne($id)
    {
        return $this->repo->updateOne($id);
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