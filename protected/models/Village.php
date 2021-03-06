<?php

/**
 * This is the model class for table "villages2011".
 *
 * The followings are the available columns in table 'villages2011':
 * @property integer $id_village
 * @property integer $id_state
 * @property integer $id_district
 * @property integer $id_lb_district
 * @property string $block
 * @property integer $id_block
 * @property string $panchayat
 * @property integer $id_panchayat
 * @property string $village
 * @property integer $id_lb_village
 * @property string $created
 */
class Village extends CActiveRecord
{

    public function behaviors()
    {
        return [ 
                'CTimestampBehavior' => array (
                        'class' => 'zii.behaviors.CTimestampBehavior',
                        'createAttribute' => 'created',
                        'updateAttribute' => 'updated', 
                ) 
        ];
    }
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'villages2011';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array (
                array (
                        'id_state, id_district, block, panchayat, village',
                        'required' 
                ),
                array (
                        'id_state, id_district, id_lb_district,id_block, id_panchayat,id_lb_village,id_lb_village',
                        'numerical',
                        'integerOnly' => true 
                ),
                array (
                        'block, panchayat, village, ward',
                        'length',
                        'max' => 50 
                ),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be
                // searched.
                array (
                        'id_village, id_state, id_district, block, panchayat, village, ward, created, id_lb_district, id_block',
                        'safe',
                        'on' => 'search' 
                ) 
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
			'id_village' => 'Id Village',
			'id_state' => 'State',
			'id_district' => 'id_place2 from place_names',
			'block' => 'Block',
			'panchayat' => 'Panchayat',
			'village' => 'Village',
			'created' => 'Created',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_village',$this->id_village);
		$criteria->compare('id_state',$this->id_state);
		$criteria->compare('id_district',$this->id_district);
		$criteria->compare('block',$this->block,true);
		$criteria->compare('panchayat',$this->panchayat,true);
		$criteria->compare('village',$this->village,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Village the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
