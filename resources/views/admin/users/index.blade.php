@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
            </div>
            <div class="card-header py-3">
             <a href="{{ route('users.create') }}" class="btn btn-success">Add New</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->first_name }}</td>
                      <td>{{ $user->last_name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @foreach($user->roles as $role)
                        {{ $role->name }} ,
                        @endforeach
                      </td>
                      <td>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-primary">Show</a>
                        <form style="display: inline-block;" action="{{ route('users.destroy',$user->id) }}" method="POST">
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