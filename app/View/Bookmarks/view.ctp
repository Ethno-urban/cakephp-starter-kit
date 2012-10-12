<?php 
$this->element('fancybox');

$title = getPreferedLang($item[$modelClass], 'title');
$description = getPreferedLang($item[$modelClass], 'description');
$this->set('title_for_layout', h($title));
$this->set('metaDescription', $description);
?>

<div class="<?php echo $pluralVar;?>-view">
	
	<?php echo $this->element('generic/actions-links');?>
	
	<h2><?php echo h($title);?></h2>
	
	<?php 
	/*$displayElements = array(
		'video' => __('Vid�o de pr�sentation'),
		'description' => __('Description'),
		'type' => __('Type'),
		'price' => __('Prix'),
		'city' => __('Ville'),
		'country' => __('Pays'),
		'address_components' => __('Localisation'),
		'geo' => __('Coordonn�es GPS'),
		'email_contact' => __('E-mail'),
		'phone' => __('T�l�phone'),
		'skype' => __('Skype'),
		'hitcount' => __('Consult�'),
	);
	
	echo $this->element('generic/view-display-elements', array('displayElements' => $displayElements));*/
	?>
	
	<?php if(isset($item[$modelClass]['oembed']['html'])):?>
		<?php echo $item[$modelClass]['oembed']['html'];?>
	<?php endif;?>
	
</div>