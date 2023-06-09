<!-- Modal -->
<div class="modal fade" id="modal-request-schedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group d-flex">
                    <img style="height: 100px" src="{{ Auth::user()->profile_photo_url }}">
                    <div id="detail-student">
                        <p>Name : {{ Auth::user()->name }}</p>
                        <p>Class : {{ Auth::user()->classroom->name }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="type" class="control-label">Counseling Type</label>
                    <select class="custom-select" id="type">
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-type"></div>
                </div>

                @if (Auth::user()->role === 'teacher')
                    <div id="teacher-send-form" class="counselingForm" style="display: none">
                        <div class="form-group">
                            <label for="student" class="control-label">Student</label>
                            <select class="custom-select" id="student">
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-student"></div>
                        </div>
                    </div>
                @endif

                <div id="social-request-form" class="counselingForm" style="display: none">
                    <div class="form-group">
                        <label for="students" class="control-label">Student</label>
                        <select class="custom-select" id="students">
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-students"></div>
                    </div>
                </div>

                <div id="base-request-form" class="counselingForm" style="display: none">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" id="title">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
    
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <textarea id="description" class="form-control" rows="5"></textarea>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-description"></div>
                    </div>
    
                    <div class="form-group" >
                        <label for="time" class="control-label">Time</label>
                        <input type="time" class="form-control" id="time">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-time"></div>
                    </div>
    
                    <div class="form-group" >
                        <label for="date" class="control-label">Date</label>
                        <input type="date" class="form-control" id="date">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-date"></div>
                    </div>
                    
                    <div class="form-group" >
                        <label for="place" class="control-label">Place</label>
                        <input type="place" class="form-control" id="place">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-place"></div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="confirm">Kirim</button>
            </div>
        </div>
    </div>
</div>

@include('dashboard.student.Request Schedule.js')