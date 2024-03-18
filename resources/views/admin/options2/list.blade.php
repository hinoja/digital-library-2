@extends('layouts.base')
@section('title',__('Liste des Sous-services'))

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
                                            <li class="breadcrumb-item d-inline-block active">
                                                Services </li>
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

        @include('include.sidebar')

    </aside>
</div>
@endsection


@section('content')
<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
    <div class="card-body text-center">
        {{-- <p class="text-center">SERVICE {{ $options->first()->department->name }} </p> --}}
    </div>
</div>
<div class="row">
    @foreach($options as $option)
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <a href="{{ route('show.service', $option->id) }}">
            <div class="card dash-widget ctm-border-radius shadow-sm grow">
                <div class="card-body">
                    <div class="card-icon bg-white">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="card-right">  
                        <h4 class="card-title">@if($option->service->id == 2) Service Départementale @endif {{ $option->name }}</h4>
                        {{-- <p class="card-text">{{ App\Models\User::count() }}</p> --}}
                    </div>
                </div>
            </div>
            </a>
        </div>
    @endforeach
</div>
@endsection