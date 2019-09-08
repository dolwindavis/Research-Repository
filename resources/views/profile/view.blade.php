@extends('layouts.app')

@section('content')
<body>

  <div class='columns'>
  <div class='container profile'>
    @if(Auth::user() && Auth::user()->id == $user->id)
  <form action="{{url('/profile/update')}}" method="POST">
  @csrf
    <div class='modal' id='edit-preferences-modal'>
      <div class='modal-background'></div>
      <div class='modal-card'>
        <header class='modal-card-head'>
          <p class='modal-card-title'>Edit Profile</p>
          <button class='delete'></button>
        </header> 
        <section class='modal-card-body'>
          <label class='label'>Name</label>
          <p class='control'>
            <input class='input' placeholder='Text input' type='text' value='{{Auth::user()->name}}' name=name >
          </p>
          <label class='label'>Faculty ID</label>
          <p class='control has-icon has-icon-right'>
            <input class='input' placeholder='Text input' type='text' value='{{Auth::user()->fac_id}}' name="facultyid">
          </p>
          <label class='label'>Email</label>
          <p class='control has-icon has-icon-right'>
            <input class='input' placeholder='Email input' type='text' value='{{Auth::user()->email}}' name="email">
            <!-- <i class='fa fa-warning'></i>
            <span class='help is-danger'>This email is invalid</span> -->
          </p>
          <div class='control'>
           
              <label class='label'>Departement</label>
            
            <span>
              <!-- <span class='select'>
                <select>
                  <option>Month</option>
                  <option>With options</option>
                </select>
              </span>
              <span class='select'>
                <select>
                  <option>Day</option>
                  <option>With options</option>
                </select>
              </span> -->
              <span class='select'>
                <select name ="department">
                @foreach ($departments as $department)
                    @if($department->id == Auth::User()->department)
                      <option value="{{$department->id}}" selected>{{$department->name}}</option>
                    @else
                      <option value="{{$department->id}}">{{$department->name}}</option>
                    @endif
                @endforeach
                </select>
              </span>
            </span>
          </div>
          <label class='label'>Password Needed For Profile Update </label>
          <p class='control has-icon has-icon-right'>
            <input class='input' placeholder='Old Password' type='password' name="password" required>
          </p>
          <!-- <label class='label'>Description</label>
          <p class='control'>
            <textarea class='textarea' placeholder='Describe Yourself!'></textarea>
          </p> -->
          <!-- <div class='content'>
            <h1>Optional Information</h1>
          </div>
          <label class='label'>Phone Number</label>
          <p class='control has-icon has-icon-right'>
            <input class='input' placeholder='Text input' type='text' value='+1 *** *** 0535'>
          </p>
          <label class='label'>Work</label>
          <p class='control has-icon has-icon-right'>
            <input class='input' placeholder='Text input' type='text' value='Greater Washington Publishing'>
          </p>
          <label class='label'>School</label>
          <p class='control has-icon has-icon-right'>
            <input class='input' placeholder='Text input' type='text' value='George Mason University'>
          </p> -->
        </section>
        <footer class='modal-card-foot'>
          <input type="submit" class='button is-primary modal-save'>
          <button class='button modal-cancel'>Cancel</button>
        </footer>
      </div>
    </div>
</form>
@endif
    <div class='section profile-heading'>
      <div class='columns is-mobile is-multiline'>
        <div class='column is-2'>
          <span class='header-icon user-profile-image'>   
                <img alt=''src="https://ui-avatars.com/api/?name={{ $user->name }}&size=300">
          </span>
        </div>
        <div class='column is-4-tablet is-10-mobile name'>
          <p>
            <span class='title is-bold'>{{ ucwords($user->name) }}</span>
            @if(Auth::user() && Auth::user()->id == $user->id )
            <br>
            <a class='button is-primary is-outlined' href='#' id='edit-preferences' style='margin: 5px 0'>
              Edit Details
            </a>
            <br>
            @endif
          </p>
          <!-- <p class='tagline'>
            The users profile bio would go here, of course. It could be two lines or more or whatever. We should probably limit the amount of characters to ~500 at most though.
          </p> -->
        </div>
        
        <div class='column is-2-tablet is-4-mobile has-text-centered'>
          <p class='stat-val'>{{ $repositorycount[1] }}</p>
          <p class='stat-key'>Books</p>
        </div>
        <div class='column is-2-tablet is-4-mobile has-text-centered'>
          <p class='stat-val'>{{ $repositorycount[0] }}</p>
          <p class='stat-key'>Journals</p>
        </div>
        <div class='column is-2-tablet is-4-mobile has-text-centered'>
          <p class='stat-val'>{{ $repositorycount[2] }}</p>
          <p class='stat-key'>Projects</p>
        </div>
      </div>
    </div>
    <div class='profile-options is-fullwidth'>
      <div class='tabs is-fullwidth is-medium'>
        <ul>
        <li class='link'>
            <a href="{{url('/profile/'.$slug) }}">
              <span class='icon'>
                <i class='fa fa-list'></i>
              </span>
              <span>All</span>
            </a>
          </li>
          <li class='link'>
            <a href="{{url('/profile/'.$slug.'?category=books') }}">
              <span class='icon'>
              <i class="fas fa-book-open"></i>
                <!-- <i class='fa fa-list'></i> -->
              </span>
              <span>BOOKS</span>
            </a>
          </li>
          <li class='link'>
            <a href="{{url('/profile/'.$slug.'?category=journals') }}" >
              <span class='icon'>
              <i class="far fa-newspaper"></i>
              </span>
              <span>JOURNALS</span>
            </a>
          </li>
          <li class='link'>
          <a href="{{url('/profile/'.$slug.'?category=research') }}" > 
              <span class='icon'>
                <i class='fa fa-search'></i>
              </span>
              <span>RESEARCH PROJECTS</span>
            </a>
          </li>
          <!-- <li class='link'>
            <a>Auth::user()
              <span class='icon'>
                <i class='fa fa-balance-scale'></i>
              </span>
              <span>Compare</span>
            </a>
          </li> -->
        </ul>
      </div>
    </div>


    <!-- table Creation -->
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>SI NO</th>
                <th>Category</th>
                <th>Published Date</th>
                <th>Title</th>
                <th>Authorship</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repository as $repo)
              <tr> 
                  <th>1</th>
                  <th>{{$repo->repositorycategory}}</th>
                  <th>{{$repo->publishdate}}</th>
                  <th><a href="{{url('/repository/'.$repo->repositorycategory.'/'.$repo->slug)}}">{{$repo->title }}</a></th>
                  <th>{{ $repo->authorships->name }}</th>
                  </a>
              </tr>
            @endforeach
        </tbody>
    </table>




    <!-- Search is  commented -->
    <!-- <div class='box' style='border-radius: 0px;'> -->
      <!-- Main container -->
    <!-- 
      <div class='columns'>
        <div class='column is-2-tablet user-property-count has-text-centered'>
          <p class='subtitle is-5'>
            <strong></strong>
            123
            <br>
            properties
          </p>
        </div>
        <div class='column is-8'>
          <p class='control has-addons'>
            <input class='input' placeholder='Search your liked properties' style='width: 100% !important' type='text'>
            <button class='button'>
              Search
            </button>
          </p>
        </div>
      </div>
    </div> -->
    <!-- <div class='columns is-mobile'>
      <div class='column is-3-tablet is-6-mobile'>
        <div class='card'>
          <div class='card-image'>
            <figure class='image is-4by3'>
              <img alt='' src='http://placehold.it/300x225'>
            </figure>
          </div>
          <div class='card-content'>
            <div class='content'>
              <span class='tag is-dark subtitle'>#1</span>
              <p>Personal Notes on the Property (can be edited and saved automatically by clicking in and clicking out of text area) - these are unique to the user - they will show up as part of a saved listings' info here - but adding notes to a property does not automatically create a saved listing. Likewise, removing this proeprty from saved listings does not auto remove the notes.</p>
            </div>
          </div>
          <footer class='card-footer'>
            <a class='card-footer-item'>Compare</a>
            <a class='card-footer-item'>Share</a>
            <a class='card-footer-item'>Delete</a>
          </footer>
        </div>
        <br>
      </div>
      <div class='column is-3-tablet is-6-mobile'>
        <div class='card'>
          <div class='card-image'>
            <figure class='image is-4by3'>
              <img alt='' src='http://placehold.it/300x225'>
            </figure>
          </div>
          <div class='card-content'>
            <div class='content'>
              <span class='tag is-dark subtitle'>#2</span>
              <p>Personal Notes on the Property (can be edited and saved automatically by clicking in and clicking out of text area) - these are unique to the user - they will show up as part of a saved listings' info here - but adding notes to a property does not automatically create a saved listing. Likewise, removing this proeprty from saved listings does not auto remove the notes.</p>
            </div>
          </div>
          <footer class='card-footer'>
            <a class='card-footer-item'>Compare</a>
            <a class='card-footer-item'>Share</a>
            <a class='card-footer-item'>Delete</a>
          </footer>
        </div>
        <br>
      </div>
      <div class='column is-3'>
        <div class='card'>
          <div class='card-image'>
            <figure class='image is-4by3'>
              <img alt='' src='http://placehold.it/300x225'>
            </figure>
          </div>
          <div class='card-content'>
            <div class='content'>
              <span class='tag is-dark subtitle'>#3</span>
              <p>Personal Notes on the Property (can be edited and saved automatically by clicking in and clicking out of text area) - these are unique to the user - they will show up as part of a saved listings' info here - but adding notes to a property does not automatically create a saved listing. Likewise, removing this proeprty from saved listings does not auto remove the notes.</p>
            </div>
          </div>
          <footer class='card-footer'>
            <a class='card-footer-item'>Compare</a>
            <a class='card-footer-item'>Share</a>
            <a class='card-footer-item'>Delete</a>
          </footer>
        </div>
        <br>
      </div>
      <div class='column is-3'>
        <div class='card'>
          <div class='card-image'>
            <figure class='image is-4by3'>
              <img alt='' src='http://placehold.it/300x225'>
            </figure>
          </div>
          <div class='card-content'>
            <div class='content'>
              <span class='tag is-dark subtitle'>#4</span>
              <p>Personal Notes on the Property (can be edited and saved automatically by clicking in and clicking out of text area) - these are unique to the user - they will show up as part of a saved listings' info here - but adding notes to a property does not automatically create a saved listing. Likewise, removing this proeprty from saved listings does not auto remove the notes.</p>
            </div>
          </div>
          <footer class='card-footer'>
            <a class='card-footer-item'>Compare</a>
            <a class='card-footer-item'>Share</a>
            <a class='card-footer-item'>Delete</a>
          </footer>
        </div>
        <br>
      </div>
    </div> -->
  </div>
</div>
</body>
@endsection