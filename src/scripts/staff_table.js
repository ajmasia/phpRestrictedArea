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

// Row click redir
var rows = document.querySelectorAll('.row-link');

rows.forEach(row =>
  row.addEventListener('click', e => {
    window.location = `ifa-admin-edit-staff.php?id=${row.id}`;
  })
);
