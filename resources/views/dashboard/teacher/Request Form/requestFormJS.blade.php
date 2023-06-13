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
      let place = $('#places').val();
      let time = $('#times').val();
      let date = $('#dates').val();
      let reason = $('#reason').val();

      console.log(place);
      console.log(time);
      console.log(date);
      console.log(reason);

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
              window.location.href = "/archive-schedule";
            });
          },
          error:function(error){
            
            if ($('#times').val() !== '') {
              $('#alert-times').removeClass('d-block').addClass('d-none');
            }
            
            if ($('#dates').val() !== '') {
              $('#alert-dates').removeClass('d-block').addClass('d-none');
            }
            
            if ($('#places').val() !== '') {
              $('#alert-places').removeClass('d-block').addClass('d-none');
            }
            
            if ($('#reason').val() !== '') {
                $('#alert-reason').removeClass('d-block').addClass('d-none');
            }

            if(error.responseJSON.time && error.responseJSON.time[0]) {
              //show alert
              $('#alert-times').removeClass('d-none');
              $('#alert-times').addClass('d-block');

              //add message to alert
              $('#alert-times').html(error.responseJSON.time[0]);
            }

            if(error.responseJSON.date && error.responseJSON.date[0]) {
              //show alert
              $('#alert-dates').removeClass('d-none');
              $('#alert-dates').addClass('d-block');

              //add message to alert
              $('#alert-dates').html(error.responseJSON.date[0]);
            }

            if(error.responseJSON.place && error.responseJSON.place[0]) {
              //show alert
              $('#alert-places').removeClass('d-none');
              $('#alert-places').addClass('d-block');

              //add message to alert
              $('#alert-places').html(error.responseJSON.place[0]);
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
                  window.location.href = "/archive-schedule";
                });
              },
              error:function(error){
                console.log(error)
              }
            })
          }
      })
    });
  
    var currentURL = window.location.href;
    
    if(currentURL === `http://127.0.0.1:8000/finish-request/${consultation_id}`) {
      $('#btn-accept-request').hide();
      $('#btn-decline-request').hide(); 
      $('#finish-form').show(); 
    }

    $('#confirm-finish').click(function(e) {
      e.preventDefault();
      let reason = $('#result').val();

      let token = $("meta[name='csrf-token']").attr("content");

      //ajax
      $.ajax({
          url: `/finish-request/${consultation_id}`,
          type: "POST",
          data: {
              "result": reason,
              "_token": token,
          },
          success:function(response){
            Swal.fire({
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 3000
            }).then(function() {
              window.location.href = "/archive-schedule";
            });
          },
          error:function(error){
            if ($('#result').val() !== '') {
                $('#alert-result').removeClass('d-block').addClass('d-none');
            }

            if(error.responseJSON.result && error.responseJSON.result[0]) {
              //show alert
              $('#alert-result').removeClass('d-none');
              $('#alert-result').addClass('d-block');

              //add message to alert
              $('#alert-result').html(error.responseJSON.reason[0]);
            }
          }
        })
      });
  
  });
</script>