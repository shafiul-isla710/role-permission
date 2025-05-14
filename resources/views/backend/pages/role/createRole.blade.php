
@extends('backend.layout.app')

@section('content')

  <div class="page-wrapper">
            <div class="page-content">
                <!-- start-content -->

                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Tables</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Create Role</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="roles-index.html" class="btn btn-primary">All Roles</a>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Create Role</h5>
                                <form action="{{ route('roles.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Role Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value=""
                                                placeholder="Enter Your Role Name">
                                               
                                                @error('name')
                                                    
                                                    <span class="invalid-feedback text-red-600" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                
                                                @enderror
                                        </div>

                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="col-sm-9 form-check">

                                            @foreach($permissions as $permission)

                                            <label class="form-check-label">
                                                <input type="checkbox" name="permission[{{ $permission->id }}]" value="{{ $permission->id }}"
                                                    class="form-check-input">
                                                {{ $permission->name }}
                                            </label>
                                            <br />

                                            @endforeach

                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="submit" class="btn btn-primary px-4">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- end-content -->
            </div>
        </div>
    
@endsection