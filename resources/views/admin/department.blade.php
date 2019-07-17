@extends('layouts.app')

@section('content')

    {{-- <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Login
                </h1>
            </div>
        </div>
    </section> --}}

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Add Department</p>
                </header>

                <div class="card-content">
                    <form class="login-form" method="POST" action="{{ route('addDepartment') }}">
                        {{ csrf_field() }}

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Department Name</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-primary" id="fac_id" type="text" name="departmentName" value="{{ old('departmentName') }}"
                                               required autofocus>
                                    </div>
                                    @if ($errors->has('departmentName'))
                                        <p class="help is-danger">
                                            {{ $errors->first('departmentName') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Add Department</button>
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
