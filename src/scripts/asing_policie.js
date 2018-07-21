// Datetable config
$(document).ready(function() {
  $('#datatable').DataTable();

  //Buttons examples
  var table = $('#datatable-buttons').DataTable({
    lengthChange: false
    //buttons: ['copy', 'excel', 'pdf']
  });

  table
    .buttons()
    .container()
    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});

// Get policie id and send to process
var policie_button = document.querySelectorAll('.asing-policie');

policie_button.forEach(button => {
  button.addEventListener('click', e => {
    // Create form user object
    var policie_data = {
      policie_id: button.id
    };

    var url =
      'http://localhost:8888/piranha_technical_skills_evaluation/src/controllers/asing_policie_process.php';

    $.ajax({
      type: 'POST',
      url: url,
      data: policie_data,
      dataType: 'json',
      async: true
    })
      .done(res => {
        console.log(res);
        if (res.error !== undefined) {
          // Show form error message
          console.log(res.error);
          return false;
        }

        if (res.redirect !== undefined) {
          window.location = res.redirect;
        }
      })
      .fail(e => {
        console.log(e);
      })
      .always(() => {
        console.log('Ajax request finished');
      });
  });
});
