<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CorsFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Izinkan semua origin dan metode
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    return $response;
  }
}