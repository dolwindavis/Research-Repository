@extends('layouts.app')

@section('content')
{{-- <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="#">Home</a></li>
          <li class="is-active"><a href="#" aria-current="page">Dashboard</a></li>
        </ul>
      </nav> --}}
    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-7">
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title is-centered">
                            CHOOSE AN OPTION
                        </p>
                    </header>
                   
                    <div class="card-content">
                            <div class="list is-hoverable">
                                    <a class="list-item ">
                                      PUBLICATIONS
                                      <div class="dropdown is-active">
                                        <div class="dropdown-trigger">
                                          <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                                            <span>Dropdown button</span>
                                            <span class="icon is-small">
                                              <i class="fas fa-angle-down" aria-hidden="true"></i>
                                            </span>
                                          </button>
                                        </div>
                                        <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                          <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                              Dropdown item
                                            </a>
                                            <a class="dropdown-item">
                                              Other dropdown item
                                            </a>
                                            <a href="#" class="dropdown-item is-active">
                                              Active dropdown item
                                            </a>
                                          </div>
                                        </div>
                                      </div>
                                    </a>
                                    <a class="list-item ">
                                      RESEARCH PROJECTS
                                    </a>
                            </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
