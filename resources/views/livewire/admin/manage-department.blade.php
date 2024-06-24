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
            <h4 class="card-title float-left mb-0 mt-2">{{ $departments->count() }} @if ($departments->count() > 1)
                    Département(s)
                @else

                @endif
            </h4>
            <ul class="nav nav-tabs float-right border-0 tab-list-emp">

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
                                <th>Crée le</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $department->name }}
                                    </td>
                                    <td>{{ $department->description ? $department->description : '--' }} </td>
                                    <td>{{ $department->created_at }} </td>
                                    <td>
                                        <span class="btn btn-danger"> <i class="fa fa-trash"
                                                aria-hidden="true"></i></span>
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
