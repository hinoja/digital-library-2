@extends('layouts.base')
@section('title',__('Ajouter Un Utilisateur'))
@section('style')
	<link rel="stylesheet" href="{{ asset('assets/css/lnr-icon.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('script')
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
                if(regionID) {
                    $.ajax({
                        url: '/department/'+regionID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {                      
                            $('select[name="departmentOrigin_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="departmentOrigin_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
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
                                        <ol
                                            class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                            <li class="breadcrumb-item d-inline-block"><a
                                                    href="{{ route('welcome') }}" class="text-dark">Accueil</a>
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
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="accordion add-employee" id="accordion-details">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="basic1">
                <h3 class="cursor-pointer mb-0">
                    <a class=" coll-arrow d-block text-dark" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
                        Informations Personnelles
                        <br><span class="ctm-text-sm">Bien vouloir remplir tous les champs.</span>
                    </a>
                </h3>
            </div>
            <div class="card-body p-0">
                <div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1"
                    data-parent="#accordion-details">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-1">
                                        <p>Photo</p>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="file" class="form-control" name="avatar" value="{{ old('avatar') }}" id="avatar" placeholder="Nom(s)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nom(s)">
                                @error('name')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" class="form-control" name="firstName"  value="{{ old('firstName') }}" placeholder="Prenom(s)">
                                @error('firstName')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="email" class="form-control" name="email"  value="{{ old('email') }}" placeholder="Email">
                                 @error('email')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="date" class="form-control" name="birthDate"  value="{{ old('birthDate') }}" placeholder="Date de naissance">
                                @error('birthDate')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="location"  value="{{ old('location') }}" placeholder="Localisation">
                                @error('location')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="phoneNumber"  value="{{ old('phoneNumber') }}" placeholder="Numéro de Téléphone (+237)">
                                @error('phoneNumber')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <select class="form-control select" name="regionOrigin_id">
                                    <option value="">Selectionner Région d'Origine... </option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                                @error('regionOrigin_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <select class="form-control select" name="departmentOrigin_id">
                                    <option value="">Selectionner Département d'Origine... </option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('departmentOrigin_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <hr>
                            <div class="col-md-6 form-group">
                                <select class="form-control select" name="sexe_id">
                                    <option value="">Selectionner le Sexe M/F</option>
                                    <option value="1">Masculin</option>
                                    <option value="2">Féminin</option>
                                </select>
                                @error('sexe_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <select class="form-control select" name="situationMatrimoniale_id">
                                    <option value="">Selectionner Situation Matrimoniale... </option>
                                    @foreach($situatMat as $situatMa)
                                        <option value="{{ $situatMa->id }}">{{ $situatMa->name }}</option>
                                    @endforeach
                                </select>
                                @error('situationMatrimoniale_id')
                                    <li style="color:red;">{{ $message }}</li>
                                @enderror
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="headingTwo">
                <h3 class="cursor-pointer mb-0">
                    <a class="coll-arrow d-block text-dark" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#employee-det">
                        Informations Professionnelles
                        <br><span class="ctm-text-sm">Bien vouloir remplir tous les champs.</span>
                    </a>
                </h3>
            </div>
            <div class="card-body p-0">
                <div id="employee-det" class="collapse show ctm-padding"
                    aria-labelledby="headingTwo" data-parent="#accordion-details">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <select class="form-control select" name="status_id">
                                <option value="">Selectionner le Statut... </option>
                                @foreach($status as $statu)
                                    <option value="{{ $statu->id }}">{{ $statu->name }}</option>
                                @endforeach
                            </select>
                            @error('status_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <select class="form-control select" name="grade_id">
                                <option value="">Selectionner le Grade... </option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="matricule"  value="{{ old('matricule') }}" placeholder="Matricule">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Date de Prise de Service</h5>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="priseService"  value="{{ old('priseService') }}" placeholder="Date de Prise de Service">
                                </div>
                            </div>
                            @error('priseService')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Experience (CV)</h5>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="cv" value="{{ old('cv') }}" id="cv" placeholder="CV">
                                </div>
                            </div>
                            @error('cv')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="headingThree">
                <h3 class="cursor-pointer mb-0">
                    <a class="coll-arrow d-block text-dark" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#term-office">
                        Lieu de Service
                        <br><span class="ctm-text-sm">Type de Service (Services centraux / Services déconcentrés).</span>
                    </a>
                </h3>
            </div>
            <div class="card-body p-0">
                <div id="term-office" class="collapse show ctm-padding"
                    aria-labelledby="headingThree" data-parent="#accordion-details">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <select class="form-control select" name="service_id" id="service_id" onchange="toggleSecondSelect()">
                                <option value="">Selectionner le Type de Service... </option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <select class="form-control select" name="sub_service_id" id="sub_service_id">
                                <option value="">Selectionner le Sous-service... </option>
                                @foreach($subservices as $subservice)
                                    <option value="{{ $subservice->id }}">{{ $subservice->name }}</option>
                                @endforeach
                            </select>
                            @error('sub_service_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <select class="form-control select" name="regionAff_id">
                                <option value="">Selectionner Région d'Affectation... </option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                            @error('regionAff_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <select class="form-control select" name="departmentAff_id">
                                <option value="">Selectionner Département d'Affectation... </option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('departmentAff_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-control select" name="fonction_id">
                                <option value="">Selectionner la Fonction Occupée  </option>
                                @foreach($fonctions as $fonction)
                                    <option value="{{ $fonction->id }}">{{ $fonction->name }}</option>
                                @endforeach
                            </select>
                            @error('fonction_id')
                                    <li style="color:red;">{{ $message }}</li>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm grow ctm-border-radius">
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
                                @foreach($roles as $role)
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
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="submit-section text-center btn-add">
                <button class="btn btn-theme text-white ctm-border-radius button-1" type="submit">Enregistrer</button>
            </div>
        </div>
    </div>
    </form>
@endsection