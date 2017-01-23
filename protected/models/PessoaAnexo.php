<?php

/**
 * This is the model class for table "pessoa_anexo".
 *
 * The followings are the available columns in table 'pessoa_anexo':
 * @property integer $id_pessoa
 * @property integer $id_anexo
 * @property integer $flagAutor
 *
 * The followings are the available model relations:
 */
class PessoaAnexo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PessoaAnexo the static model class
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
		return 'pessoa_anexo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pessoa, id_anexo', 'required'),
			array('id_pessoa, id_anexo, flagAutor', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pessoa, id_anexo, flagAutor', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pessoa' => 'Id Pessoa',
			'id_anexo' => 'Id Anexo',
			'flagAutor' => 'Flag Autor',
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

		$criteria->compare('id_pessoa',$this->id_pessoa);
		$criteria->compare('id_anexo',$this->id_anexo);
		$criteria->compare('flagAutor',$this->flagAutor);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}