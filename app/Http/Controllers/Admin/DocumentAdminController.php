<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Level;
use App\Models\Option;
use App\Models\Category;
use App\Models\Document;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentAdminController extends Controller
{
       /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyDepartment(Department $department)
    {
        dd($department->id);
        $department->delete();

        return redirect()->route('admin.departments.list')->with('success', "Le departement a bien été supprimé");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::query()
                        ->with('option')
                        ->with('categories')
                        ->with('level')
                        ->with('option')
                        ->with('type')
                        ->latest()->get();

        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all(); $options = Option::all(); $categories = Category::all();
        $levels = Level::all(); $types = Type::all();

        return view('admin.documents.create', compact('options','departments', 'categories','types','levels'));
    }


    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data=$request->validate([
            'option_id' => ['required','exists:options,id'],
            'title' => ['required', 'string','unique:documents,title','max:255'],
            'description' => ['required', 'string'],
            'author' => ['required', 'string', 'max:255'],
            'supervisor' => ['required', 'string', 'max:255'],
            'file' => ['required', 'file', 'max:1055'],
            'is_visible' => ['required','boolean'],
            'keywords' => ['required'],
            'categories*' => ['required'],
            'type_id' => ['required', 'exists:types,id'],
            'level_id' => ['required', 'exists:levels,id'],
            'department_id' => ['required', 'exists:departments,id'],
            // 'published_at' => ['required','date','max:255'],
        ]);
//  dd($request);

        $document = Document::create([
            'title' => $request->title,
            'type_id' => $request->type_id,
            'department_id' => $request->department_id,
            'option_id' => $request->option_id,
            'slug' =>$slug= Str::slug($request->title),
            'user_id' => Auth::user()->id,
            'level_id' => $request->level_id,
            'file' => $request->file,
            'extension'=>$request->file->extension(),
            'author' => $request->author,
            'supervisor' => $request->supervisor,
            'published_at' =>$request->is_visible ? now() : null,
            'description' => $request->description,
          ]);
        $document->save();
        // foreach($request->keywords as $keyword){
        //         $document->keywords()->attach($keyword);
        // }
        foreach($request->categories as $category){
            $document->categories()->attach($category);
        }
        // Ajout fichier

        // $filename_chemin = 'document'.uniqid(). $document->id . '.' . $request->file()->getClientOriginalExtension();
        $filename = $slug . '.' . $request->file->extension();
        $request->file->storeAs('public/documents', $filename);
        $document->file = $filename;

        // $filename =  Carbon::now()->timestamp . uniqid($slug) . '.' . $request->file->getClientOriginalExtension();
        // $document->id . '.' . $request->file->getClientOriginalExtension();
        // $document->file = $filename_chemin;
        // $request->file('file')->storeAs('public/storage/documents/' , $filename, 'public');
        $document->save();

        // dd('ok');
        return redirect()->route('documents.index')->with('success', "Le document a bien été enregistré ! ");
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function createDepartment(Request $request){
        dd("darta");
        $data=$request->validate(['name'=>['required','string','min:2','unique:tags,name']]);
        Department::create($data);
        // session()->flash('message','Tag added successfuly');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->with('success', "Le Departement a bien été enregistré ! ");
        dd("test");
        // Toastr::success('<i class="fa fa-check"></i> Tag added successfuly ', 'Success!!');

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
