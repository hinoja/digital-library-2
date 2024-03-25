@extends('layouts.guest')
@section('title', "S'enregister")
@section('content')
    <div class="login-right">
        <div class="login-right-wrap">
            <h1>{{ __("S'enregister") }}</h1>
            <p class="account-subtitle">Accéder au Tableau de bord</p>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}">

                @csrf
                <!-- Name -->
                <div class="form-group">
                    <input class="form-control" placeholder="name" type="name" name="name" :value="old('name')"
                        required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>


                <!-- Email Address -->
                <div class="form-group">
                    <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role -->

                <div class="form-group">
                    <select name="role_id" class="form-control" id="">
                        @foreach ($roles as $role)
                            @if ($role->id != 1)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                </div>

                <!-- Password -->

                <div class="form-group">
                    <input class="form-control" type="password" name="password" required autocomplete="current-password"
                        placeholder="Mot de passe">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- <!-- Avatar -->

                <div class="form-group">
                    <input class="form-control" type="file" name="password" required autocomplete="current-password"
                        placeholder="Mot de passe">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div> --}}


                <div class="form-group">
                    <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">
                        {{ __('Log in') }}</button>
                </div>


            </form>

            {{-- <div class="text-center forgotpass"><a href="forgot-password.html"> {{ __('Forgot your password?') }}</a>
            </div> --}}

            {{-- <div class="text-center dont-have">Pas de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a></div> --}}
        </div>
    </div>
@endsection
