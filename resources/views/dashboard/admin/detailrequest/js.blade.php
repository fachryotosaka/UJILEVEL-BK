<script>
//button edit admin event
$('body').on('click', '#btn-detail-request', function () {

var path = "{{ route('findClass') }}";
    $('#classroom').select2({
    dropdownParent: $('#detailrequest'),
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

admin_id = $(this).data('id');

    //fetch detail post with ajax
    $.ajax({
        url: `/admin/${admin_id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response);
            //fill data to form
            $('#title').val(response.data.title);
            $('#description').val(response.data.description);
            $('#').attr('placeholder', 'Empty the form if you want keep the password');
            var newOption = new Option(response.data.classroomName ?? 'Select an class', response.data.classroom_id ?? '', true, true);
            $('#classroom').append(newOption).trigger('change');

            // Set the action flag to edit
            isCreateAction = false;

            //open modal
            $('#detailrequest').modal('show');
        }
    });
});
</script>