<script>
    $(document).ready(function() {

      let consultation_id = "{{ $consultation->id }}"
    
        $('#btn-decline-request').click(function(e) {
            e.preventDefault();
            $('#decline-form').show();

            // Hide the other form
            $('#accept-form').hide();
            $('#btn-accept-request').show();
            $('#btn-decline-request').hide();
        });
    // End Toggle Form

    // Form consultation action

    $('#confirm-revised').click(function(e) {
        e.preventDefault();
        let time = $('#time').val();
        let date = $('#date').val();
        let place = $('#place').val();
        let reason = $('#reason').val();

        let token = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({
            url: `/decline-request/${consultation_id}`,
            type: "POST",
            data: {
                "reason": reason,
                "time": time,
                "date": date,
                "place": place,
                "_token": token,
            },
            success:function(response){
              Swal.fire({
                  icon: 'success',
                  title: `${response.message}`,
                  showConfirmButton: false,
                  timer: 3000
              }).then(function() {
                  window.location.href = "/request-schedule";
              });
            },
            error:function(error){
              
              if ($('#time').val() !== '') {
                $('#alert-time').removeClass('d-block').addClass('d-none');
              }
              
              if ($('#date').val() !== '') {
                $('#alert-date').removeClass('d-block').addClass('d-none');
              }
              
              if ($('#place').val() !== '') {
                $('#alert-place').removeClass('d-block').addClass('d-none');
              }
              
              if ($('#reason').val() !== '') {
                  $('#alert-reason').removeClass('d-block').addClass('d-none');
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

              if(error.responseJSON.reason && error.responseJSON.reason[0]) {
                //show alert
                $('#alert-reason').removeClass('d-none');
                $('#alert-reason').addClass('d-block');

                //add message to alert
                $('#alert-reason').html(error.responseJSON.reason[0]);
              }
            }
          })
        });

        $('#btn-accept-request').click(function(e) {
        e.preventDefault();

        let token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Nerima',
            text: "Yakin Nerima Kamu",
            icon: 'success',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {
            //ajax
            $.ajax({
                url: `/accept-request/${consultation_id}`,
                type: "POST",
                data: {
                    "_token": token,
                },
                success:function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: `${response.message}`,
                      showConfirmButton: false,
                      timer: 3000,
                  }).then(function() {
                      window.location.href = "/request-schedule";
                  });
                },
                error:function(error){
                  console.log(error)
                }
              })
            }
        })
      });
    });
</script>