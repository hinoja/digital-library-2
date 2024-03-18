@php
    use App\Models\Role;
@endphp
@extends('layouts.base')
@section('title', __('Liste des utilisateurs'))
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
                                            <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                <li class="breadcrumb-item d-inline-block"><a href="{{ route('welcome') }}"
                                                        class="text-dark">Accueil</a>
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
            <h4 class="card-title float-left mb-0 mt-2">{{ $users->count() }} @if ($users->count() > 1)
                    Utilisateurs
                @else
                    Utilisateur
                @endif
            </h4>
            <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                <li class="nav-item pl-3">
                    <a href="{{ route('users.create') }}"
                        class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i
                            class="fa fa-plus"></i>Ajouter Un Utilisateur</a>
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
                                <th>@lang('NOM')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Active')</th>
                                <th>@lang('Role')</th>
                                <th>@lang('Telephone')</th>
                                <th colspan="5">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }} @if ($user->last_seen >= now()->subMinutes(2))
                                            {{-- <i class="fas fa-circle  text-success"></i> --}}
                                            <i class="badge badge-pill badge-success"> Online </i>
                                        @endif
                                    </td>
                                    <td>{{ $user->email }} </td>
                                    <td>
                                        @if ($user->is_active)
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
                                        {{ Role::find($user->role_id)->name }}
                                    </td>
                                    <td>
                                        {{ $user->phone_number }}
                                    </td>
                                    <td colspan="5" style="display: inline-block;">
                                        <div>
                                            @if ($user->role_id > 1)
                                                <form method="POST" action="{{ route('admin.users.status', $user->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <a href="{{ route('admin.users.status', $user->id) }}"
                                                        title="{{ $user->is_active ? __('Block') : __('Unblock') }}"
                                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                        class="btn-xs btn btn-{{ $user->is_active ? 'danger' : 'primary' }}">
                                                        @if ($user->is_active)
                                                            @lang('Bloquer') </i>
                                                        @else
                                                            @lang('Debloquer')
                                                        @endif

                                                    </a>
                                                </form>
                                            @endif
                                            <div class="team-action-icon float-right">
                                                {{-- <span data-toggle="modal" data-target="#edit">
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-theme text-white ctm-border-radius" title
                                                        data-original-title="Modifier"><i class="fa fa-pencil"></i></a>
                                                </span> --}}
                                                <span data-toggle="modal" data-target="#delete-{{ $user->id }}">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-theme text-white ctm-border-radius" title
                                                        data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                                    <div class="modal fade" id="delete-{{ $user->id }}">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title mb-4 text-center">Êtes-vous sûre
                                                                        de vouloir supprimer <br> cet utilisateur ?</h4>
                                                                    <button type="button"
                                                                        class="btn btn-danger ctm-border-radius text-center mb-2 mr-3"
                                                                        data-dismiss="modal">Annuler</button>
                                                                    <a href="{{ route('users.destroy', $user->id) }}"
                                                                        onclick="event.preventDefault();
                                                                document.getElementById('delete-form').submit();">
                                                                        <button type="button"
                                                                            class="btn btn-theme ctm-border-radius text-white text-center mb-2 button-1"
                                                                            data-dismiss="modal">Supprimer</button>
                                                                    </a>
                                                                    <form id="delete-form"
                                                                        action="{{ route('users.destroy', $user->id) }}"
                                                                        method="POST" class="d-none">
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
