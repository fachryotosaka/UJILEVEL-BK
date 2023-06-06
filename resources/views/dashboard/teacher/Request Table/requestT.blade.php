@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="card border-0 shadow rounded" id="card-page">
            <div class="card-body">
                <table class="table" id="table-request">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Student</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="table-request-body">
                      @foreach ($consultations as $consultation)
                      <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $consultation->title }}</td>
                          <td>{{ $consultation->description }}</td>
                          <td>{{ $consultation->status }}</td>
                          <td>{{ $consultation->student_name}}</td>
                          @if ($consultation->status === 'approve')
                            <td class="text-center">
                              <a href="#" id="btn-view-request" class="btn btn-primary btn-sm">View</a>
                            </td>
                          @else
                            <td class="text-center">
                                <a href="{{ Route('request-form', $consultation->id) }}" id="btn-accept-request" class="btn btn-primary btn-sm">View</a>
                            </td>
                          @endif
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
