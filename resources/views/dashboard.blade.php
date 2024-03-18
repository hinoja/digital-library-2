@extends('layouts.base')
@section('title',__('Dashboard'))

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
                                                Interface {{ Auth::user()->name}}</li>
                                                {{-- Interface {{ Auth::user()->role->name}}</li> --}}
                                        </ol>
                                        <h4 class="text-dark"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
            <div class="user-info card-body">
                <div class="user-avatar mb-4">
                    <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('assets/img/profiles/user-default.png') }}" alt="User Avatar"
                        class="img-fluid rounded-circle" width="100">
                </div>
                <div class="user-details">
                    <h4><b>Bienvenue {{ Auth::user()->name }}</b></h4>
                    <p> {{ now()->format('d, m Y')}}</p>
                </div>
            </div>
        </div>

        @include('include.sidebar')

    </aside>
</div>
@endsection


@section('content')
<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
    <div class="card-body">
        <ul class="list-group list-group-horizontal-lg">
            <li class="list-group-item text-center active button-5"><a href="{{ route('dashboard') }}"
                    class="text-white">Tableau de bord Administrateur</a></li>
            <li class="list-group-item text-center button-6"><a class="text-dark"
                    href="{{ route('dashboard') }}">Tableau de bord Géomètre</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card dash-widget ctm-border-radius shadow-sm grow">
            <div class="card-body">
                <div class="card-icon bg-primary">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="card-right">  
                    <h4 class="card-title">Utilisateurs</h4>
                    <p class="card-text">{{ $nbre_users }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
        <a href="{{ route('list.services', 1) }}">
        <div class="card dash-widget ctm-border-radius shadow-sm grow">
            <div class="card-body">
                <div class="card-icon bg-warning">
                    <i class="fa fa-file"></i>
                </div>
                <div class="card-right">
                    <h4 class="card-title">Documents</h4>
                    <p class="card-text text-dark">{{ $nbre_documents }}</p>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
        {{-- <a href="{{ route('list.services', 2) }}"> --}}
        <div class="card dash-widget ctm-border-radius shadow-sm grow">
            <div class="card-body">
                <div class="card-icon bg-danger">
                    <i class="fa fa-flag" aria-hidden="true"></i>
                </div>
                <div class="card-right">
                    <h4 class="card-title">Departements</h4>
                    <p class="card-text text-dark">{{ $departments }}</p>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
        {{-- <a href="{{ route('list.services', 2) }}"> --}}
        <div class="card dash-widget ctm-border-radius shadow-sm grow">
            <div class="card-body">
                <div class="card-icon bg-danger">
                    <i class="fa fa-map" aria-hidden="true"></i>
                </div>
                <div class="card-right"> 
                    <h4 class="card-title">Filière</h4>
                    <p class="card-text text-dark">{{ $options }}</p>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
        {{-- <a href="{{ route('list.services', 2) }}"> --}}
        <div class="card dash-widget ctm-border-radius shadow-sm grow">
            <div class="card-body">
                <div class="card-icon bg-danger">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                </div>
                <div class="card-right">
                    <h4 class="card-title">Catégories</h4>
                    <p class="card-text text-dark">{{ $categories }}</p>
                </div>
            </div>
        </div>
        </a>
    </div>
    
</div>
@endsection