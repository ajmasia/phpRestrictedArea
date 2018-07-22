// Get form elements
var form = document.getElementsByName('sing-in')[0];

// Add submit event listener
form.addEventListener('submit', e => {
  e.preventDefault();

  // Create form user object
  var user_data = {
    user_name: document.getElementsByName('username')[0].value,
    user_password: document.getElementsByName('password')[0].value
  };

  // Build ajax requets
  var url =
    'http://localhost:8888/piranha_technical_skills_evaluation/src/controllers/sing_in_controller.php';

  $.ajax({
    type: 'POST',
    url: url,
    data: user_data,
    dataType: 'json',
    async: true
  })
    .done(res => {
      console.log(res);
      if (res.error !== undefined) {
        // Show form error message
        document.getElementById('msg_error').style.display = 'block';
        document.getElementById('msg_error').innerHTML = res.error;
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
