@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Edit Permission</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('permissions.index') }}" class="btn btn-outline-primary btn-sm mb-0">
                                see all permission
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('permissions.update', $permission) }}" method="POST" role="form text-left">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="text" name="name"
                                value="{{ $permission->name ? $permission->name : old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
