<div class="sidebar-wrapper d-lg-block d-md-none d-none">
    <div class="card ctm-border-radius shadow-sm border-none grow">
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-6 align-items-center text-center">
                    <a href="{{ route('dashboard') }}"
                        class="p-4 first-slider-btn @if (Route::currentRouteName() == 'dashboard') active text-white @else text-dark @endif ctm-border-right ctm-border-left ctm-border-top"
                        @if (Route::currentRouteName() == 'dashboard') active @endif><span
                            class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class>Dashboard</span></a>
                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="{{ route('users.index') }}"
                        class="@if (Route::currentRouteName() == 'profile.edit') text-white @else text-dark @endif p-4  @if (Route::currentRouteName() == 'users.index' ||
                                Route::currentRouteName() == 'users.create' ||
                                Route::currentRouteName() == 'users.edit') active text-white @else text-dark @endif second-slider-btn ctm-border-right ctm-border-top"><span
                            class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class>Utilisateurs</span></a>
                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="{{ route('documents.index') }}"
                        class="@if (Route::currentRouteName() == 'profile.edit') text-white @else text-dark @endif p-4  @if (Route::currentRouteName() == 'documents.index' ||
                                Route::currentRouteName() == 'documents.create' ||
                                Route::currentRouteName() == 'documents.edit') active text-white @else text-dark @endif second-slider-btn ctm-border-right ctm-border-top"><span
                            class="fa fa-file pr-0 pb-lg-2 font-23"></span><span class>Document(s)</span></a>
                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="{{ route('admin.departments.list') }}"
                   class=" @if (Route::currentRouteName() == 'admin.departments.list') text-white @else text-dark @endif p-4  @if (Route::currentRouteName() == 'admin.departments.list') active text-white @else text-dark @endif"
                        class="text-dark p-4 ctm-border-right ctm-border-left"><span
                            class="lnr lnr-apartment pr-0 pb-lg-2 font-23"></span><span class>Departement(s)</span></a>
                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="{{ route('admin.options.list') }}"
                    class=" @if (Route::currentRouteName() == 'admin.options.list') text-white @else text-dark @endif p-4  @if (Route::currentRouteName() == 'admin.options.list') active text-white @else text-dark @endif"

                    class="text-dark p-4 ctm-border-right"><span
                            class="lnr lnr-map pr-0 pb-lg-2 font-23"></span><span class>Filière(s)</span></a>

                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="{{ route('admin.categories.list') }}"
                    class=" @if (Route::currentRouteName() == 'admin.categories.list') text-white @else text-dark @endif p-4  @if (Route::currentRouteName() == 'admin.categories.list') active text-white @else text-dark @endif"
                    class="text-dark p-4 ctm-border-right"><span
                            class="lnr lnr-map pr-0 pb-lg-2 font-23"></span><span class>Catégorie(s)</span></a>
                </div>
                {{-- <div class="col-6 align-items-center shadow-none text-center">
                    <a href="{{ route('list.services', 2) }}" class="text-dark p-4 ctm-border-right"><span
                            class="lnr lnr-map pr-0 pb-lg-2 font-23"></span><span
                            class>Type de Mémoire</span></a>
                </div> --}}
                
                {{-- <div class="col-6 align-items-center shadow-none text-center">
                    <a href="leave.html"
                        class="text-dark p-4 ctm-border-right ctm-border-left"><span
                            class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span
                            class>Leave</span></a>
                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="reviews.html"
                        class="text-dark p-4 last-slider-btn ctm-border-right"><span
                            class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span
                            class>Reviews</span></a>
                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="reports.html"
                        class="text-dark p-4 ctm-border-right ctm-border-left"><span
                            class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span
                            class>Reports</span></a>
                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="manage.html" class="text-dark p-4 ctm-border-right"><span
                            class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span
                            class>Manage</span></a>
                </div>
                <div class="col-6 align-items-center shadow-none text-center">
                    <a href="settings.html"
                        class="text-dark p-4 last-slider-btn1 ctm-border-right ctm-border-left"><span
                            class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span
                            class>Settings</span></a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
