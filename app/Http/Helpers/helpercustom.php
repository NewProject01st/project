<?php
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


function getIPAddress($req)
{
    return $req->ip();
}

function getRouteDetailsPresentOrNot($data_to_search,$data_for_session) {
    foreach ($data_for_session as $key => $value) {
        foreach ($value as $key => $value_new) {
            if ($key == 'route_name' && $value_new == $data_to_search) {
                return true;
            } 
        }
    }
    return false;
}



