<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\Career;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::query()->orderBy('name', 'asc')->get();
        $departments = Department::query()->orderBy('name', 'asc')->get();
        return view('welcome', [
            'users' => User::query()->orderBy('name', 'asc')
                                    ->with(['role','careers'])
                                    ->OnlyEmployee()
                                    ->paginate(12),
            'regions' => $regions,
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $search = '%' . $request->search . '%';
        $region = $request->region;
        $department = $request->department;

        if (!$request->search && !$region && !$department) {
            $users = $this->getDefault();
            return view('welcome', [
                'users' => User::query()->orderBy('name', 'asc')
                                        ->with(['role','careers'])
                                        ->OnlyEmployee()
                                        ->paginate(12),
                'regions' => $regions,
                'departments' => $departments
            ]);
        } else {
            $users = User::query()
                ->when(
                    $request->search,
                    fn (Builder $query) => $query->orWhere('name', 'LIKE', $search)
                        ->orWhere('firstName', 'LIKE', $search)
                )
                ->when(
                    $request->region,
                    fn (Builder $query) => $query->whereIn('id', Career::where('regionAff_id', $request->region)->pluck('user_id')->toArray())
                        
                )
                ->when(
                    $request->department,
                    fn (Builder $query) => $query->whereIn('id', Career::where('departmentAff_id', $request->department)->pluck('user_id')->toArray())
                        
                )
                // $query->where('type_id', $request->type_id)
                // ->when($sub_category, function (Builder $query) use ($sub_category) {
                //     return $query->orWhere('region_id', Region::query()->firstWhere('name', $sub_category)->id);
                // })
                // ->when(
                //     $request->region,
                //     fn (Builder $query) => $query->orWhere('region', array_search($type, Job::TYPES))
                // ) 
                ->with(['role', 'subservice', 'careers'])
                ->orderByDesc('created_at');
                return view('welcome', [
                    'users' => $users->OnlyEmployee()->paginate(12),
                    'regions' => $this->getDefault()['regions'],
                    'departments' => $this->getDefault()['departments'],
                ]);
        }

    }
    //ajax code to dropdown dependant
    public function searchYourDepartment($regionId){
        return response()->json(Department::where('region_id', $regionId)->get());
    }

    public function getDefault()
    {

        $regions = Region::query()->orderBy('name', 'asc')->get();
        $departments = Department::query()->orderBy('name', 'asc')->get();
        return view('welcome', [
            'users' => User::query()->orderBy('name', 'asc')->with(['role', 'careers'])->get(),
            'regions' => $regions,
            'departments' => $departments
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return view('employee.details', [
            'user' => $user,
            'depart_ori' => Department::find($user->departmentOrigin_id)->name,
            'region_ori' => Region::find($user->regionOrigin_id)->name,
            'depart_aff' => Department::find($user->careers->last()->departmentAff_id)->name,
            'region_aff' => Region::find($user->careers->last()->regionAff_id)->name

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
