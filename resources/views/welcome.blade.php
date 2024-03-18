@php
    use App\Models\Region;
    use App\Models\Department;
@endphp
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-vertical/employees.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 15:50:04 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/lnr-icon.css">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <title> Accueil | {{ config('app.name', 'Bibliothèque Numérique') }} </title>


    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    <div class="bandeau">
        <div class="etoile">
            <img src="{{ asset('assets/img/etoile.png') }}" alt="User Image">
        </div>
    </div>
    {{-- <div class="bandeau" style="height: 20px;background: linear-gradient(to right, #00853f 33.33%, #ffce00 33.33% 66.66%, #ce1126 66.66%);"></div> --}}
    <div class="inner-wrapper">

        {{-- Start Header  --}}
        @include('include.header')
        {{-- End Header --}}
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    {{-- start navbar --}}
                    {{-- @include('include.navbarUnauthentificated') --}}
                    {{-- End Navbar --}}

                    <div class="col-xl-12 col-lg-12 col-md-12">
                        @include('include.searchBar')

                        @if ($category = request()->category)
                            <h6 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">@lang('For category')
                                <strong class="text-primary">{{ $category->name }}
                                    ({{ $documents->count() }})</strong>
                            </h6>
                        @elseif (request()->isMethod('post'))
                            <h6 class="text-center wow fadeInUp" data-wow-delay="0.1s">@lang('Search results') : <strong
                                    class="text-primary">
                                    @if ($documents === '')
                                        0
                                    @else
                                        {{ $documents->count() }}
                                    @endif
                                </strong> @lang('document(s) trouvé(s)')
                            </h6>
                            <p class="text-center mb-5 fst-italic">
                                <small>
                                    @lang('Catégorie') : <strong
                                        class="text-primary">{{ request()->categorie ?  App\Models\Category::find(request()->categorie)->name  : trans('Empty') }}</strong>,
                                    @lang('Niveau') : <strong
                                        class="text-primary">{{ request()->level ?  (App\Models\Level::find( request()->level)->name)   : trans('Empty') }}</strong>
                                    @lang('Thème') : <strong
                                        class="text-primary">{{ request()->search ?? trans('Empty') }}</strong>,

                                </small>
                            </p>
                        @endif

                        <div class="ctm-border-radius shadow-sm grow card">
                            <div class="card-body">

                                <div class="row people-grid-row">
                                    @foreach ($documents as $document)
                                        <div class="col-md-6 col-lg-6 col-xl-3">
                                            <div class="card widget-profile">
                                                <div class="card-body">
                                                    <div class="pro-widget-content text-center">
                                                        <div class="profile-info-widget">
                                                            <a href="{{ route('details', $document) }}"
                                                                {{-- class="booking-doc-img" --}}
                                                                >
                                                                <img src="{{ asset('assets/img/pdficon2.png')}}" 
                                                                    alt="document Image">
                                                            </a>
                                                            <div class="profile-det-info">
                                                                <h4><a href="{{ route('details', $document) }}"
                                                                        class="text-default">
                                                                        {{ $document->title }}</a></h4>
                                                                <div>
                                                                    <p class="mb-0">
                                                                        {{-- <b>{{ number_format($user->phoneNumber, 0, ',', ' ') }}
                                                                        </b> --}}
                                                                    </p>
                                                                    <p class="mb-0 text-primary ">
                                                                        {{-- <small><strong>{{ $user->careers->last()->grade->code }}</strong></small> --}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <nav aria-label="Page navigation example" class="float-right" style="margin-left: auto">
                                <ul class="pagination">
                                    {{ $documents->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    {{-- <div class="sidebar-overlay" id="sidebar_overlay"></div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="7cb0b84ef174bc54b183b1ca-text/javascript"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}" type="7cb0b84ef174bc54b183b1ca-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="7cb0b84ef174bc54b183b1ca-text/javascript"></script>

    {{-- <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"
		type="7cb0b84ef174bc54b183b1ca-text/javascript"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"
		type="7cb0b84ef174bc54b183b1ca-text/javascript"></script>

    <script src="assets/js/script.js" type="7cb0b84ef174bc54b183b1ca-text/javascript"></script>
    <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="7cb0b84ef174bc54b183b1ca-|49" defer></script> --}}

    {{-- ajax Dependant dropdow --}}
    {{-- <script>
        $(document).ready(function() {
            $('#region_name').on('change', function() {
                var getStId = $(this).val();
                if (getStId) {
                    $.ajax({
                        url: '/searchYourdepartment/' + getStId,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            //console.log(data);
                            if (data) {
                                $('#department_name').empty();
                                $('#department_name').focus;
                                $('#department_name').append(
                                    '<option value="">-- Select MyCity --</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="department_name"]').append(
                                        '<option value="' + key + '">' + value
                                        .department_name_name + '</option>');
                                });
                            } else {
                                $('#department_name').empty();
                            }
                        }
                    });
                } else {
                    $('#department_name').empty();
                }
            });
        });
    </script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#region_name').on('change', function() {
                var regionID = jQuery(this).val();
                if (regionID) {
                    jQuery.ajax({
                        url: 'dropdownlist/searchYourdepartment/' + regionID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            $('#department_name').empty();
                            jQuery.each(data, function(key, value) {
                                $('#department_name').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#department_name').empty();
                }
            });
        });
    </script>
    
    {{-- end ajax --}}

</body>

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-vertical/employees.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 15:50:06 GMT -->

</html>
