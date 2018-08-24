<?php

$property_name = '';

$get_property = Property::model()->findByPk($property_id);
if(!empty($get_property))
{
    $property_name = $get_property->title;
}

?>


<?php echo BsHtml::pageHeader('Manage','Property Photos ('.$property_name.')') ?>
<div class="panel panel-default">
    <div class="panel-body">
        
        <?php
            if(Yii::app()->user->hasFlash('success'))
             { 
                $msg = Yii::app()->user->getFlash('success');
                echo BsHtml::alert(BsHtml::ALERT_COLOR_SUCCESS, BsHtml::bold($msg));
             }
            elseif(Yii::app()->user->hasFlash('error')) 
             {
                $msg = Yii::app()->user->getFlash('error');
                echo BsHtml::alert(BsHtml::ALERT_COLOR_ERROR, BsHtml::bold('Sorry. ') . $msg);
             } 
        ?>
        
        <br />
            <span style="float:right;">
                <a href="<?php echo Yii::app()->createUrl('admin/property/admin'); ?>" class="btn btn-xs btn-danger"> Back to properties </a> &nbsp;&nbsp;
                <a href="<?php echo Yii::app()->createUrl('admin/propertyphotos/create', array('propertyid'=>$property_id)); ?>" class="btn btn-xs btn-primary"> Add New </a>
            </span>
        <br /><br />

        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'property-photos-grid',
			'dataProvider'=>$model->search($property_id),
			'type'=>'striped bordered condensed',
                        //'filter'=>$model,
                        'enableSorting' => true,
			'columns'=>array(
                                            array('header'=>'#','class'=>'IndexColumn','htmlOptions'=>array('data-title'=>'#')), // this is defined in compnents folder
                                            array('header'=>'Image','type'=>'raw','value' =>'(!empty($data->path)) ? CHtml::image(Yii::app()->baseUrl.$data->path,"",array("style"=>"width:130px;height:100px;")):"No Image"'),
                                            'view_order',
                                            
                                            array(
                                                    'header'=>'Action',
                                                    'class'=>'bootstrap.widgets.BsButtonColumn',
                                                    'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
                                                    'template'=>'{update} &nbsp; {delete}',
                                                    'buttons'=>array(       
                                                                        'update' => array(
                                                                                        'label'=>'Update',
                                                                                        'url'=>'Yii::app()->createAbsoluteUrl("admin/propertyphotos/update", array("id"=>$data->id,"propertyid"=>$data->property_id))',
                                                                                    ),
                                                                    ),                
                                                ),
                                    ),
        )); ?>
    </div>
</div>






