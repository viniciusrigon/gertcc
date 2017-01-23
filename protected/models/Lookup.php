<?php

/**
 * This is the model class for table "lookup".
 *
 * The followings are the available columns in table 'lookup':
 * @property integer $id_lookup
 * @property string $tipo
 * @property integer $codigo
 * @property string $nome
 * @property integer $ordem
 * @property string $descricao
 *
 * The followings are the available model relations:
 * @property Acao[] $acaos
 * @property Anexo[] $anexos
 * @property Cliente[] $clientes
 * @property ClienteHasCliente[] $clienteHasClientes
 * @property Endereco[] $enderecos
 * @property Telefone[] $telefones
 * @property Usuario[] $usuarios
 */
class Lookup extends CActiveRecord
{

  /**
   * @var array List of items
   */
  private static $_items = array();

  /**
   * Retorna uma lista de itens de um determinado tipo
   * @param string $type Tipo do item que deve ser retornado
   * @return array Lista de itens
   */
  public static function items($type)
  {
    if (!isset(self::$_items[$type]))
    self::loadItems($type);
    return self::$_items[$type];
  }

  /**
   * Retorna um único item de uma lista
   * @param string $type Tipo da lista
   * @param integer $code Código do item
   * @return string Nome do item / false no caso do item não existir
   */
  public static function item($type, $code)
  {
    if (!isset(self::$_items[$type]))
    self::loadItems($type);
    return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;
  }

  /**
   * Carrega os itens de um determinado tipo
   * @param string $type Tipo
   * @return array Lista de itens
   */
  private static function loadItems($type)
  {
    self::$_items[$type] = array();
    $models = self::model()->findAll(array(
      'condition' => 'tipo=:tipo',
      'params' => array(':tipo'=>$type),
      'order' => 'ordem',
    ));

    foreach ($models as $model)
    self::$_items[$type][$model->codigo] = $model->nome;
  }

  /**
   * Returns the static model of the specified AR class.
   * @return Lookup the static model class
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
    return 'lookup';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
    array('codigo, ordem', 'numerical', 'integerOnly'=>true),
    array('tipo', 'length', 'max'=>32),
    array('nome', 'length', 'max'=>64),
    array('tipo, codigo, nome, ordem', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return array(
			'tipo' => 'Tipo',
			'codigo' => 'Codigo',
			'nome' => 'Nome',
			'ordem' => 'Ordem',
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

    $criteria->compare('tipo',$this->tipo,true);
    $criteria->compare('codigo',$this->codigo);
    $criteria->compare('nome',$this->nome,true);
    $criteria->compare('ordem',$this->ordem);

    return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
    ));
  }
}