@extends('layouts.app')

@section('content')
{{-- <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Register
                </h1>
            </div>
        </div>
    </section> --}}

<div class="columns is-marginless is-centered">
    <div class="column is-5">
        <div class="card">
            <header class="card-header has-background-link">
                <p class="card-header-title has-text-white is-centered">Register</p>
            </header>

            <div class="card-content">
                <form class="register-form" method="POST" action="{{ route('register') }}">

                    {{ csrf_field() }}

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Name</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input is-dark" id="name" type="name" name="name"
                                        value="{{ old('name') }}" required autofocus>
                                </p>

                                @if ($errors->has('name'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Faculty ID</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input is-dark" id="fac_id" type="text" name="facultyid"
                                        value="{{ old('facultyid') }}" required autofocus>
                                </p>

                                @if ($errors->has('facultyid'))
                                <p class="help is-danger">
                                    {{ $errors->first('facultyid') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Department</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <div class="select is-dark">
                                        <select name="department">
                                            @foreach ($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">E-mail Address</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input is-dark" id="email" type="email" name="email"
                                        value="{{ old('email') }}" required autofocus>
                                </p>

                                @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Password</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input is-dark" id="password" type="password" name="password" required>
                                </p>

                                @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Confirm Password</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input is-dark" id="password-confirm" type="password"
                                        name="password_confirmation" required>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label"></div>

                        <div class="field-body">
                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-link">Register</button>
                                </div>
                                <div class="control">
                                     <a href="/" type="reset" class="button">Cancel</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
