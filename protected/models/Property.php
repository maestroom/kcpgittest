<?php

/**
 * This is the model class for table "property".
 *
 * The followings are the available columns in table 'property':
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $sqft
 * @property string $master_plan
 * @property string $map_location
 * @property string $overview
 * @property string $specifications
 * @property string $builder
 * @property string $amenities
 * @property integer $view_order
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property PropertyGallery[] $propertyGalleries
 * @property PropertyNeighbourhoods[] $propertyNeighbourhoods
 * @property PropertyPhotos[] $propertyPhotoses
 * @property PropertyVideos[] $propertyVideoses
 */
class Property extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_alias, title, type, sqft, path', 'required'),
			array('view_order, status', 'numerical', 'integerOnly'=>true),
			array('title, master_plan', 'length', 'max'=>5000),
			array('type', 'length', 'max'=>255),
			array('sqft', 'length', 'max'=>20),
			array('meta_title, meta_keywords, meta_description, seo_script', 'safe'),
			array('id_alias', 'length', 'max'=>2500),
            		array('seo_script', 'length', 'max'=>10000),
            		array('id_alias', 'ckeck_charecters'),
            		array('id_alias','unique','className'=>'Property','attributeName'=>'id_alias','message'=>'Alias name already exists'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, type, sqft, path, master_plan, map_location, overview, specifications, builder, amenities, view_order, status, meta_title, meta_keywords, meta_description, seo_script', 'safe', 'on'=>'search'),
		);
	}

	public function ckeck_charecters($attribute)
    {
        if($this->id_alias!='')
        {
            if(preg_match('/[^A-Za-z0-9]/', $this->id_alias))
            {
                $this->addError("id_alias", $this->getAttributeLabel($attribute)." contains invalid characters. please avoid space and special characters");
            }
        }
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'propertyGalleries' => array(self::HAS_MANY, 'PropertyGallery', 'property_id'),
			'propertyNeighbourhoods' => array(self::HAS_MANY, 'PropertyNeighbourhoods', 'property_id'),
			'propertyPhotoses' => array(self::HAS_MANY, 'PropertyPhotos', 'property_id'),
			'propertyVideoses' => array(self::HAS_MANY, 'PropertyVideos', 'property_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_alias' => 'URL Alias',
			'title' => 'Title',
			'type' => 'Type',
			'sqft' => 'Sqft',
            'path' => 'Cover Image',
			'master_plan' => 'Master Plan',
			'map_location' => 'Map Location',
			'overview' => 'Overview',
			'specifications' => 'Specifications',
			'builder' => 'Builder',
			'amenities' => 'Amenities',
			'view_order' => 'View Order',
			'status' => 'Status',
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
                $criteria->condition = 'status=1';

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('sqft',$this->sqft,true);
		$criteria->compare('master_plan',$this->master_plan,true);
		$criteria->compare('map_location',$this->map_location,true);
		$criteria->compare('overview',$this->overview,true);
		$criteria->compare('specifications',$this->specifications,true);
		$criteria->compare('builder',$this->builder,true);
		$criteria->compare('amenities',$this->amenities,true);
		$criteria->compare('view_order',$this->view_order);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Property the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
