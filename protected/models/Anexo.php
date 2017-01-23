<?php

/**
 * This is the model class for table "Anexo".
 *
 * The followings are the available columns in table 'Anexo':
 * @property integer $id_anexo
 * @property string $caminho
 * @property string $nome
 * @property string $tipo
 *
 * The followings are the available model relations:
 * @property Avaliacao[] $avaliacaos
 * @property Pessoa[] $pessoas
 */
class Anexo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Anexo the static model class
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
		return 'Anexo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('caminho, nome', 'length', 'max'=>128),
			array('tipo', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_anexo, caminho, nome, tipo', 'safe', 'on'=>'search'),
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
			'avaliacaos' => array(self::HAS_MANY, 'Avaliacao', 'id_anexo'),
			'pessoas' => array(self::MANY_MANY, 'Pessoa', 'pessoa_anexo(id_anexo, id_pessoa)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_anexo' => 'Id Anexo',
			'caminho' => 'Caminho',
			'nome' => 'Nome',
			'tipo' => 'Tipo',
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

		$criteria->compare('id_anexo',$this->id_anexo);
		$criteria->compare('caminho',$this->caminho,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}