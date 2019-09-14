@extends('layouts.admin')
@section('content')
<div class="container">
  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">List of Roles</h6>
            </div>
            <div class="card-header py-3">
             <a href="{{ route('roles.create') }}" class="btn btn-success">Add New</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Permissions</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach($roles as $role)
                      <td>{{ $role->name }}</td>
                      <td>
                        @foreach($role->permissions as $permission)
                        {{ $permission->name }} ,
                        @endforeach
                      </td>
                      <td>
                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form style="display: inline-block;" method="POST" action="{{ route('roles.destroy',$role->id) }}">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger" type="submit">
                            Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
@endsection