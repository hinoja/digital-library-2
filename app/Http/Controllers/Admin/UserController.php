<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Grade;
use App\Models\Career;
use App\Models\Region;
use App\Models\Status;
use App\Models\Service;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\Department;
use App\Models\SubService;
use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;


use App\Models\SituationMatrimoniale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()
            ->with('role')
            ->with('documents')
            // ->with('departments')
            // ->with('options')
            // ->with('categories')
            // ->with('keywords')
            ->latest()->get();
        // dd( $users);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {

    //     $roles = Role::all();
    //     $regions = Region::all();
    //     $departments = Department::all();
    //     $grades = Grade::all();
    //     $situatMat = SituationMatrimoniale::all();
    //     $services = Service::all();
    //     $status = Status::all();
    //     $fonctions = Fonction::all();
    //     $subservices = SubService::all();

    //     return view('admin.users.create', compact('roles', 'regions', 'departments', 'grades', 'situatMat', 'services', 'status', 'fonctions', 'subservices'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'option_id' => ['required','exists:options,id'],
            'title' => ['required', 'string','unique:documents,title','max:255'],
            'slug' => ['required','unique:documents,slug', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'author' => ['required', 'string', 'max:255'],
            'supervisor' => ['required', 'string', 'max:255'],
            'file' => ['required', 'file', 'max:1055'],
            'user_id' => ['required','exists:users,id'],
            // 'keywords' => ['required', 'max:255'],
            // 'categories' => ['required', 'max:255'],
            'type_id' => ['required', 'exists:types,id'],
            'level_id' => ['required', 'exists:levels,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'published_at' => ['required','date','max:255'],
        ]);

        $user = Document::create([
            'title' => $request->title,
            'type_id' => $request->type_id,
            'department_id' => $request->department_id,
            'option_id' => $request->option_id,
            'slug' => Str::slug($request->title),
            'user_id' => $request->user_id,
            'level_id' => $request->level_id,
            'file' => $request->file,
            'author' => $request->author,
            'supervisor' => $request->supervisor,
            'published_at' => $request->published_at,
            'description' => $request->description,
            // 'role_id' => $request->role_id,
            // 'regionOrigin_id' => $request->regionOrigin_id,
            // 'status_id' => $request->status_id,
            // 'priseService' => $request->priseService,
            // 'situationMatrimoniale_id' => $request->situationMatrimoniale_id,
            // 'phoneNumber' => $request->phoneNumber,
        ]);

        

        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if (isset($request->matricule)) {
            $user->matricule = "ECI";
        }
        // $request->matricule ? $user->matricule = $request->matricule : "En cours d'intégration";
        $user->save();

        // Ajout du CV
        $filename_chemin_cv = 'usersExperience/' . $user->id . '.' . $request->cv->getClientOriginalExtension();

        $filename_cv = $user->id . '.' . $request->cv->getClientOriginalExtension();
        $user->cv = $filename_chemin_cv;
        $user->save();

        $request->file('cv')->storeAs('usersExperience', $filename_cv, 'public');

        // Ajout de l'avatar
        if (isset($request->avatar)) {
            $filename_chemin = 'usersAvatar/' . $user->id . '.' . $request->avatar->getClientOriginalExtension();

            $filename = $user->id . '.' . $request->avatar->getClientOriginalExtension();
            $user->avatar = $filename_chemin;
            $user->save();

            $request->file('avatar')->storeAs('usersAvatar', $filename, 'public');
        }

        return redirect()->route('users.index')->with('success', "L'utilisateur $user->name a bien été enregistré ! ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(User $user): RedirectResponse
    {
        if ($user->is_active) {
            $user->is_active = false;
            $message = trans('Account has been successfully unblocked.');
        } else {
            $user->is_active = true;
            $message = trans('Account has been successfully blocked.');
        }
        $user->save();
        // Alert::success('Success Registered', $message);
        toast($message, 'success');

        return back();
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', "L'utilisateur a bien été supprimé");
    }
}
