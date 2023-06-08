<script>
    // Define a flag to track the action (create or update)
    let isCreateAction = true;
    let teacher_id = null;

    // Listen for the modal hidden event
    $('#modal-teacher').on('hidden.bs.modal', function() {
        // Clear the values in the modal-body
        $('#name').val('');
        $('#email').val('');
        $('#password').val('');
        $('#password').attr('placeholder', '');
        $('#classroom').val('').trigger('change'); 

        // Set the action flag to create
        isCreateAction = true;
    });

    //Create function js
    
    //button create post event
    $('body').on('click', '#btn-create-teacher', function () {

        var path = "{{ route('findClass') }}";
            $('#classroom').select2({
            dropdownParent: $('#modal-teacher'),
            placeholder: 'Select an class',
            ajax: {
                url: path,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
                },
                cache: true
            }
        }); 

        // Set the action flag to create
        isCreateAction = true;

        //open modal
        $('#modal-teacher').modal('show');
    });

    //update function js

     //button edit teacher event
    $('body').on('click', '#btn-edit-teacher', function () {

    var path = "{{ route('findClass') }}";
        $('#classroom').select2({
        dropdownParent: $('#modal-teacher'),
        placeholder: 'Select an class',
        ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
            return {
                results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
            },
            cache: true
        }
    }); 

    teacher_id = $(this).data('id');

        //fetch detail post with ajax
        $.ajax({
            url: `/counseling-teacher/${teacher_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                //fill data to form
                $('#name').val(response.data.name);
                $('#email').val(response.data.email);
                $('#password').attr('placeholder', 'Empty the form if you want keep the password');
                var newOption = new Option(response.data.classroomName ?? 'Select an class', response.data.classroom_id ?? '', true, true);
                $('#classroom').append(newOption).trigger('change');

                // Set the action flag to edit
                isCreateAction = false;

                //open modal
                $('#modal-teacher').modal('show');
            }
        });
    });

        //action create teacher
        $('#confirm').click(function(e) {
            e.preventDefault();
            //define variable
            let name   = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let classroom = $('#classroom').val();

            let token   = $("meta[name='csrf-token']").attr("content");

            if (isCreateAction) {
                //ajax
                $.ajax({
                url: "/counseling-teacher",
                type: "POST",
                data: {
                    "name": name,
                    "email": email,
                    "password": password,
                    "classroom_id": classroom,
                    "_token": token,
                },
                success:function(response){

                    console.log(response.data);

                    if(response.status == 'Classroom is occupied') {
                        //show success message
                        Swal.fire({
                            icon: 'warning',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        //data post
                        let post = `
                            <tr id="index_${response.data.id}">
                            <th scope="row">New</th>
                            <td>${response.data.name}</td>
                            <td>${response.data.email}</td>
                            <td>${response.data.role}</td>
                            <td>${response.data.classroomName}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)" id="btn-edit-teacher" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                                <a href="javascript:void(0)" id="btn-delete-teacher" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                            </td>
                            </tr>
                        `;
                        
                        //append to table
                        $('#table-teacher').prepend(post);
                        
                        //clear form
                        $('#name').val('');
                        $('#email').val('');
                        $('#password').val('');
                        $('#classroom').val('');
        
                        //close modal
                        $('#modal-teacher').modal('hide');
                    }
                },
                error:function(error){
                    // Clear error messages if the fields are not empty
                    if ($('#name').val() !== '') {
                        $('#alert-name').removeClass('d-block').addClass('d-none');
                    }

                    if ($('#email').val() !== '') {
                        $('#alert-email').removeClass('d-block').addClass('d-none');
                    }

                    if ($('#password').val() !== '') {
                        $('#alert-password').removeClass('d-block').addClass('d-none');
                    }

                    if ($('#classroom').val() !== '') {
                        $('#alert-classroom').removeClass('d-block').addClass('d-none');
                    }
                    
                    if(error.responseJSON.name && error.responseJSON.name[0]) {

                        //show alert
                        $('#alert-name').removeClass('d-none');
                        $('#alert-name').addClass('d-block');

                        //add message to alert
                        $('#alert-name').html(error.responseJSON.name[0]);
                    }

                    if(error.responseJSON.email && error.responseJSON.email[0]) {

                        //show alert
                        $('#alert-email').removeClass('d-none');
                        $('#alert-email').addClass('d-block');

                        //add message to alert
                        $('#alert-email').html(error.responseJSON.email[0]);
                    }
                    
                    if(error.responseJSON.password && error.responseJSON.password[0]) {

                        //show alert
                        $('#alert-password').removeClass('d-none');
                        $('#alert-password').addClass('d-block');

                        //add message to alert
                        $('#alert-password').html(error.responseJSON.password[0]);
                    }
                    
                    if(error.responseJSON.classroom_id && error.responseJSON.classroom_id[0]) {

                        //show alert
                        $('#alert-classroom').removeClass('d-none');
                        $('#alert-classroom').addClass('d-block');

                        //add message to alert
                        $('#alert-classroom').html(error.responseJSON.classroom_id[0]);
                    }
                }
            });
            } else {
                $.ajax({
                    url: `/counseling-teacher/${teacher_id}`,
                    type: "PUT",
                    cache: false,
                    data: {
                        "name": name,
                        "email": email,
                        "password": password,
                        "classroom_id": classroom,
                        "_token": token,
                    },
                    success:function(response){

                        if(response.status == 'Classroom is occupied') {
                        //show success message
                        Swal.fire({
                            icon: 'warning',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    } else {
                        //show success message
                        Swal.fire({
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //data post
                        let post = `
                            <tr id="index_${response.data.id}">
                                <th scope="row">New</th>
                                <td>${response.data.name}</td>
                                <td>${response.data.email}</td>
                                <td>${response.data.role}</td>
                                <td>${response.data.classroomName}</td>
                                <td class="text-center">
                                <a href="javascript:void(0)" id="btn-edit-teacher" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                                <a href="javascript:void(0)" id="btn-delete-teacher" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                                </td>
                            </tr>
                        `;
                        
                        //append to post data
                        $(`#index_${response.data.id}`).replaceWith(post);

                        //close modal
                        $('#modal-teacher').modal('hide');
                    }
                    },
                    error:function(error){
                        // Clear error messages if the fields are not empty
                        if ($('#name').val() !== '') {
                            $('#alert-name').removeClass('d-block').addClass('d-none');
                        }

                        if ($('#email').val() !== '') {
                            $('#alert-email').removeClass('d-block').addClass('d-none');
                        }

                        if ($('#classroom').val() !== '') {
                            $('#alert-classroom').removeClass('d-block').addClass('d-none');
                        }

                        if(error.responseJSON.name && error.responseJSON.name[0]) {

                            //show alert
                            $('#alert-name').removeClass('d-none');
                            $('#alert-name').addClass('d-block');

                            //add message to alert
                            $('#alert-name').html(error.responseJSON.name[0]);
                        }

                        if(error.responseJSON.email && error.responseJSON.email[0]) {

                            //show alert
                            $('#alert-email').removeClass('d-none');
                            $('#alert-email').addClass('d-block');

                            //add message to alert
                            $('#alert-email').html(error.responseJSON.email[0]);
                        }

                        if(error.responseJSON.password && error.responseJSON.password[0]) {
                            //show alert
                            $('#alert-password').removeClass('d-none');
                            $('#alert-password').addClass('d-block');

                            //add message to alert
                            $('#alert-password').html(error.responseJSON.password[0]);
                        }

                        if(error.responseJSON.classroom_id && error.responseJSON.classroom_id[0]) {

                            //show alert
                            $('#alert-classroom').removeClass('d-none');
                            $('#alert-classroom').addClass('d-block');

                            //add message to alert
                            $('#alert-classroom').html(error.responseJSON.classroom_id[0]);
                        }
                    }
                });
            }
        });

        //button create post event
        $('body').on('click', '#btn-delete-teacher', function () {

        teacher_id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {

                //fetch to delete data
                $.ajax({

                    url: `/counseling-teacher/${teacher_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove post on table
                        $(`#index_${teacher_id}`).remove();
                    }
                });
            }
        })
        });
    
</script>