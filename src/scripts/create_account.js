// Get form elements
var form = document.getElementsByName('create-account')[0];
console.log(form);
// Add submit event listener
form.addEventListener('submit', function(event) {
  event.preventDefault();

  // Create form user object
  var new_account_data = {
    user_name: document.getElementsByName('new-account-name')[0].value,
    user_email: document.getElementsByName('new-account-email')[0].value
  };

  // Validate data
  if (new_account_data.user_name.length <= 5) {
    document.getElementById('msg_error').style.display = 'block';
    document.getElementById('msg_error').innerHTML =
      'Username must have at least 6 letters';
    return false;
  } else if (new_account_data.user_email.length <= 8) {
    document.getElementById('msg_error').style.display = 'block';
    document.getElementById('msg_error').innerHTML =
      'Email must have at least 8 letters';
    return false;
  } else {
    document.getElementById('msg_error').style.display = 'none';
  }

  console.log(new_account_data);

  // Build ajax requets
  var url =
    'http://localhost:8888/piranha_technical_skills_evaluation/src/controllers/create_account.php';

  $.ajax({
    type: 'POST',
    url: url,
    data: new_account_data,
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
