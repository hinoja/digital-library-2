@php
    use App\Models\SituationMatrimoniale;
@endphp
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/css/lnr-icon.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <title> Détails Personnel | {{ config('app.name', 'MindCad') }} </title>


    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <div class="inner-wrapper">

        @include('include.header')

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-12 col-lg-12  col-md-12">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-6 col-md-6 d-flex">
                                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0 text-center font-weight-bold">Photo</h4>
                                            </div>
                                            <div class="card-body text-center">
                                                <img alt="avatar image" src="{{ asset('assets/img/pdficon.png') }}"
                                                    height="127px" width="128px" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-6 col-md-6 d-flex">
                                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0 text-center font-weight-bold">Contacts</h4>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text mb-3"><span class="text-primary">Auteur :</span>
                                                    <a href="mailto:{{ $document->email }}">{{ $document->author }}</a>
                                                </p>
                                                <p class="card-text mb-3"><span class="text-primary">Encadreur
                                                        :</span><b>{{ $document->supervisor }}
                                                        {{-- {{ number_format($document->phoneNumber, 0, ',', ' ') }}  --}}
                                                    </b></p>
                                                <p class="card-text mb-3"><span class="text-primary">Ajouté Par :</span>
                                                    <a
                                                        href="mailto:{{ $document->email }}">{{ $document->user->name }}</a>
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                                <div class="card flex-fill ctm-border-radius shadow-sm grow">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 text-center font-weight-bold">Thème:
                                            {{ $document->title }} </h4>
                                    </div>
                                    <div class="card-body text-center">
                                        {{-- <p class="card-text mb-3"><span class="text-primary">Thème :</span>
                                            {{ $document->title }}
                                        </p> --}}
                                        <p class="card-text mb-3"><span class="text-primary"><strong>Slug:</strong>
                                            </span>{{ $document->slug }}
                                        </p>

                                        <p class="card-text mb-3"><span class="text-primary"><strong>Type :</strong>
                                            </span>{{ strtoupper($document->type->name) }}
                                        </p>
                                        <p class="card-text mb-3"><span class="text-primary"><strong>Date de
                                                    Publicaction</strong>
                                                :</span>
                                            {{ $document->formatDate($document->published_at) }}</p>

                                        <p class="card-text mb-3"><span class="text-primary"><strong>Niveau :</strong>
                                            </span>{{ strtoupper($document->level->name) }}
                                        </p>
                                        <p class="card-text mb-3"><span class="text-primary"><strong>Département
                                                    :</strong></span>
                                            {{ strtoupper($document->option->department->name) }}
                                        <p class="card-text mb-3"><span class="text-primary"><strong>Filière
                                                    :</strong></span> {{ strtoupper($document->option->name) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                                <div class="card flex-fill  ctm-border-radius shadow-sm grow">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 text-center font-weight-bold"> Infos Complémentaires
                                        </h4>
                                    </div>
                                    <div class="card-body text-center">

                                        <p class="card-text mb-3"><span class="text-primary"><strong>Ajouté le
                                                    :</strong>
                                            </span>{{ $document->formatDate($document->created_at) }}</p>
                                        <p class="card-text mb-3"><span class="text-primary"> <strong>Documents
                                                    Disponible :</strong>
                                            </span>
                                            @if ($document->file)
                                                <a href="{{ route('front.documents.download', $document->id) }}"
                                                    class="btn-one"><span class="btn btn-outline-secondary"> <i
                                                            class="fa fa-download" aria-hidden="true"></i> </span> <i
                                                        class="fa-solid fa-angles-right"></i></a>
                                            @else
                                                <span>Aucun </span>
                                            @endif
                                        </p>
                                        <p class="card-text mb-3"><span class="text-primary"><strong>Catégorie(s)
                                                    :</strong></span>
                                            <small>
                                                @foreach ($document->categories as $category)
                                                    {{ $category->name }},
                                                @endforeach
                                            </small>
                                        </p>
                                        <p class="card-text mb-3"><span class="text-primary"><strong>Lien github
                                                    :</strong>
                                            </span><a href="#"
                                                target="_blank">{{ $document->github_link ? $document->github_link : '----' }}</a>
                                            </span>

                                        </p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>

    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"
         type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"
         type="647b56e7c0d4cdeba6be909f-text/javascript"></script>

    <script src="{{ asset('assets/js/script.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="647b56e7c0d4cdeba6be909f-|49" defer></script>
</body>

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-vertical/details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 15:50:38 GMT -->

</html>
