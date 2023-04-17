<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DashboardServices;
use App\Models\ {
    Roles,
    Permissions
};
use Validator;

class DashboardController extends Controller {
    /**
     * Topic constructor.
     */
    public function __construct()
    {
        $this->service = new DashboardServices();
    }

    public function index()
    {
        return view('admin.pages.dashboard');
    }



}
