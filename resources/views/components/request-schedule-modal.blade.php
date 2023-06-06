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
                    <label for="title" class="control-label">Title</label>
                    <input type="text" class="form-control" id="title">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea id="description" class="form-control" rows="5"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-description"></div>
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