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
                return ['status' => 'success', 'msg' => 'Marquee Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Marquee Not Added.'];
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
            return ['status' => 'success', 'msg' => 'Marquee Added Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Marquee Not Added.'];
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