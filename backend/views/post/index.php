<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '日志列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <span class="pull-right"><a data-toggle="隐藏搜索" href="#" onclick="javascript:(function(ele){$('.post-search').toggle(); var data = $(ele).attr('data-toggle'); $(ele).attr('data-toggle', $(ele).html()); $(ele).html(data);})(this);">显示搜索</a></span>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('写日志', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'title',
            [
                'label' => '标签',
                'attribute' => 'user.tags',
                'value'=>function($model){
                    $tagName = [];
                    foreach ($model->tags as $tag){
                        $tagName[] = $tag->name;
                    }
                    $html = join('，',$tagName);
                    return $html;
                }
            ],
            'created_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
