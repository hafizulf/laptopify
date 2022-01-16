<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= isset($judul) ? $judul : 'laptopify'; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/css/my.css" rel="stylesheet">

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
    $('#checkboxes').on('click', function() {
      $(this).is(':checked') ? $('.checkbox').prop('checked', true) : $('.checkbox').prop('checked', false)
    })

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
      $('.evolution').remove('')
    })

    const beforeSendAction = function() {
      $('.btn-simpan').html('loading.. <span class="spinner-border spinner-border-sm"></span>')
    }

    const completeAction = function() {
      $('.btn-simpan').html('<i class="fas fa fa-save"></i> Simpan')
    }

    const toastSuccess = function(response, dataTarget = '') {
      Toast.fire({
        icon: 'success',
        title: response.message
      })

      if (dataTarget != '') {
        $(dataTarget).modal('toggle')
      }
    }

    const reload = function() {
      setTimeout(function() {
        location.reload()
      }, 2000)
    }

    const errorValidation = function(errors) {
      $.each(errors, function(key, val) {
        $('[name="' + key + '"]').addClass('is-invalid')
        $('[name="' + key + '"]').next().text(val)
      })
    }

    const errorValidationArr = function(errors) {
      let errorsSection = ''
      $.each(errors, function(key, val) {
        errorsSection += `
        <div class="alert alert-danger" role="alert">
          ${val}
        </div>
        `
      })
      $('.errors-section').html(errorsSection)
    }

    const removeClasses = function(form) {
      $(form + ' input').keyup(function() {
        $(this).removeClass('is-invalid is-valid')
      })

      $(form + ' select').click(function() {
        $(this).removeClass('is-invalid is-valid')
      })
    }

    const requestSaveData = function(form, ...params) {
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
            toastSuccess(response, params[0])
            reload()
          } else {
            const errors = response.errors
            params[1] === 'has array' ? errorValidationArr(errors) : errorValidation(errors)
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
        }
      })
    }

    const warnEmptyData = function() {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Tidak ada data yang terpilih!',
      })
    }

    const requestDeleteData = function(url) {
      const data = $('.checkbox:checked').serialize()

      if (data.length < 1) {
        warnEmptyData()
      } else {
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: `anda akan menghapus data.`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '' + url + '',
              type: 'POST',
              data: data,
              dataType: 'JSON',
              success: function(response) {
                if (response.status) {
                  toastSuccess(response)
                  reload()
                }
              },
              error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
              }
            })
          }
        })
      }
    }

    const updateKriteriaOption = function(key, val) {
      let arr = []
      key == 'jenis' ? arr = ['cc', 'bc'] : arr = [1, 0]

      let jenisVal = ''
      let dkVal = ''
      for (let i = 0; i < arr.length; i++) {
        if (key == 'jenis') {
          jenisVal = arr[i] == 'bc' ? 'Benefit Criteria' : 'Cost Criteria'
        } else if (key == 'data_kuantitatif') {
          dkVal = arr[i] == 1 ? 'Kuantitatif' : 'Kualitatif'
        }

        let optionValue = key == 'jenis' ? jenisVal : dkVal
        if (arr[i] == val) {
          $('[name="' + key + '"]').append(`<option value="${arr[i]}" selected class="evolution">${optionValue}</option>`);
        } else {
          $('[name="' + key + '"]').append(`<option value="${arr[i]}" class="evolution">${optionValue}</option>`);
        }
      }
    }

    const requestGetDataById = function(url, ...params) {
      let checked = $('.checkbox:checked')
      let id = checked.val()

      if (checked.length < 1) {
        warnEmptyData()
      } else if (checked.length > 1) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Silahkan pilih 1 data saja yang ingin diperbarui!',
        })
      } else {
        $('#modalBoxUbah').modal({
          toggle: true,
          backdrop: 'static',
          keyboard: false
        })

        $.ajax({
          url: '' + url + '',
          type: 'POST',
          data: {
            id: id
          },
          dataType: 'JSON',
          success: function(response) {
            console.log(response);
            $.each(response, function(key, val) {
              $('[name="' + key + '"]').val(val)

              // select option
              // if ($('[name="' + key + '"]').prop("tagName") == "SELECT") {
              //   selectTagAction(key, val, params[0])
              // }
              if (params[0] == 'kriteria') {
                updateKriteriaOption(key, val)
              }
            })
          }
        })
      }
    }
  </script>

  <?= $this->renderSection('custom-js'); ?>

</body>

</html>
