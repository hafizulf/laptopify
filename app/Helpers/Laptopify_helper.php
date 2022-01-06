<?php

use App\Controllers\BaseController;

class Laptopify extends BaseController
{
  function checkAjaxRequest($func)
  {
    if (!$func->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  function fieldValidation($rules, $func)
  {
    $validation = \Config\Services::validation();

    $rulesSize = count($rules);
    $rulesConverted = array_keys($rules);

    if (!$func->validate($rules, [])) {
      $errors = [];

      for ($i = 0; $i < $rulesSize; $i++) {
        $errors[$rulesConverted[$i]] = $validation->getError($rulesConverted[$i]);
      }

      return $errors;
    } else {
      return TRUE;
    }
  }
}