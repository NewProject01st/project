<?php
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


function getIPAddress($req)
{
    return $req->ip();
}



