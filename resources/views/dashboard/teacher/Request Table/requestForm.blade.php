@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex">
            <img style="height: 100px" src="{{ $student->profile_photo_url }}">
            <div id="detail-student">
                <p>Name : {{ $student->name }}</p>
                <p>Class : {{ $student->classroom->name }}</p>
            </div>
        </div>
        <div>
            <p>{{ $consultation->title }}</p>
            <p>{{ $consultation->description }}</p>
            <p>{{ $consultation->place }}</p>
            <p>{{ $consultation->time }}</p>
            <p>{{ $consultation->date }}</p>
        </div>

        <div id="action-full">
            <a href="javascript:void(0)" id="btn-accept-request" class="btn btn-primary btn-sm">Accept</a>
            <a href="javascript:void(0)" id="btn-decline-request" class="btn btn-danger btn-sm">Revised</a>
        </div>

        <div id="decline-form"  style="display: none">
            <div class="form-group">
                <label for="reason" class="control-label">Reason</label>
                <textarea id="reason" class="form-control" rows="5"></textarea>
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-reason"></div>
            </div>
            <div class="form-group" >
                <label for="time" class="control-label">Time</label>
                <input type="time" class="form-control" id="time" value="{{ $consultation->time }}">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-time"></div>
            </div>
            <div class="form-group" >
                <label for="date" class="control-label">Date</label>
                <input type="date" class="form-control" id="date" value="{{ $consultation->date }}">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-date"></div>
            </div>
            <div class="form-group" >
                <label for="place" class="control-label">Place</label>
                <input type="place" class="form-control" id="place" value="{{ $consultation->place }}">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-place"></div>
            </div>
            <div>
                <button type="button" class="btn btn-primary" id="confirm-revised">Kirim</button>
            </div>
        </div>
    </div>

    @include('dashboard.teacher.Request Table.requestFormJS')

@endsection