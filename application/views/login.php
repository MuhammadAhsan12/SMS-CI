<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>School</b> Management</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Please Login To Continue..</p>
      <form action="" method="post" id="loginform" name="login">
        <div class="form-group has-feedback">
          <input type="text" name="txtusername" id="txtusername" class="form-control" placeholder="Username" autofocus>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="txtpassword" id="txtpassword" class="form-control" placeholder="Password"">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <p class="ahsan" style="color: red;"><?php echo $this->session->flashdata('login_error'); ?></p>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4 pull-left">
            <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>

  <script type="text/javascript">
    $(".ahsan").hide();

    $("body").on("submit", "#loginform", function(e) {
      e.preventDefault();
      $.ajax({
        url: '<?php echo base_url() . 'index.php/Home/login' ?>',
        type: 'POST',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(data) {
          $(".ahsan").show();
          swal(
            'Login Successfully!',
            'Your Account has been Login.',
            'success'
          )
          window.setTimeout(function() {
            window.location.href = "<?php echo site_url('/'); ?>";
          }, 1000);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          $(".ahsan").show();
      }
      })
    });
  </script>
</body>