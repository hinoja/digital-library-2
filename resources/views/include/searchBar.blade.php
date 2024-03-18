<div class="card shadow-sm ctm-border-radius grow">
    <div class="card-body align-center">
        <form action="{{ route('search') }}" method="post">
            @csrf
            <div class="row filter-row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
                        <select id="region_name" name="categorie" class="form-control select required">
                            <option disabled selected>@lang('Selectionnez la categorie')</option>
                            @foreach ($categories as $categorie)
                                <option @selected(request()->categorie == $categorie->id) value="{{ $categorie->id }}">
                                    {{ ucfirst($categorie->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">

                    <select name="level" class="form-control select" id="level_name">
                        <option disabled selected>@lang('Selectionnez le Niveau')</option>
                        @foreach ($levels as $level)
                            <option @selected(request()->level == $level->id) value="{{ $level->id }}">{{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
                        <input type="search" value="{{ request()->search ?? '' }}" name="search"
                            class="form-control datetimepicker" placeholder="thème">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    {{-- <a href="#"
                        class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">
                        Rechercher</a> --}}
                    <button type="submit"
                        class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">@lang('Search')</button>
                    {{-- @if (!request()->has('search'))
                        <button type="reset"
                            class="btn btn-theme btn-xs  text-white   ">@lang('Clear')</button>
                    @endif --}}
                </div>
            </div>
        </form>
    </div>
</div>
