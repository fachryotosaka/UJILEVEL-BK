<script>
    $(document).ready(function() {

      // Define a variable to store the original table HTML
      let originalTableHTML = $('#table-admin-body').html();

      // Event listener for the "Reset Table" button click
      $('#btn-reset-search').on('click', function() {
          // Reset the table to its original state
          $('#table-admin-body').html(originalTableHTML);
          $('#pagination-bar').show();
          $('#search-bar').val('').trigger('change');
          $('#btn-reset-search').hide();
      });

      var path = "{{ route('findUser') }}";
          $('#search-bar').select2({
          placeholder: 'Search',
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

      // Function to execute when an option is selected
      $('#search-bar').on('select2:select', function(e) {
          var selectedUserId = e.params.data.id;
          
          // Perform an AJAX request to fetch user data
          $.ajax({
              url: `/resultUser/${selectedUserId}`,
              type: "GET",
              success: function(response) {
                var tableBody = $('#table-admin-body');
                $('#pagination-bar').hide();
                $('#btn-reset-search').show();
                tableBody.empty();

                  //data post
                  let post = `
                    <tr id="index_${response.id}">
                    <th scope="row">${response.id}</th>
                    <td>${response.name}</td>
                    <td>${response.email}</td>
                    <td>${response.role}</td>
                    <td>${response.classroomName}</td>
                    <td class="text-center">
                        <a href="javascript:void(0)" id="btn-edit-admin" data-id="${response.id}" class="btn btn-primary btn-sm">EDIT</a>
                        <a href="javascript:void(0)" id="btn-delete-admin" data-id="${response.id}" class="btn btn-danger btn-sm">DELETE</a>
                    </td>
                    </tr>
                `;
                tableBody.prepend(post);
              },
              error: function(xhr, status, error) {
                  // Handle the error, if any
                  console.log(error);
              }
          });
      });

    });
  </script>