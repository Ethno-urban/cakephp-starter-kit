<?php 
$title = getPreferedLang(${$singularVar}[$modelClass], 'name');
$this->set('title_for_layout', h($title));
?>

<div class="<?php echo $pluralVar;?>-view">
	
	<?php echo $this->element('generic/actions-links');?>
	
	<h2><?php echo h($title);?></h2>
	
	<dl>
	<?php foreach(Configure::read('Config.languages') as $k => $l):?>
			<dt><?php echo h($l['language']);?></dt>
			<dd><?php echo h(${$singularVar}[$modelClass]['name_'.$k]);?></dd>
			<dd><?php echo h(${$singularVar}[$modelClass]['slug_'.$k]);?></dd>
	<?php endforeach;?>
	</dl>
</div>