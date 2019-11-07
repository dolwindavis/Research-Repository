<div class="row">
    @foreach($data['journalcategories'] as $key => $journalcat)
    <div class="col-md-4">
        <div class="modal fade" id="journal-category{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <big><b>Edit Journal Category</b></big>
                            </div>
                            <form role="form" method="post" action="{{url('/admin/journalcategory/'.$journalcat->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control"  type="text"
                                            name="name" value="{{ $journalcat->name }}" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($data['journaltype'] as $key => $journalcat)
    <div class="col-md-4">
        <div class="modal fade" id="journal-type{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <big><b>Edit Journal Type</b></big>
                            </div>
                            <form role="form" method="Post" action="{{url('/admin/journaltype/'.$journalcat->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Journal Type" type="text" name="name" value="{{$journalcat->name}}" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($data['authorship'] as $key => $journalcat)
    <div class="col-md-4">
        <div class="modal fade" id="authorship{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <big><b>Edit Authorship</b></big>
                            </div>
                            <form role="form" method="Post" action="{{url('/admin/authorship/'.$journalcat->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Authorship" type="text" value="{{$journalcat->name}}" name="name"
                                            required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($data['researchcategory'] as $key => $research)
    <div class="col-md-4">
        <div class="modal fade" id="researchcategory{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <big><b>Edit Research Category</b></big>
                            </div>
                            <form role="form" method="Post" action="{{url('/admin/researchcategory/'.$research->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Research Category" type="text" value="{{$research->name}}"
                                            name="name" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($data['researchagency'] as $key => $research)
    <div class="col-md-4">
        <div class="modal fade" id="researchagency{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <big><b>Edit Research Agency</b></big>
                            </div>
                            <form role="form" method="Post" action="{{url('/admin/researchagency/'.$research->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Research Category" type="text"
                                            name="name" value="{{$research->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <select id="faculty" class="form-control" name="category_id">
                                            @foreach($data['researchcategory'] as $res)
                                                @if($research->category_id == $res->id)
                                                <option value="{{ $res->id }}" selected> {{ $res->name }} </option>
                                                @else                                       
                                                <option value="{{ $res->id }}"> {{ $res->name }} </option> 
                                                @endif                          
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($data['researchroles'] as $key => $research)
    <div class="col-md-4">
        <div class="modal fade" id="researchrole{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <big><b>Edit Research Roles</b></big>
                            </div>
                            <form role="form" method="Post" action="{{url('/admin/researchroles/'.$research->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Research Role" type="text" value="{{$research->name}}"
                                            name="name" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($data['departments'] as $key => $dep)
    <div class="col-md-4">
        <div class="modal fade" id="department{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <big><b>Edit Department</b></big>
                            </div>
                            <form role="form" method="Post" action="{{url('/admin/department/'.$dep->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Department" type="text" value="{{$dep->name}}"
                                            name="name" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
