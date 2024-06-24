<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use ParaTest\Options;
use App\Models\Option;
use App\Models\Service;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {

        return view('dashboard', [
            // 'nbre_documents' => Document::whereIn('sub_service_id', SubService::where('service_id', 1)->pluck('id')->toArray())->count(),
            // 'nbre_geometre_deconcentres' => User::whereIn('sub_service_id', SubService::where('service_id', 2)->pluck('id')->toArray())->count(),
            'nbre_documents' => Document::count(),
            'nbre_users' => User::count(),
            'departments' => Department::count(),
            'options' => Option::count(),
            'categories' => Category::count(),

        ]);
    }

    public function list($id)
    {
        return view('admin.options.list', [
            'options' => Option::where('department_id', $id)->get(),
        ]);
    }

    public function show($id)
    {
        return view('admin.services.show', [
            'users' => User::where('sub_service_id', $id)->get(),
            // 'subservice' => SubService::findOrFail($id),
        ]);
    }
}
