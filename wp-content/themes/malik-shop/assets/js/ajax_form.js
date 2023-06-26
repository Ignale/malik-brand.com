/* login form
     * ------------------------------------------------------ */
var $j = jQuery;
const $logForm = $j('.login-opacity');
const $logLogo = $j('.login-logo');
const $closeLogForm = $j('.close-form');
const text = ('.malik-breadcrumb');

$logLogo.on('click', function (e) {
  $logForm.show();
  console.log('hello')
});
$closeLogForm.on('click', function (e) {
  $logForm.hide();

});
$j('#login').on('submit', function (e) {
  $j('.status_login').show().html(ajax_login_object.loadingmessage);
  $j.ajax({
    type: 'POST',
    dataType: 'json',
    url: ajax_login_object.ajaxurl,
    data: {
      'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
      'username': $j('#user_login').val(),
      'password': $j('#user_pass').val(),
      'security': $j('#login #security').val()

    },
    success: function (data) {
      console.log(data)
      $j('.status_login').html(data.message);
      if (data.error == false) {
        $j('.status_login').html(data.message);
        document.location.href = ajax_login_object.redirecturl;
      }
    },
    error: function (data) {
      console.log(data)
      $j('.status_login').html(ajax_login_object.errormessage);
    },
  });
  e.preventDefault();
});

$j('#registration').on('submit', function (e) {
  $j('.status-reg').show().html(ajax_login_object.loadingmessage);
  $j.ajax({
    type: 'POST',
    dataType: 'json',
    url: ajax_login_object.ajaxurl,
    data: {
      'action': 'checkreg',
      'reg-user': $j('#reg_username').val(),
      'reg-mail': $j('#reg_email').val(),
      'reg-pass': $j('#reg_password').val(),
    },
    success: function (data) {
      if (data.error === true) {
        $j('.status-reg').html(data.message)
      } else if (!data) {
        $j('.status-reg').html(ajax_login_object.successmessage);
        document.location.href = ajax_login_object.redirecturl;
      }

    },
    error: function () {
      $j('.status-reg').html(ajax_login_object.successmessage);
      document.location.href = ajax_login_object.redirecturl;
    }
  })
  e.preventDefault();
})
