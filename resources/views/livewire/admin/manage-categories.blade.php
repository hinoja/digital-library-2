<div>
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
            <h4 class="card-title float-left mb-0 mt-2">{{ $categories->count() }} @if ($categories->count() > 1)
                    Catégories
                @else
                    Categorie
                @endif
            </h4>
            <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                <li class="nav-item pl-3">
                    <a href="{{ route('documents.create') }}"
                        class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i
                            class="fa fa-plus"></i>Ajouter Une Catégorie</a>
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
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Créée le </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $categorie->name }}
                                    </td>
                                    <td>{{ $categorie->description ? $categorie->description : '--' }} </td>
                                    <td>{{ $categorie->created_at }} </td>
                                    <td>
                                        <button wire:click="destroy({{ $categorie }})"
                                            class="btn btn-danger  waves-effect"><i class="fa fa-trash "></i> </button>


                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>


        </div>
    </div>
</div>
