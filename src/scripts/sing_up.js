// Get form elements
var form = document.getElementsByName('sing-up')[0];

// Add submit event listener
form.addEventListener('submit', function(event) {
  event.preventDefault();

  // Create form user object
  var new_user_data = {
    user_name: document.getElementsByName('username')[0].value,
    user_password: document.getElementsByName('password')[0].value
  };

  // Validate data
  if (new_user_data.user_name.length <= 5) {
    document.getElementById('msg_error').style.display = 'block';
    document.getElementById('msg_error').innerHTML =
      'Username must have at least 6 letters';
    return false;
  } else if (new_user_data.user_password.length <= 8) {
    document.getElementById('msg_error').style.display = 'block';
    document.getElementById('msg_error').innerHTML =
      'Password must have at least 8 letters';
    return false;
  } else {
    document.getElementById('msg_error').style.display = 'none';
  }

  // Build ajax requets
  var url =
    'http://localhost:8888/piranha_technical_skills_evaluation/src/controllers/sing_up_process.php';

  $.ajax({
    type: 'POST',
    url: url,
    data: new_user_data,
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
