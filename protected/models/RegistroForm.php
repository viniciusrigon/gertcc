<?php

/**
 * RegistroForm class.
 * RegistroForm é a estrutura para manter os dados de registro
 * É utilizado pela ação 'registro' do 'SiteController'.
 */
class RegistroForm extends CFormModel
{
  public $nome;
  public $email;
  public $login;
  public $senha;
  public $senha_repeat;
  public $tipo;

  /**
   * Declares the validation rules.
   * The rules state that username and password are required,
   * and password needs to be authenticated.
   */
  public function rules()
  {
    return array(
      array('nome, email, login, senha, senha_repeat, tipo', 'required'),
      array('login, senha, senha_repeat', 'length', 'max'=>32),
      array('email', 'length', 'max'=>128),
      array('nome', 'length', 'max'=>64),
      array('tipo', 'in', 'range'=>array('A', 'P', 'C')),
      array('senha', 'compare'),
      array('email', 'email', 'pattern'=>'/^[A-Z0-9._%+-]+@((.*)\.)*ufrgs\.br/i'),
    );
  }

  /**
   * Declares attribute labels.
   */
  public function attributeLabels()
  {
    return array(
      'nome'=>'Nome',
      'login'=>'Login',
      'email'=>'E-mail',
      'senha'=>'Senha',
			'senha_repeat'=>'Confirmação de senha',
			'tipo'=>'Tipo de registro',
    );
  }
  
  /**
   * Salva o novo usuário
   */
  public function registrar()
  {
    $connection = Yii::app()->db;
    $transaction = $connection->beginTransaction();
    try
    {
      $pessoa = new Pessoa;
      $pessoa->attributes = array('nome'=>$_POST['RegistroForm']['nome'],
                                  'tipo'=>$_POST['RegistroForm']['tipo']);
      if ($pessoa->save())
      {
        $usuario = new Usuario;
        $usuario->attributes = array('login'=>$_POST['RegistroForm']['login'],
                                     'email'=>$_POST['RegistroForm']['email'],
                                     'senha'=>md5(Yii::app()->params['hashSalt'].$_POST['RegistroForm']['senha']),
                                     'id_pessoa'=>$pessoa->id_pessoa,
        );
        if ($usuario->save())
          $transaction->commit();
      }
    }
    catch(Exception $e)
    {
      $transaction->rollBack();
      Yii::app()->user->setFlash('registro', 'Erro na aplicação.');
      Yii::app()->end();
    }
    
    return true;
  }
}
