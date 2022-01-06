<?php

use App\Controllers\BaseController;

class PageNotFound extends BaseController
{
  function checkAjaxRequest($func)
  {
    if (!$func->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
}
