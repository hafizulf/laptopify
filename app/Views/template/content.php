<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $judul; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?= $this->include('template/sidebar'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?= $this->include('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?= $this->renderSection('content'); ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?= $this->include('template/footer'); ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true
    })

    $('.modal').on('show.bs.modal', function() {
      $('.formSubmit')[0].reset()
      $(".is-valid").removeClass("is-valid");
      $(".is-invalid").removeClass("is-invalid")
    })

    const beforeSendAction = function() {
      $('.btn-simpan').html('loading.. <span class="spinner-border spinner-border-sm"></span>')
    }

    const completeAction = function() {
      $('.btn-simpan').html('<i class="fas fa fa-save"></i> Simpan')
    }

    const toastSuccess = function(type, response) {
      Toast.fire({
        icon: 'success',
        title: response.message
      })

      $(type).modal('toggle')
    }

    const errorValidation = function(response) {
      $.each(response.errors, function(key, val) {
        $('[name="' + key + '"]').addClass('is-invalid')
        $('[name="' + key + '"]').next().text(val)
        if (val == '') {
          $('[name="' + key + '"]').removeClass('is-invalid')
          $('[name="' + key + '"]').addClass('is-valid')
        }
      })
    }

    const removeClasses = function(form) {
      $(form + ' input').keyup(function() {
        $(this).removeClass('is-invalid is-valid')
      })
    }

    const requestAjax = function(form, dataTarget) {
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'JSON',
        data: form.serialize(),
        beforeSend: beforeSendAction(),
        complete: function() {
          completeAction()
        },
        success: function(response) {
          if (response.status) {
            toastSuccess(dataTarget, response)
          } else {
            errorValidation(response)
          }
        },
        error: function() {
          alert('xhr: ' + xhr.responseText + ' status: ' + status)
        }
      })

      removeClasses()
    }
  </script>

  <?= $this->renderSection('custom-js'); ?>

</body>

</html>
