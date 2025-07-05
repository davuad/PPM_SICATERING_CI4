<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\MemberModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends RestfulController
{

  public function login()
  {
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $model = new MemberModel();
    $member = $model->where(['email' => $email])->first();

    if (!$member) {
      return $this->responseHasil(400, false, "Email tidak ditemukan");
    }

    if (!password_verify($password, $member['password'])) {
      return $this->responseHasil(400, false, "Password tidak valid");
    }

    $login = new LoginModel();
    $auth_key = $this->RandomString();

    $login->save([
      'member_id' => $member['id'],
      'auth_key' => $auth_key
    ]);

    $data = [
      'token' => $auth_key,
      'user' => [
        'id' => (int) $member['id'],
        'email' => $member['email'],
      ]
    ];

    return $this->responseHasil(200, true, $data);
  }

  private function RandomString($length = 100)
  {
    $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $panjang_karakter = strlen($karakter);
    $str = '';

    for ($i = 0; $i < $length; $i++) {
      $str .= $karakter[rand(0, $panjang_karakter - 1)];
    }

    return $str;
  }

  /**
   * Return an array of resource objects, themselves in array format.
   *
   * @return ResponseInterface
   */
  public function index()
  {
    //
  }

  /**
   * Return the properties of a resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function show($id = null)
  {
    //
  }

  /**
   * Return a new resource object, with default properties.
   *
   * @return ResponseInterface
   */
  public function new()
  {
    //
  }

  /**
   * Create a new resource object, from "posted" parameters.
   *
   * @return ResponseInterface
   */
  public function create()
  {
    //
  }

  /**
   * Return the editable properties of a resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function edit($id = null)
  {
    //
  }

  /**
   * Add or update a model resource, from "posted" properties.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function update($id = null)
  {
    //
  }

  /**
   * Delete the designated resource object from the model.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function delete($id = null)
  {
    //
  }
}
