<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id_usuario
 * @property integer $id_pessoa
 * @property string $login
 * @property string $senha
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Pessoa $idPessoa0
 */
class Usuario extends CActiveRecord
{
  
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		  array('login, senha, email', 'required'),
			array('login, senha', 'length', 'max'=>32),
			array('email', 'length', 'max'=>128),
			array('email', 'email'),
      array('id_pessoa', 'safe', 'on'=>'insert'),
			array('id_usuario, id_pessoa, login, senha, email', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'_pessoa' => array(self::BELONGS_TO, 'Pessoa', 'id_pessoa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'login' => 'Login',
			'senha' => 'Senha',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_pessoa',$this->id_pessoa);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('senha',$this->senha,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	 
  /**
   * Valida a senha de um usuário
   * @param string $password Senha fornecida
   * @return boolean
   */
  public function validatePassword($password)
  {
    return $this->hashPassword($password, Yii::app()->params['hashSalt'])===$this->senha;
  }

  /**
   * Aplica a função de hash na senha fornecida
   */
  public function hashPassword($password, $salt)
  {
    return md5($salt.$password);
  }
}