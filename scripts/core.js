
// execute when the HTML file's (document object model: DOM) has loaded
$(document).ready(function() {

  /* USERNAME VALIDATION */
  // use element id=username 
  // bind our function to the element's onblur event
  $('#registration_form').find('#username').blur(function() {

    // get the value from the username field                              
    var username = $('#username').val();
    //alert(username);
    
    // Ajax request sent to the CodeIgniter controller "ajax" method "username_taken"
    // post the username field's value
    $.post('http://localhost:8080/ciblog/ajax/username_taken',
      { 'username':username },

      // when the Web server responds to the request
      function(result) {
        // clear any message that may have already been written
        $('#bad_username').replaceWith('');
        
        // if the result is TRUE write a message to the page
        if (result) {
          $('#username').after('<div id="bad_username" style="color:red;">' +
            '<p>(That Username is already taken. Please choose another.)</p></div>');
        }
      }
    );
  });

  // Login Validation
  $('#login_form').find('#login').click(function() {
    // var username = $('#username').val();
    // var password = $('#password').val();

    //alert(username);
    var data = $('form:first').serialize();
    $.post(
      'http://localhost:8080/ciblog/ajax/login_validate',
      data,
      function(data) {
        $('#bad_username').html('');
        if(data) {
          $('#bad_username').html(data).fadeIn('slow');
        } else {
          window.location.href = 'http://localhost:8080/ciblog/blog';
        }
      }
      
    );
  }); 

  // Insertin Comments
  $('#comment_form').find('#submit').click(function() {
      var data = $('form:first').serialize();
      $.post(
        'http://localhost:8080/ciblog/ajax/comment',
        data,
        function(data) {
          $('#responses').html(data).fadeIn('slow');
        }
      );
  });

  // Searching Site

  // $('#yahoo').find('#search').click(function() {
  //     $('.post_container, .comment, .ad').css('display', 'none');
  //     $('.search_result').fadeIn('slow');
  // });

  // Not Displaying Nav
  function navdisplay() {
    $('#nav').css('display', 'none');
  }

});
