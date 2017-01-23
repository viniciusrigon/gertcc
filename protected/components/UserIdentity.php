<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
  /**
   * @var integer Id do usuário autenticado
   */
  private $_id;

  /**
   * Authenticates a user.
   * @return boolean whether authentication succeeds.
   */
  public function authenticate()
  {
    $username = strtolower($this->username);
    $usuario = Usuario::model()->find('LOWER(login)=?',array($username));
    if (is_null($usuario))
      $this->errorCode = self::ERROR_USERNAME_INVALID;
    else
    {
      if (!$usuario->validatePassword($this->password))
      {
        $this->errorCode = self::ERROR_PASSWORD_INVALID;
      }
      else
      {
        $this->_id = $usuario->id_usuario;
        $this->username = $usuario->login;
        $this->errorCode = self::ERROR_NONE;
      }
    }
    return $this->errorCode === self::ERROR_NONE;
  }

  /**
   * Retorna o identificador do usuário
   * @return integer Identificador do usuário
   */
  public function getId()
  {
    return $this->_id;
  }
}