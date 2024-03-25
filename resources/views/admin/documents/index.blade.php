@extends('layouts.base')
@section('title',__('Liste des mémoires'))
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
                                                    href="{{ route('welcome') }}" class="text-dark">Accueil</a>
                                            </li>
                                            <li class="breadcrumb-item d-inline-block active">
                                                Utilisateurs</li>
                                        </ol>
                                        <h4 class="text-dark">Liste des utilisateurs</h4>
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
        <ul class="list-group list-group-horizontal-lg">
            <li class="list-group-item text-center active button-5"><a href="{{ route('users.index') }}"
                    class="text-white">Utilisateurs</a></li>
            <li class="list-group-item text-center button-6"><a class="text-dark"
                    href="{{ route('users.index') }}">Services</a></li>
        </ul>
    </div>
</div>
<div class="card shadow-sm grow ctm-border-radius">
    <div class="card-body align-center">
        <h4 class="card-title float-left mb-0 mt-2">{{ $documents->count() }} @if($documents->count() > 1) Documents @else Document @endif</h4>
        <ul class="nav nav-tabs float-right border-0 tab-list-emp">
            <li class="nav-item pl-3">
                <a href="{{ route('documents.create') }}"
                    class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i
                        class="fa fa-plus"></i> Ajouter Un Document</a>
            </li>
        </ul>
    </div>
</div>
<div class="ctm-border-radius shadow-sm grow card">
    <div class="card-body">
                @include('admin.flash-message')
        <div class="table-back employee-office-table">
            <div class="table-responsive">
                <table
                class="table custom-table table-hover  table-striped table table-bordered  js-basic-example dataTable">
                <thead>
                    <tr>
                            <th class="text-center">#</th>
                            <th>Thème</th>
                            <th>Publié</th>
                            <th>Niveau</th>
                            <th>Auteur</th>
                            <th>Publié</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $document->title }}
                                </td>
                                <td>{{ $document->published_at }} </td>
                                <td>{{ $document->level->name }} </td>
                                <td>{{ $document->author }} </td>
                                <td>
                                    @if ($document->is_visible)
                                        <div class="py-2 px-2">
                                            <span
                                                class="py-1 px-3 rounded-full text-white badge-pill waves-effect text-lg bg-info ">
                                                @lang('Yes')</span>
                                        </div>
                                    @else
                                        <div class="py-2 px-2">
                                            <span
                                                class="py-1 px-3 rounded-full text-white badge-pill waves-effect text-lg bg-dark ">
                                                @lang('No')</span>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                     <i class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> </i>
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
