<script>

    // Listen for the modal hidden event
    $('#modal-request-schedule').on('hidden.bs.modal', function() {
        // Clear the values in the modal-body
        $('#type').empty();
        $('#title').val('');
        $('#description').val('');
        $('#time').val('');
        $('#date').val('');
        $('#place').val('');
        $('#student').val('').trigger('change'); 
        $('#students').val('').trigger('change'); 
        $('#teacher-name').remove();

        // Set the action flag to create
        isCreateAction = true;
    });

    let role = '{{ Auth::user()->role }}';

    let teacherId = null
    let students_id = [];

    $('#students').on('change', function() {
            students_id = $(this).val();
    });
    //button create post event
    $('body').on('click', '#btn-create-schedule', function () {

        $('#type').on('change', function() {
            var selectedValue = $(this).val();
            
            // Hide all counseling forms
            $('.counselingForm').hide();
            
            // Show the relevant form based on the selected value
            if(role === 'student') {
                switch (selectedValue) {
                    case '1':
                        $('#base-request-form').show();
                        break;
                    case '2':
                        $('#social-request-form').show();
                        $('#base-request-form').show();
                        break;
                    case '3':
                        $('#base-request-form').show();
                        break;
                    case '4':
                        $('#base-request-form').show();
                        break;
                    default:
                        // Handle case when no option is selected or invalid value
                        break;
                }
            } else if(role === 'teacher') {
                switch (selectedValue) {
                    case '1':
                        $('#base-request-form').show();
                        $('#teacher-send-form').show();
                        break;
                    case '2':
                        $('#social-request-form').show();
                        $('#base-request-form').show();
                        break;
                    case '4':
                        $('#base-request-form').show();
                        $('#teacher-send-form').show();
                        break;
                    case '5':
                        $('#base-request-form').show();
                        break;
                    default:
                        // Handle case when no option is selected or invalid value
                        break;
                }
            }
        });

        var servicePath = "{{ route('getCounselingService') }}";
        var findStudent = "{{ route('findStudent') }}";

        if(role === 'student') {
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
        } else {
            $('#student').select2({
                dropdownParent: $('#modal-request-schedule'),
                placeholder: 'Select an student',
                ajax: {
                    url: findStudent,
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
        }
        $.ajax({
            url: servicePath,
            type: "GET",
            cache: false,
            success: function(response){
                var select = $('#type');

                select.append($('<option>').text('Select Counseling Type'));

                // Iterate over the data and create option elements
                $.each(response, function(index, item) {
                    if (role === 'student' && item.id === 5) {
                        // Exclude option value 2 for students
                        return;
                    }
                    if (role === 'teacher' && item.id === 3) {
                        // Exclude option value 5 for teachers
                        return;
                    }

                    var newOption = $('<option>').val(item.id).text(item.name);
                    select.append(newOption);
                });
            },
        });

            $('#students').select2({
                multiple: true,
                dropdownParent: $('#modal-request-schedule'),
                placeholder: 'Select an student',
                ajax: {
                    url: findStudent,
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

        //open modal
        $('#modal-request-schedule').modal('show');
    });

     //action create schedule
     $('#confirm').click(function(e) {
        e.preventDefault();
        //define variable
        let type =$('#type').val();
        let title = $('#title').val();
        let description = $('#description').val();
        let time = $('#time').val();
        let date = $('#date').val();
        let place = $('#place').val();
        let student_id = $('#student').val();

        let token = $("meta[name='csrf-token']").attr("content");
            //ajax
            $.ajax({
            url: "/request-schedule",
            type: "POST",
            data: {
                "service_id": type,
                "title": title,
                "description": description,
                "time": time,
                "date": date,
                "place": place,
                "teacher_id": teacherId,
                "students_id": students_id,
                "student_id": student_id,
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
                    $('#type').empty();
                    $('#title').val('');
                    $('#description').val('');
                    $('#time').val('');
                    $('#date').val('');
                    $('#place').val('');
                    $('#student').val('').trigger('change'); 
                    $('#students').val('').trigger('change'); 
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
                    
                    //clear form
                    $('#type').empty();
                    $('#title').val('');
                    $('#description').val('');
                    $('#time').val('');
                    $('#date').val('');
                    $('#place').val('');
                    $('#student').val('').trigger('change'); 
                    $('#students').val('').trigger('change'); 
                    $('#teacher-name').remove();

                    //close modal
                    $('#modal-request-schedule').modal('hide');
                }
                
            },
            error:function(error){
                // Clear error messages if the fields are not empty
                if ($('#type').val() !== '') {
                    $('#alert-type').removeClass('d-block').addClass('d-none');
                }

                if ($('#title').val() !== '') {
                    $('#alert-title').removeClass('d-block').addClass('d-none');
                }

                if ($('#description').val() !== '') {
                    $('#alert-description').removeClass('d-block').addClass('d-none');
                }

                if ($('#time').val() !== '') {
                    $('#alert-time').removeClass('d-block').addClass('d-none');
                }
                
                if ($('#date').val() !== '') {
                    $('#alert-date').removeClass('d-block').addClass('d-none');
                }

                if ($('#place').val() !== '') {
                    $('#alert-place').removeClass('d-block').addClass('d-none');
                }

                if(error.responseJSON.service_id && error.responseJSON.service_id[0]) {

                    //show alert
                    $('#alert-type').removeClass('d-none');
                    $('#alert-type').addClass('d-block');

                    //add message to alert
                    $('#alert-type').html(error.responseJSON.service_id[0]);
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
                

                if(error.responseJSON.time && error.responseJSON.time[0]) {

                    //show alert
                    $('#alert-time').removeClass('d-none');
                    $('#alert-time').addClass('d-block');

                    //add message to alert
                    $('#alert-time').html(error.responseJSON.time[0]);
                }

                if(error.responseJSON.date && error.responseJSON.date[0]) {

                    //show alert
                    $('#alert-date').removeClass('d-none');
                    $('#alert-date').addClass('d-block');

                    //add message to alert
                    $('#alert-date').html(error.responseJSON.date[0]);
                }

                if(error.responseJSON.place && error.responseJSON.place[0]) {

                    //show alert
                    $('#alert-place').removeClass('d-none');
                    $('#alert-place').addClass('d-block');

                    //add message to alert
                    $('#alert-place').html(error.responseJSON.place[0]);
                }

                
            }
        });
    });
</script>