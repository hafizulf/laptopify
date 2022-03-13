<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Admin\User;

class ManagePassword extends BaseController
{
  public function update()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $rules = [
      'current-password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password lama wajib diisi'
        ]
      ],
      'new-password' => [
        'rules' => 'required|min_length[8]',
        'errors' => [
          'required' => 'Password baru wajib diisi',
          'min_length' => 'Password minimal 8 karakter'
        ]
      ],
      'confirm-password' => [
        'rules' => 'required|matches[new-password]',
        'errors' => [
          'required' => 'Konfirmasi password wajib diisi',
          'matches' => 'Konfirmasi password tidak sesuai'
        ]
      ],
    ];

    if (!$this->validate($rules)) {
      $errors = [
        'current-password' => $this->validation->getError('current-password'),
        'new-password' => $this->validation->getError('new-password'),
        'confirm-password' => $this->validation->getError('confirm-password'),
      ];

      $data = [
        'status' => FALSE,
        'errors' => $errors
      ];

      return $this->response->setJSON($data);
    } else {
      $currentPass = strip_tags($this->request->getPost('current-password'));
      $newPass = strip_tags($this->request->getPost('new-password'));

      $userPass = session('password');

      $data = [];

      // Jika password lama sama dengan password yang ada di database
      if (!password_verify($currentPass, $userPass)) {
        $data = [
          'status' => FALSE,
          'type' => 'verify',
          'message' => 'Password lama salah'
        ];

        return $this->response->setJSON($data);
      } else {
        // Jika password baru sama dengan password lama
        if ($currentPass === $newPass) {
          $data = [
            'status' => FALSE,
            'type' => 'verify',
            'message' => 'Password baru tidak boleh sama dengan password lama'
          ];

          return $this->response->setJSON($data);
        } else {
          $data = [
            'id_user' => session('id_user'),
            'password' => $newPass,
          ];

          $userModel = new User();
          if ($userModel->updatePassword($data) === FALSE) {
            return $this->response->setJSON(['status' => FALSE, 'errors' => $userModel->errors()]);
          } else {
            $data = [
              'status' => TRUE,
              'message' => 'Password berhasil diperbarui.'
            ];

            return $this->response->setJSON($data);
          }
        }
      }
    }
  }
}
