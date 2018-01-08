<?php

/**
 * This is the model class for table "lb_block".
 *
 * The followings are the available columns in table 'lb_block':
 * @property integer $id_block
 * @property integer $id_district
 * @property string $name
 * @property string $updated
 * 
 * @property string $slug
 * @property integer $pri_code
 * @property integer $organizationId
 * @property string $domainName
 * @property string $friendlyUrl
 * @property string $nomenclatureName

 * 
 * @property Panchayat[] $panchayats
 * @property District $district
 */
class Block extends CActiveRecord
{

    /**
     *
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'lb_block';
    }
    
    public function bydistrict($id_district)
    {
        $this->getDbCriteria ()->mergeWith (
                array (
                        'condition' => 'id_district=:sid',
                        'params' => array (
                                'sid' => $id_district
                        )
                ) );
        return $this;
    }	

    public function behaviors()
    {
        return [ 
                'CTimestampBehavior' => [ 
                        'class' => 'zii.behaviors.CTimestampBehavior',
                        'createAttribute' => null,
                        'updateAttribute' => 'updated' 
                ],
                'NameLinkBehavior' => [ 
                        'class' => 'application.behaviours.NameLinkBehavior',
                        'controller' => 'localgov/block',
                        'template' => '{link}' 
                ] 
        ];
    }

    /**
     *
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array (
                array (
                        'id_district, name',
                        'required' 
                ),
                array (
                        'id_district',
                        'numerical',
                        'integerOnly' => true 
                ),
                
                array('pri_code,organizationId', 'numerical', 'integerOnly'=>true),
                array('slug, domainName,friendlyUrl,nomenclatureName', 'length', 'max'=>255),
                
                array (
                        'name',
                        'length',
                        'max' => 70 
                ),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be
                // searched.
                array (
                        'id_block, id_district, name, updated',
                        'safe',
                        'on' => 'search' 
                ) 
        );
    }

    /**
     *
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array (
                'district' => array (
                        self::BELONGS_TO,
                        'District',
                        'id_district' 
                ),
                'panchayats' => array (
                        self::HAS_MANY,
                        'Panchayat',
                        'id_block' 
                ) 
        );
    }

    /**
     *
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array (
                'id_block' => 'Id Block',
                'id_district' => 'Id District',
                'name' => 'Name',
                'updated' => 'Updated' 
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will
     * filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     *         based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria ();
        
        $criteria->compare ( 'id_block', $this->id_block );
        $criteria->compare ( 'id_district', $this->id_district );
        $criteria->compare ( 'name', $this->name, true );
        $criteria->compare ( 'updated', $this->updated, true );
        
        return new CActiveDataProvider ( $this, array (
                'criteria' => $criteria 
        ) );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your
     * CActiveRecord descendants!
     *
     * @param string $className
     *            active record class name.
     * @return Block the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model ( $className );
    }
}
