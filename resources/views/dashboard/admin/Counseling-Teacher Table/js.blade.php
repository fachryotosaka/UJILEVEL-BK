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
                            <tr class="font-medium text-[13px] text-header text-left m-0" id="index_${response.data.id}">
                            <td>${response.data.name}</td>
                            <td>${response.data.email}</td>
                            <td>${response.data.role}</td>
                            <td>${response.data.classroomName}</td>
                            <td class="p-3 py-[10px] px-0 flex items-center gap-2 w-fit">
                                
                                <button id="btn-delete-teacher" data-id="{{ $item->id }}" class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                    <svg width="13" height="16" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path  d="M14.4279 4.21598C14.4125 4.21598 14.3895 4.21598 14.3664 4.21598C10.2966 3.80823 6.23444 3.65436 2.21076 4.06211L0.641306 4.21598C0.318183 4.24675 0.0335261 4.01595 0.00275246 3.69282C-0.0280212 3.3697 0.202781 3.09274 0.518212 3.06196L2.08767 2.9081C6.18059 2.49265 10.3273 2.65421 14.4818 3.06196C14.7972 3.09274 15.028 3.37739 14.9972 3.69282C14.9742 3.99287 14.7203 4.21598 14.4279 4.21598Z" fill="#F24040"/>
                                        <path d="M4.81195 3.43896C4.78118 3.43896 4.75041 3.43896 4.71194 3.43126C4.4042 3.37741 4.18879 3.07737 4.24264 2.76963L4.41189 1.76179C4.53499 1.02322 4.70424 0 6.49678 0H8.51246C10.3127 0 10.482 1.06169 10.5974 1.76949L10.7666 2.76963C10.8205 3.08506 10.6051 3.3851 10.2973 3.43126C9.9819 3.48512 9.68186 3.2697 9.6357 2.96197L9.46644 1.96182C9.35873 1.29249 9.33565 1.16171 8.52015 1.16171H6.50447C5.689 1.16171 5.67362 1.26941 5.55821 1.95413L5.38127 2.95427C5.3351 3.23893 5.08892 3.43896 4.81195 3.43896Z" fill="#F24040"/>
                                        <path d="M9.9741 16.5409H5.03492C2.34991 16.5409 2.24221 15.0561 2.15758 13.8559L1.65751 6.10862C1.63443 5.79319 1.88061 5.51624 2.19604 5.49316C2.51917 5.47777 2.78844 5.71627 2.81152 6.0317L3.31159 13.779C3.39622 14.9484 3.42699 15.3869 5.03492 15.3869H9.9741C11.5897 15.3869 11.6205 14.9484 11.6974 13.779L12.1975 6.0317C12.2206 5.71627 12.4975 5.47777 12.813 5.49316C13.1284 5.51624 13.3746 5.7855 13.3515 6.10862L12.8514 13.8559C12.7668 15.0561 12.6591 16.5409 9.9741 16.5409Z" fill="#F24040"/>
                                        <path d="M8.78126 12.3095H6.21936C5.90391 12.3095 5.64233 12.0479 5.64233 11.7325C5.64233 11.417 5.90391 11.1555 6.21936 11.1555H8.78126C9.09669 11.1555 9.35827 11.417 9.35827 11.7325C9.35827 12.0479 9.09669 12.3095 8.78126 12.3095Z" fill="#F24040"/>
                                        <path d="M9.42738 9.2321H5.58067C5.26524 9.2321 5.00366 8.97052 5.00366 8.65509C5.00366 8.33966 5.26524 8.07809 5.58067 8.07809H9.42738C9.74281 8.07809 10.0044 8.33966 10.0044 8.65509C10.0044 8.97052 9.74281 9.2321 9.42738 9.2321Z" fill="#F24040"/>
                                        </svg>                                
                                        </button>

                                <a href="javascript:void(0)" id="btn-edit-teacher" data-id="{{ $item->id }}" class="cursor-pointer w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100">
                                    <svg width="14" height="14" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.48188 15.0003H5.34433C1.59985 15.0003 0 13.4004 0 9.65596V5.51841C0 1.77393 1.59985 0.17408 5.34433 0.17408H6.72352C7.00625 0.17408 7.24071 0.408541 7.24071 0.691274C7.24071 0.974006 7.00625 1.20847 6.72352 1.20847H5.34433C2.16532 1.20847 1.03439 2.3394 1.03439 5.51841V9.65596C1.03439 12.835 2.16532 13.9659 5.34433 13.9659H9.48188C12.6609 13.9659 13.7918 12.835 13.7918 9.65596V8.27678C13.7918 7.99405 14.0263 7.75959 14.309 7.75959C14.5918 7.75959 14.8262 7.99405 14.8262 8.27678V9.65596C14.8262 13.4004 13.2264 15.0003 9.48188 15.0003Z" fill="#DBC022"/>
                                        <path d="M4.99902 11.511C4.57837 11.511 4.1922 11.3593 3.90947 11.0835C3.57157 10.7456 3.42675 10.256 3.50261 9.73878L3.79913 7.66311C3.8543 7.26315 4.11635 6.74596 4.39908 6.46322L9.83302 1.02922C11.2053 -0.343072 12.5983 -0.343072 13.9706 1.02922C14.7222 1.78087 15.0601 2.54632 14.9912 3.31176C14.9291 3.9324 14.5981 4.53924 13.9706 5.15987L8.53659 10.5939C8.25386 10.8766 7.73667 11.1387 7.3367 11.1938L5.26107 11.4903C5.17142 11.511 5.08177 11.511 4.99902 11.511ZM10.564 1.76018L5.13005 7.19419C4.99902 7.32521 4.84731 7.62863 4.81973 7.80793L4.5232 9.8836C4.49562 10.0836 4.537 10.2491 4.64043 10.3525C4.74387 10.456 4.90938 10.4973 5.10936 10.4698L7.18499 10.1732C7.36429 10.1456 7.6746 9.99393 7.79873 9.86291L13.2327 4.4289C13.6809 3.98067 13.9154 3.5807 13.9499 3.20832C13.9913 2.76009 13.7568 2.28427 13.2327 1.75329C12.1294 0.64994 11.3708 0.960257 10.564 1.76018Z" fill="#DBC022"/>
                                        <path d="M12.8261 6.09062C12.7778 6.09062 12.7295 6.08372 12.6882 6.06993C10.8745 5.55964 9.43329 4.11839 8.92299 2.30476C8.84713 2.02893 9.00574 1.74619 9.28158 1.66344C9.55741 1.58759 9.84014 1.74619 9.916 2.02203C10.3298 3.49086 11.4952 4.65627 12.964 5.07003C13.2398 5.14588 13.3984 5.43551 13.3226 5.71135C13.2605 5.94581 13.0536 6.09062 12.8261 6.09062Z" fill="#DBC022"/>
                                    </svg>                                                        
                                </a>
                            <button id="btn-delete-teacher" data-id="{{ $item->id }}" class="w-9 h-9 flex justify-center items-center border border-footer border-opacity-70 rounded-lg hover:scale-95 transition-all ease-in-out duration-200 hover:border-opacity-100 group/hover">
                              <svg width="16" height="14" class="opacity-60 group-hover/hover:opacity-100 transition-all ease-linear duration-150" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M11.2441 7.34646C11.2441 8.86409 10.0177 10.0905 8.50006 10.0905C6.98244 10.0905 5.7561 8.86409 5.7561 7.34646C5.7561 5.82884 6.98244 4.6025 8.50006 4.6025C10.0177 4.6025 11.2441 5.82884 11.2441 7.34646Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M8.50001 13.6852C11.2057 13.6852 13.7274 12.091 15.4826 9.33164C16.1725 8.25091 16.1725 6.43435 15.4826 5.3536C13.7274 2.59427 11.2057 1 8.50001 1C5.79432 1 3.27261 2.59427 1.51737 5.3536C0.827542 6.43435 0.827542 8.25091 1.51737 9.33164C3.27261 12.091 5.79432 13.6852 8.50001 13.6852Z" stroke="#676767" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>                                                            
                          </button>
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