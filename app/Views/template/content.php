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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- DataTable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

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
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $('table#dataTable').DataTable({
      "ordering": false,
      "info": false,
      "pagingType": "first_last_numbers",
      // "stateSave": true,
      // "paging": false,
      scrollY: '50vh',
      scrollCollapse: true,
    })

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
      if ($('.formSubmit') >= 0) {
        $('.formSubmit')[0].reset()
      }
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

    const toastAlert = function(response) {
      Toast.fire({
        icon: 'warning',
        title: response.warning
      })
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
            if (!response.warning) {
              toastSuccess(response, params[0])
              reload()
            } else {
              toastAlert(response)
            }
          } else {
            const errors = response.errors
            params[1] === 'has array' ? errorValidationArr(errors) : errorValidation(errors)

            if (response.type === 'verify') {
              Toast.fire({
                icon: 'error',
                title: response.message
              })
            }
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
        let text = arguments[1] === 'caution' ? arguments[2] : 'anda akan menghapus data'

        Swal.fire({
          title: 'Apakah anda yakin?',
          text: `${text}.`,
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
      if (!params[1]) {
        let checked = $('.checkbox:checked')

        if (checked.length < 1) {
          warnEmptyData()
        } else if (checked.length > 1) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Silahkan pilih 1 data saja yang ingin diperbarui!',
          })
        } else {
          let id = checked.val()

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
      } else {
        $('#modalBoxDetail').modal('toggle')

        $.ajax({
          url: '' + url + '',
          type: 'POST',
          data: {
            id: params[1]
          },
          dataType: 'JSON',
          success: function(response) {
            $.each(response, function(key, val) {
              $('.' + key + '').text(val)

              if (key === 'harga') {
                $('.' + key + '').text(`Rp. ${val}`)
              }
              if (key === 'url_produk') {
                $('.' + key + '').html(`<a href="${val}" target="_blank">Link to product</a>`)
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
