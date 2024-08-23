@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Permissions Table</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm mb-0">
                                Create Permission
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date Posted</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $permission)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration + ($permissions->currentPage() - 1) * $permissions->perPage() }}
                                        </td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            {{ $permission->created_at }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('permissions.edit', $permission) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center table-danger" colspan="5">
                                            There are no permissions currently.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
