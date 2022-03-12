<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $user_role = session('role');

    $roles = is_array($arguments) ? $arguments : [$arguments];
    if (!in_array($user_role, $roles)) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    //
  }
}
