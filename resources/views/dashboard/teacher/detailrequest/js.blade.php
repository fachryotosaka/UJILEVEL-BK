<script>

let consultation_id = null;
//button edit admin event
$('body').on('click', '#btn-detail-request', function () {

    consultation_id = $(this).data('id');

    $('#result-form').attr({
        href: `/finish-request/${consultation_id}`
    })

    //fetch detail post with ajax
    $.ajax({
        url: `/request-form/${consultation_id}`,
        headers: {'Accept': 'application/json'},
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response);

            let formattedTime = new Date('1970-01-01T' + response.consultation.time).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true  });
            let formattedDate = new Date(response.consultation.date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

            $('#title-consultation').text(response.consultation.title)
            $('#description-consultation').text(response.consultation.description)
            $('#time-consultation').text(formattedTime)
            $('#date-consultation').text(formattedDate)
            $('#place-consultation').text(response.consultation.place)
            $('#status-consultation').text(response.consultation.status)
            $('#class-consultation').text(response.classroom_name)
            if (response.students.length === 0) {
                $('#name-consultation').append('All classes');
            } else {
                response.students.forEach(function(student) {
                    $('#name-consultation').append(student.name + '<br>');
                });
            }

            //open modal
            $('#detailrequest').modal('show');
        }
    });
});
</script>