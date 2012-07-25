<div class="form">
<?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($form)?>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'login')?>*:
        <?php echo CHtml::activeTextField($form,'login'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'password'); ?>*:
        <?php echo CHtml::activePasswordField($form,'password'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'password_repeat'); ?>*:
        <?php echo CHtml::activePasswordField($form,'password_repeat'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'email'); ?>*:
        <?php echo CHtml::activeTextField($form,'email') ?>
    </div>
	
	<div class="row">
        <?php echo CHtml::activeLabel($form,'email visible'); ?>*:
        <?php echo CHtml::activeCheckBox($form,'email_visible') ?>
    </div>
	
	<div class="row">
        <?php echo CHtml::activeLabel($form,'sex'); ?>*:
        <?php echo CHtml::activeRadioButton($form,'sex',array('value'=>'M')) ?> Мужской
		<?php echo CHtml::activeRadioButton($form,'sex',array('value'=>'F','uncheckValue'=>NULL)) ?> Женский
    </div>
	<div class="row">
	<div class="row">
		<?php echo $form->labelEx($form,'day_of_birth'); ?>
		<?php echo $form->dropDownList($form,'day_of_birth', range(1,31), array('empty' => 'День')); ?>
			<?php echo $form->dropDownList($forml,'month_of_birth', range(1,12), array('empty' => 'Месяц')); ?>
			<?php echo $form->dropDownList($form,'year_of_birth', range(2010,1940), array('empty' => 'Год')); ?>
		<?php echo $form->error($form,'day_of_birth'); ?>
			<?php echo $form->error($form,'month_of_birth'); ?>
			<?php echo $form->error($form,'year_of_birth'); ?>
	</div>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($form,'about'); ?>
        <?php echo CHtml::activeTextArea($form,'about') ?>
    </div>
	
    <div class="row submit">
        <?php echo CHtml::submitButton('Зарегистрироваться'); ?>
    </div>

<?php echo CHtml::endForm(); ?>
</div>