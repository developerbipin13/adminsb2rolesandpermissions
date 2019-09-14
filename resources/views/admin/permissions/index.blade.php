@extends('layouts.admin')
@section('content')
<div class="container">
	<!-- DataTales Example -->
          <div class="card shadow mb-4">
          	<div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">List of Permissions</h6>
            </div>
            <div class="card-header py-3">
             <a href="{{ route('permissions.create') }}" class="btn btn-success">Add New</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Permission Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach($permissions as $permission)
                      <td>{{ $permission->name }}</td>
                      <td>
                        <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form style="display: inline-block;" action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
                          @csrf
                          @method('Delete')
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