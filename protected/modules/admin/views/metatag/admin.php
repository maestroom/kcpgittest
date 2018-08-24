<?php
/* @var $this MetatagController */
/* @var $model MetaTag */


/*$this->breadcrumbs=array(
	'Meta Tags'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-list','label'=>'List MetaTag', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create MetaTag', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#meta-tag-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo BsHtml::pageHeader('Manage','Meta Details') ?>
<div class="panel panel-default">
<!--
    <div class="panel-heading">
        <h3 class="panel-title"><?php //echo BsHtml::button('Advanced search',array('class' =>'search-button', 'icon' => BsHtml::GLYPHICON_SEARCH,'color' => BsHtml::BUTTON_COLOR_PRIMARY), '#'); ?></h3>
    </div>
-->
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
        
        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
                'model'=>$model,
            )); ?>
        </div>
        <!-- search-form -->

        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'meta-tag-grid',
			'dataProvider'=>$model->search(),
			//'filter'=>$model,
        	'type'=>'striped bordered condensed',
			'columns'=>array(
				array('header'=>'#','class'=>'IndexColumn','htmlOptions'=>array('data-title'=>'#')),
				'page',
				'title',
				'key_words',
				'description',
				//'seo_script',
					
				array( 'header'=>'Action',
					'class'=>'bootstrap.widgets.BsButtonColumn',
					'template'=>'{update}',
				),
			),
        )); ?>
    </div>
</div>
