
<?php
$this->title = Yii::t('app', 'สัดส่วนการใช้บริการที่หน่วยบริการปฐมภูมิต่อการใช้บริการที่โรงพยาบาล');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ qof', 'url' => ['qof/index']];
$this->params['breadcrumbs'][] = 'สัดส่วนการใช้บริการที่หน่วยบริการปฐมภูมิต่อการใช้บริการที่โรงพยาบาล';

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

?>
<div class="alert alert-primary">
     <h4><font color="#FFFF00">สัดส่วนการใช้บริการที่หน่วยบริการปฐมภูมิต่อการใช้บริการที่โรงพยาบาล (ผู้รับผิดชอบ วิเชียร นุ่นศรี)</font></h4>
     <h6><p><font color="#FFFFFF">จำนวนครั้งของผู้ป่วยสิทธิ UC ในเขตรับผิดชอบไปใช้บริการที่หน่วยบริการปฐมภูมิ/เทียบกับจำนวนผู้มีสิทธิ์ UC ในเขตรับผิดชอบที่ไปใช้บริการที่โรงพยาบา
     ช่วง 1 เมษายน 2558 ถึง 31 มีนาคม 2559) เกณฑ์เป้าหมายไม่น้อยกว่า 1.51 </font></p></h6>
</div>
<div class='well'>
    <div class="row">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
        <div class="col-md-3">
            ระบุวันที่   
            <?php
            echo DatePicker::widget([
                'name' => 'date1',
                'value' => $date1,
                'language' => 'th',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>

        <div class="col-md-3">
            ถึง
            <?php
            echo DatePicker::widget([
                'name' => 'date2',
                'value' => $date2,
                'language' => 'th',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <label><font color="#FFFF">.</font></label>
            <div class="input-group">
                <?= Html::submitButton('ประมวลผล') ?>
            </div><!-- /.input group -->
        </div> 
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        //'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload', ['/dental/index'], ['class' => 'btn btn-info']),
        'after' => 'จำนวนประชากรสิทธิ UC ของหน่วยบริการ ที่มา : สำนักบริหารงานทะเบียนหลักประกันสุขภาพ สำนักงานหลักประกันสุขภาพแห่งชาติ ข้อมูล ณ วันที่ : ต.ค. 2558 ',
    ],
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'pjax'=>true,
    'pjaxSettings'=>[
        'neverTimeout'=> true,
        'beforeGrid'=>'',
        'afterGrid'=>'',
    ],
    'columns' => [
        [
            'class'=>'yii\grid\SerialColumn'
        ],
        [
            'attribute' => 'hos_name',
            'header' => 'หน่วยบริการ'
        ],
         [
            'attribute' => 'a',
            'header' => 'จำนวน (คน)สิทธิ UC'
        ],
         [
            'attribute' => 'b',
            'header' => 'รับบริการ (คน)'
        ]
    ]
]);

