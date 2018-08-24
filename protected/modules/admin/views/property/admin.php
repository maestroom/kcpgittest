
<?php echo BsHtml::pageHeader('Manage','Properties') ?>
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
                <a href="<?php echo Yii::app()->createUrl('admin/property/create'); ?>" class="btn btn-xs btn-primary"> Add New </a>
            </span>
        <br /><br />

        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'property-grid',
			'dataProvider'=>$model->search(),
			'type'=>'striped bordered condensed',
                        //'filter'=>$model,
                        'enableSorting' => true,
			'columns'=>array(
                                            array('header'=>'#','class'=>'IndexColumn','htmlOptions'=>array('data-title'=>'#')), // this is defined in compnents folder
                                            'title',
                                            'type',
                                            'sqft',
                                            array('header'=>'Cover Image','type'=>'raw','value' =>'(!empty($data->path)) ? CHtml::image(Yii::app()->baseUrl.$data->path,"",array("style"=>"width:150px;height:75px;")):"No Image"'),
                                            'view_order',
                                            
                                            array(
                                                    'header'=>'Action',
                                                    'class'=>'bootstrap.widgets.BsButtonColumn',
                                                    'headerHtmlOptions'=>array('style'=>'width: 130px; text-align: center;'),
                                                    'template'=>'{update} &nbsp; {delete} &nbsp; {gallery} &nbsp; {neighbourhoods} &nbsp; {photos} &nbsp; {videos}',
                                                    'buttons'=>array(       
                                                                        'gallery' => array(
                                                                                        'label'=>'Gallery',
                                                                                        'url'=>'Yii::app()->createAbsoluteUrl("admin/propertygallery/admin", array("propertyid"=>$data->id))',
                                                                                    ),
                                                                        'neighbourhoods' => array(
                                                                                        'label'=>'Neighbourhoods',
                                                                                        'url'=>'Yii::app()->createAbsoluteUrl("admin/propertyneighbourhoods/admin", array("propertyid"=>$data->id))',
                                                                                    ),
                                                                        'photos' => array(
                                                                                        'label'=>'Photos',
                                                                                        'url'=>'Yii::app()->createAbsoluteUrl("admin/propertyphotos/admin", array("propertyid"=>$data->id))',
                                                                                    ),
                                                                        'videos' => array(
                                                                                        'label'=>'Videos',
                                                                                        'url'=>'Yii::app()->createAbsoluteUrl("admin/propertyvideos/admin", array("propertyid"=>$data->id))',
                                                                                    ),            
                                                                    ),                
                                                ),
                                    ),
        )); ?>
    </div>
</div>


