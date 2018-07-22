// Row click redir
var rows = document.querySelectorAll('.row-link');
console.log(rows);
rows.forEach(row =>
  row.addEventListener('click', e => {
    window.location = `ifa-staff-policie-datail.php?id=${row.id}`;
  })
);
