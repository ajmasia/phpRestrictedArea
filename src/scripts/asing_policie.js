// Datetable config
$(document).ready(function() {
  $('#datatable').DataTable();
});

// Get url params
var urlPrams = new URLSearchParams(location.search);
var staff_id = urlPrams.get('id');
console.log(staff_id);

// Close Add Plicie windows
var form_asign_policie = document.getElementsByName('asign-policies')[0];
console.log(form_asign_policie);
// Add submit event listener
form_asign_policie.addEventListener('submit', e => {
  e.preventDefault();
  window.location = `ifa-admin-edit-staff.php?id=${staff_id}`;
});

// Get policie id and send to process
var policie_button = document.querySelectorAll('.asing-policie');

policie_button.forEach(button => {
  button.addEventListener('click', e => {
    // Create form user object
    var policie_data = {
      policie_id: button.id
    };
    console.log(policie_data);

    var url =
      'http://localhost:8888/piranha_technical_skills_evaluation/src/controllers/asing_policie_controller.php';

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
