<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    //
    public function department($id)
    {
        $departments = DB::table("departments")
                    ->where("region_id",$id)
                    ->pluck('name','id');
                    
        return json_encode($departments);
    }
}
