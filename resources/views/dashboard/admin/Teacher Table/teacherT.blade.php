@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="card border-0 shadow rounded" id="card-page">
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-teacher">TAMBAH</a>
                <a class="btn btn-success mb-2" style="display: none" id="btn-reset-search">Reset</a>
                <table class="table" id="table-teacher">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Class</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="table-teacher-body">
                      @foreach ($users as $item)
                      <tr id="index_{{ $item->id }}">
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->role }}</td>
                          <td>{{ $item->classroom->name ?? 'No Class' }}</td>
                          <td class="text-center">
                              <a href="javascript:void(0)" id="btn-edit-teacher" data-id="{{ $item->id }}" class="btn btn-primary btn-sm">EDIT</a>
                              <a href="javascript:void(0)" id="btn-delete-teacher" data-id="{{ $item->id }}" class="btn btn-danger btn-sm">DELETE</a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div id="pagination-bar">
              {{ $users->links() }}
            </div>
        </div>
    </div>

    @include('components.modal-teacher')

@endsection
