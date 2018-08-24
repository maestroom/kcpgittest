
<?php echo BsHtml::pageHeader('Manage','What We Do') ?>
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
                <a href="<?php echo Yii::app()->createUrl('admin/whatwedo/create'); ?>" class="btn btn-xs btn-primary"> Add New </a>
            </span>
        <br /><br />

        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'what-we-do-grid',
			'dataProvider'=>$model->search(),
			'type'=>'striped bordered condensed',
                        //'filter'=>$model,
                        'enableSorting' => true,
			'columns'=>array(
                                            array('header'=>'#','class'=>'IndexColumn','htmlOptions'=>array('data-title'=>'#')), // this is defined in compnents folder
                                            'title',
                                            'content',
                                            array('header'=>'Image','type'=>'raw','value' =>'(!empty($data->path)) ? CHtml::image(Yii::app()->baseUrl.$data->path,"",array("style"=>"width:70px;height:70px;")):"No Image"'),
                                            'view_order',
                                            
                                            array(
                                                    'header'=>'Action',
                                                    'class'=>'bootstrap.widgets.BsButtonColumn',
                                                    'template'=>'{update} &nbsp; {delete}',
                                            ),
                                    ),
        )); ?>
    </div>
</div>




