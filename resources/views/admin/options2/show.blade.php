@extends('layouts.base')
@section('title',__('Liste du personnel'))
@section('style')
	<link rel="stylesheet" href="{{ asset('assets/css/lnr-icon.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('script')
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="4ef476f55919fd493f42e221-text/javascript"></script>

<script src="{{ asset('assets/js/popper.min.js') }}" type="4ef476f55919fd493f42e221-text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="4ef476f55919fd493f42e221-text/javascript"></script>

<script src="{{ asset('assets/plugins/select2/select2.min.js') }}" type="4ef476f55919fd493f42e221-text/javascript"></script>

<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"
    type="4ef476f55919fd493f42e221-text/javascript"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"
    type="4ef476f55919fd493f42e221-text/javascript"></script>

<script src="{{ asset('assets/js/script.js') }}" type="4ef476f55919fd493f42e221-text/javascript"></script>
<script src="{{ asset('assets/cloudflare-static/rocket-loader.min.js') }}"
    data-cf-settings="4ef476f55919fd493f42e221-|49" defer></script>
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
                                                    href="{{ route('dashboard') }}" class="text-dark">Tableau de bord</a>
                                            </li>
                                            <li class="breadcrumb-item d-inline-block"><a
                                                    href="{{ route('list.services', $subservice->service->id ) }}" class="text-dark">Service</a>
                                            </li>
                                            <li class="breadcrumb-item d-inline-block active">
                                                Départements</li>
                                        </ol>
                                        <h4 class="text-dark">Liste du personnel</h4>
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
<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
    <div class="card-body">
        <p class="text-center">@if($subservice->service->id == 2) Service Départementale @endif {{ $subservice->name }} </p>
    </div>
</div>
<div class="ctm-border-radius shadow-sm grow card">
    <div class="card-body">
                @include('admin.flash-message')
        <div class="table-back employee-office-table">
            <div class="table-responsive">
                <table class="table custom-table table-hover table-hover">
                    <thead>
                        <tr>
                            <th>Nom et prénoms</th>
                            <th>Grade</th>
                            <th>Fonction Occupée</th>
                            <th>Matricule</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="" class="avatar"><img alt="avatar image"
                                        src="{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/img/profiles/user-default.png') }}"
                                        class="img-fluid"></a>
                                <h2><a href="employment.html">{{ $user->name }}</a></h2>
                            </td>
                            <td><a class="btn btn-outline-success btn-sm">{{ $user->careers->last()->grade->name }}</a>
                            </td>
                            <td><a class="btn btn-outline-warning btn-sm"> {{ $user->careers->last()->fonction->name  }} </a></td>
                            <td>{{ $user->matricule }}</td>
                            <td>{{ $user->phoneNumber }}</td>
                            <td>
                                <div class="team-action-icon float-right">
                                    <span data-toggle="modal" data-target="#edit">
                                        <a href="{{ route('users.edit', $user->id )}}"
                                            class="btn btn-theme text-white ctm-border-radius" title
                                            data-original-title="Modifier"><i class="fa fa-pencil"></i></a>
                                    </span>
                                    <span data-toggle="modal" data-target="#delete-{{ $user->id }}">
                                        <a href="javascript:void(0)"
                                            class="btn btn-theme text-white ctm-border-radius" title
                                            data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                        <div class="modal fade" id="delete-{{ $user->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title mb-4 text-center">Êtes-vous sûre de vouloir supprimer <br> cet utilisateur ?</h4>
                                                        <button type="button" class="btn btn-danger ctm-border-radius text-center mb-2 mr-3"
                                                            data-dismiss="modal">Annuler</button>
                                                        <a  href="{{ route('users.destroy', $user->id )}}"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('delete-form').submit();">
                                                            <button type="button" class="btn btn-theme ctm-border-radius text-white text-center mb-2 button-1"
                                                                data-dismiss="modal">Supprimer</button>
                                                        </a>
                                                        <form id="delete-form" action="{{ route('users.destroy', $user->id )}}" method="POST" class="d-none">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
					
@endsection