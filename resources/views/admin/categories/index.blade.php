@extends('layouts.base')
@section('title',__('Liste des Catégories'))
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
@livewire('admin.manage-categories')
					
@endsection