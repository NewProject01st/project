<?php
namespace App\Http\Services\Footer;

use App\Http\Repository\Footer\FooterImportantLinksRepository;

use App\FooterImportantLinks;
use Carbon\Carbon;


class FooterImportantLinksServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new FooterImportantLinksRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function add($request)
    {
        try {
            $add_links = $this->repo->add($request);
            if ($add_links) {
                return ['status' => 'success', 'msg' => 'Link Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Link Not Added.'];
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
   
   
    public function update($request)
    {
        $update_links = $this->repo->update($request);
        if ($update_links) {
            return ['status' => 'success', 'msg' => 'Link Updated Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Link Not Updated.'];
        }  
       
    }
    public function updateOne($id)
    {
        return $this->repo->updateOne($id);
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