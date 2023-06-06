<script>

    // Listen for the modal hidden event
    $('#modal-request-schedule').on('hidden.bs.modal', function() {
        // Clear the values in the modal-body
        $('#title').val('');
        $('#description').val('');
        $('#teacher-name').remove();

        // Set the action flag to create
        isCreateAction = true;
    });

    let teacherId = null
    //button create post event
    $('body').on('click', '#btn-create-schedule', function () {
        var path = "{{ route('getTeacher') }}";
        $.ajax({
            url: path,
            type: "GET",
            cache: false,
            success: function(response){
                $('#detail-student').append(
                    `<p id="teacher-name">Teacher : ${response[0].name}</p>`
                );
                teacherId = response[0].id
            },
        });
        //open modal
        $('#modal-request-schedule').modal('show');
    });

     //action create schedule
     $('#confirm').click(function(e) {
        e.preventDefault();
        //define variable
        let title   = $('#title').val();
        let description = $('#description').val();
        let time = $('#time').val();
        let date = $('#date').val();
        let place = $('#place').val();

        let token   = $("meta[name='csrf-token']").attr("content");
            //ajax
            $.ajax({
            url: "/request-schedule",
            type: "POST",
            data: {
                "title": title,
                "description": description,
                "time": time,
                "date": date,
                "place": place,
                "teacher_id": teacherId,
                "_token": token,
            },
            success:function(response){

                if(response.status == 'Already make request') {
                    Swal.fire({
                        icon: 'warning',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    //clear form
                    $('#title').val('');
                    $('#description').val('');
                    $('#teacher-name').remove();

                    //close modal
                    $('#modal-request-schedule').modal('hide');

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    // //data post
                    // let post = `
                    //     <tr id="index_${response.data.id}">
                    //     <th scope="row">New</th>
                    //     <td>${response.data.name}</td>
                    //     <td>${response.data.email}</td>
                    //     <td>${response.data.role}</td>
                    //     <td>${response.data.classroomName}</td>
                    //     <td class="text-center">
                    //         <a href="javascript:void(0)" id="btn-edit-student" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                    //         <a href="javascript:void(0)" id="btn-delete-student" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                    //     </td>
                    //     </tr>
                    // `;
                    
                    // //append to table
                    // $('#table-student').prepend(post);
                    
                    //clear form
                    $('#title').val('');
                    $('#description').val('');
                    $('#teacher-name').remove();

                    //close modal
                    $('#modal-request-schedule').modal('hide');
                }
                
            },
            error:function(error){
                // Clear error messages if the fields are not empty
                if ($('#title').val() !== '') {
                    $('#alert-title').removeClass('d-block').addClass('d-none');
                }

                if ($('#description').val() !== '') {
                    $('#alert-description').removeClass('d-block').addClass('d-none');
                }
                if(error.responseJSON.title && error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-title').removeClass('d-none');
                    $('#alert-title').addClass('d-block');

                    //add message to alert
                    $('#alert-title').html(error.responseJSON.title[0]);
                }

                if(error.responseJSON.description && error.responseJSON.description[0]) {

                    //show alert
                    $('#alert-description').removeClass('d-none');
                    $('#alert-description').addClass('d-block');

                    //add message to alert
                    $('#alert-description').html(error.responseJSON.description[0]);
                }
            }
        });
    });
</script>