<!-- Modal -->
<div class="modal fade" id="modal-student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" id="email">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                </div>

                <div class="form-group">
                    <label for="classroom" class="control-label">Class</label>
                    <select id="classroom" name="classroom">
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-classroom"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="confirm">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

@include('dashboard.shared.Student Table.js')