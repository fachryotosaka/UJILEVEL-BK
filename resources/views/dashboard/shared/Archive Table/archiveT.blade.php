@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="card border-0 shadow rounded" id="card-page">
            <div class="card-body">
                <table class="table" id="table-teacher">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">consultation Type</th>
                        <th scope="col">Status</th>
                        @if (Auth::user()->role === 'teacher')
                          <th scope="col">Student</th>
                        @elseif(Auth::user()->role === 'student')
                          <th scope="col">Teacher</th>
                        @endif
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="table-teacher-body">
                      @foreach ($consultations as $consultation)
                      <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $consultation->title }}</td>
                          <td>{{ $consultation->description }}</td>
                          <td>{{ $consultation->service_name }}</td>
                          <td>{{ $consultation->status }}</td>
                          @if (Auth::user()->role === 'teacher')
                          <td>
                            @foreach ($groupedConsultations[$consultation->id] as $item)
                                {{ $item }} <br>
                            @endforeach
                          </td>
                          @elseif(Auth::user()->role === 'student')
                            <td>{{ $consultation->teacher_name}}</td>
                          @endif
                          {{-- <td class="text-center">
                              <a href="javascript:void(0)" id="btn-edit-teacher" data-id="{{ $item->id }}" class="btn btn-primary btn-sm">EDIT</a>
                              <a href="javascript:void(0)" id="btn-delete-teacher" data-id="{{ $item->id }}" class="btn btn-danger btn-sm">DELETE</a>
                          </td> --}}
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            {{-- <div id="pagination-bar">
              {{ $users->links() }}
            </div> --}}
        </div>
    </div>
@endsection
