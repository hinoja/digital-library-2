@extends('layouts.base')
@section('title', __('Ajouter Un Utilisateur'))
@section('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/lnr-icon.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('script')
<script src="tom-select.complete.js"></script>
<link href="tom-select.bootstrap4.css" rel="stylesheet" />
<input class="select" /> ... <input class="select" />
<script>
document.querySelectorAll('.select').forEach((el)=>{
	let settings = {};
 	new TomSelect(el,settings);
});
</script>
     <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}" type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>

    <script src="{{ asset('assets/plugins/select2/moment.min.js') }}" type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>

    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}" type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>

    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"
		type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>

    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"
		type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"
		type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>

    <script src="{{ asset('assets/js/script.js') }}" type="9bc4cd670611a99fde6cbe8b-text/javascript"></script>
    <script src="{{ asset('assets/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="4ef476f55919fd493f42e221-|49" defer></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> --}}
    <script type="text/javascript">
        function toggleSecondSelect() {
            var firstSelect = document.getElementById("service_id");
            var secondSelect = document.getElementById("sub_service_id");

            if (firstSelect.value === "CENTRAUX") {
                secondSelect.style.display = "block";
            } else {
                secondSelect.style.display = "none";
            }

            if (firstSelect.value === "DECONCENTRES") {
                secondSelect.style.display = "none";
            } else {
                secondSelect.style.display = "block";
            }
        }


        $(document).ready(function() {

            // Rechercher un department
            $('select[name="regionOrigin_id"]').on('change', function() {
                var regionID = $(this).val();
                if (regionID) {
                    $.ajax({
                        url: '/department/' + regionID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="departmentOrigin_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="departmentOrigin_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="departmentOrigin_id"]').empty();
                }
            });

        });
    </script>
@endsection

@section('navbar')
    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
        <aside class="sidebar sidebar-user">
            <div class="row">
                <div class="col-12">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-md-12 mr-auto text-left">
                                    <div class="custom-search input-group">
                                        <div class="custom-breadcrumb">
                                            <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                <li class="breadcrumb-item d-inline-block"><a href="{{ route('welcome') }}"
                                                        class="text-dark">Accueil</a>
                                                </li>
                                                <li class="breadcrumb-item d-inline-block active">
                                                    Utilisateurs</li>
                                            </ol>
                                            <h4 class="text-dark">Ajouter Un Utilisateur</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('include.sidebar')

        </aside>
    </div>
@endsection

@section('content')
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="accordion add-employee" id="accordion-details">
            <div class="card shadow-sm grow ctm-border-radius">
                <div class="card-header" id="basic1">
                    <h3 class="cursor-pointer mb-0">
                        <a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#basic-one" aria-expanded="true">
                            Informations Primaires
                            {{-- @foreach ($errors->all() as $error) 
                                <li>{{ $error}}</li>
                           @endforeach --}}
                            <br><span class="ctm-text-sm">Bien vouloir remplir tous les champs.</span>
                        </a>
                    </h3>
                </div>
                <div class="card-body p-0">
                    <div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1"
                        data-parent="#accordion-details">
                        <div class="row">

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                    placeholder="Theme:La culture du numerique ">
                                @error('title')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="author" value="{{ old('author') }}"
                                    placeholder="Auteur(s)">
                                @error('author')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="supervisor"
                                    value="{{ old('supervisor') }}" placeholder="Encadreur(s)">
                                @error('supervisor')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">


                                <textarea name="description" id="contactMessage" cols="30" rows="6" class="input textarea"
                                    placeholder="La description du document..."></textarea>
                                @error('description')
                                    <span class="text-danger text-center text"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <hr>
                            <div class=" custom-control custom-switch">
                                <input name="is_visible" value="0" type="hidden">
                                <input type="checkbox" value="1"
                                {{ old('is_visible') == 'on' ? 'checked' : '' }} class="custom-control-input" id="customSwitches" name="is_visible">
                                <label class="custom-control-label" for="customSwitches">Publié</label>
                                @error('is_visible')
                                <li style="color:red;">{{ $message }}</li>
                               @enderror 
                            </div>

                            {{-- <div class="col-md-6 form-group">
                                <label class="form-check-label" for="is_visible">Publié</label>
                                <input name="is_visible" value="0" type="hidden">
                                <input name="is_visible" type="checkbox" id="is_visible" role="switch" value="1"
                                    {{ old('is_visible') == 'on' ? 'checked' : '' }} data-toggle="toggle" data-size="xs">

                                @error('is_visible')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm grow ctm-border-radius">
                <div class="card-header" id="headingTwo">
                    <h3 class="cursor-pointer mb-0">
                        <a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#employee-det">
                            Informations Secondaires
                            <br><span class="ctm-text-sm">Bien vouloir remplir tous les champs.</span>
                        </a>
                    </h3>
                </div>
                <div class="card-body p-0">
                    <div id="employee-det" class="collapse show ctm-padding" aria-labelledby="headingTwo"
                        data-parent="#accordion-details">
                        <div class="row">

                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Uploader Le fichier</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="file"
                                            value="{{ old('file') }}" id="documentfile" placeholder="Fichier">
                                    </div>
                                </div>
                                @error('file')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5>Mot(s)-clé(s)</h5>
                                    </div>
                                    <input type="text" class="form-control" name="keywords"
                                        value="{{ old('keywords') }}" placeholder="IA,web,sang,hopital ">
                                    @error('keywords')
                                        <li style="color:red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm grow ctm-border-radius">
                <div class="card-header" id="headingThree">
                    <h3 class="cursor-pointer mb-0">
                        <a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#term-office">
                            Informations Tertiaires<br>
                            {{-- <span class="ctm-text-sm">Type de Service (Services centraux / Services
                                déconcentrés).</span> --}}
                        </a>
                    </h3>
                </div>
                <div class="card-body p-0">
                    <div id="term-office" class="collapse show ctm-padding" aria-labelledby="headingThree"
                        data-parent="#accordion-details">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <select id="select-state" multiple placeholder="Selectionner les catégories..."
                                    autocomplete="off"  name="categories[]"
                                    {{-- onchange="toggleSecondSelect()" --}}>
                                    {{-- <option value="">Selectionner les Catégorie... </option> --}}
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <script>
                                new TomSelect("#select-state", {
                                    maxItems: 4
                                });
                            </script>
                            {{-- <div class="col-md-6 form-group">
                            <select class="form-control select" name="sub_service_id" id="sub_service_id">
                                <option value="">Selectionner le Sous-service... </option>
                                @foreach ($subservices as $subservice)
                                    <option value="{{ $subservice->id }}">{{ $subservice->name }}</option>
                                @endforeach
                            </select>
                            @error('sub_service_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div> --}}
                            {{-- <div class="col-md-6 form-group">
                            <select class="form-control select" name="regionAff_id">
                                <option value="">Selectionner Région d'Affectation... </option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                            @error('regionAff_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div> --}}
                            <div class="col-md-4 form-group">
                                <select class="form-control select" name="level_id">
                                    <option value="">Selectionner le Niveau... </option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <select class="form-control select" name="type_id">
                                    <option value="">Selectionner le Type ... </option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <select class="form-control select" name="department_id">
                                    <option val ue="">Selectionner Département ... </option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="option_id">
                                    <option value="">Selectionner la Filière </option>
                                    @foreach ($options as $option)
                                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                                    @endforeach
                                </select>
                                @error('option_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="headingFour">
                <h3 class="cursor-pointer mb-0">
                    <a class="coll-arrow d-block text-dark" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#salary_det">
                        Métadonnées
                        <br><span class="ctm-text-sm">Gestion des paramètres du compte utilisateur.</span>
                    </a>
                </h3>
            </div>
            <div class="card-body p-0">
                <div id="salary_det" class="collapse show ctm-padding" aria-labelledby="headingFour"
                    data-parent="#accordion-details">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                            @error('password')
                                <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <select class="form-control select" name="role_id">
                                <option value="">Selectionner le Rôle... </option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
        <div class="row">
            <div class="col-12">
                <div class="submit-section text-center btn-add">
                    <button class="btn btn-theme text-white ctm-border-radius button-1"
                        type="submit">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>

@endsection
