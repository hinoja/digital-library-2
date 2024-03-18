<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $departments = Department::query()->ordreBy('name','desc')->get(); $options = Option::query()->ordreBy('name','desc')->get(); $categories = Category::query()->ordreBy('name','desc')->get();
        // $levels = Level::query()->ordreBy('name','desc')->get(); $types = Type::query()->ordreBy('name','desc')->get();

        $data = Document::query()->latest()
            ->with(['categories'])
            ->paginate(12);
        return view('welcome', [
            'documents' => $data,
            // 'users' => User::query()->orderBy('name', 'asc')
            //     ->with(['role', 'careers'])
            //     ->OnlyEmployee()
            //     ->paginate(12),
            'categories' => Category::query()->orderBy('name', 'asc')->get(),
            'levels' => Level::query()->orderBy('name', 'asc')->get(),
            // 'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('documents.details', ['document' => $document]);
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
    /**
     * Store a newly created resource in storage.
     */
    // Télécharger document
    public function download($id)
    {
        $document = Document::findOrFail($id);
        if ($document->file) {
            return response()->download(public_path('storage/documents/' . $document->file));
        } else {
            return back();
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $search = '%' . $request->search . '%';
        $categorie = $request->categorie;
        $level = $request->level;

        if (!$request->search && !$categorie && !$level) {
            $documents = Document::query()->latest()
                    // ->active()
                    ->with(['categories', 'option'])
                ->paginate(12);
            return view('welcome', [
                'documents' =>$documents,
                'categories' => Category::query()->orderBy('name', 'asc')->get(),
                'levels' => Level::query()->orderBy('name', 'asc')->get(),
            ]);
        } else {
            $documents = Document::query()
                ->when(
                    $request->search,
                    fn (Builder $query) => $query->orWhere('title', 'LIKE', $search)
                    // ->orWhere('firstName', 'LIKE', $search)
                )
                ->when(
                    $request->level,
                    fn (Builder $query) => $query->where('level_id',  $request->level)

                )
                ->when(
                    $request->categorie,
                    fn (Builder $query) => $query->whereIn('id', DB::table('category_document')->where('category_id', $request->categorie)->pluck('document_id')->toArray())

                )
                // ->when(
                //     $request->categorie,
                //     fn (Builder $query) => $query->whereIn('id', Career::where('departmentAff_id', $request->department)->pluck('user_id')->toArray())

                // )

                ->orderByDesc('created_at');
            return view('welcome', [
                'documents' => $documents->paginate(12),
                'categories' => Category::query()->orderBy('name', 'asc')->get(),
                'levels' => Level::query()->orderBy('name', 'asc')->get(),

            ]);
        }
    }
}
