<?php 
$title = getPreferedLang($item[$modelClass], 'title');
$description = getPreferedLang($item[$modelClass], 'description');
$this->set('title_for_layout', h($title));
$this->set('metaDescription', $description);
?>

<div class="<?php echo $pluralVar;?>-view">
	
	<?php if(Auth::hasRole(ROLE_ADMIN)):?>
		<?php echo $this->element('Links/rentabiliweb-form-vc');?>
		<?php echo $this->element('Links/teads');?>
	<?php endif;?>
	
	<?php echo $this->element('generic/actions-links');?>
	
	<h2><?php echo h($title);?></h2>
	
	<div class="grid_6 alpha centerize">
		<?php if(!empty($item[$modelClass]['url'])):?>
			<?php
			$urlDisplay = !empty($item[$modelClass]['url_display']) ? $item[$modelClass]['url_display'] : $item[$modelClass]['url'];
			if (!empty($urlDisplay)) {
				$countClickUrl = $this->Html->url(array('action' => 'count_clicks', $item[$modelClass]['id']));
			?>
			<p>
				<a href="<?php echo $urlDisplay;?>" onclick="location='<?php echo $countClickUrl;?>';return false;" onmouseover="window.status='<?php echo $urlDisplay;?>';return true;" onmouseout="self.status='';return true;">
					<?php echo $this->element('website-screenshot', array('url' => $item[$modelClass]['url'], 'size' => 'lg'));?>
				</a>
			</p>
			<?php }?>
		<?php else:?>
		&nbsp;
		<?php endif;?>
	</div>
	
	<div class="grid_11 omega">
		<?php if(!empty($description)):?>
			<p><?php echo nl2br(h($description));?></p>
		<?php endif;?>
	</div>
	<div class="clear"></div>
	
	<?php 
	$displayElements = array(
		'cats' => __('Catégories'),
		'url' => __('Site Web'),
		'address' => __('Adresse'),
		'address_components' => __('Localisation'),
		'geo' => __('Coordonnées GPS'),
		// 'rating' => __('Evaluation'),
		'email_contact' => __('E-mail'),
		'phone' => __('Téléphone'),
		'mobile' => __('Mobile'),
		'fax' => __('Fax'),
		'skype' => __('Skype'),
		'video' => __('Vidéo de présentation'),
		'qr_code' => __('Enregistrer sur votre smartphone')
	);
	
	echo $this->element('generic/view-display-elements', array('displayElements' => $displayElements));
	?>
	
	<p class="<?php echo $pluralVar;?>-bug-report"><?php echo $this->Html->image('icons/silk/bug.png');?>&nbsp;<?php echo $this->Html->link(__('Signaler une erreur ou une modification'), array('controller' => 'contact', '?' => 'subject='.$this->Html->url(array('action' => 'view', 'id' => $item[$modelClass]['id'], 'slug' => slug($title)))), array('rel' => 'nofollow', 'class' => 'fancybox'));?></p>
	
	<?php echo $this->element('shops'.DS.'items-browse');?>
	
	<?php if(isset($item['Event']) && !empty($item['Event'])):?>
		<h2><?php echo __('Evénements associés');?></h2>
		<ul>
		<?php foreach($item['Event'] as $event):?>
			<?php 
			$title = getPreferedLang($event);
			?>
			<li><?php echo $this->Html->link($title, array('controller' => 'events', 'action' => 'view', 'id' => $event['id'], 'slug' => slug($title)));?> - <span class="underline"><?php echo __('Du');?></span>: <?php echo $this->MyHtml->niceDate($event['date_start'], '%e %B %Y');?> - <span class="underline"><?php echo __('Au');?></span>: <?php echo $this->MyHtml->niceDate($event['date_end'], '%e %B %Y');?></li>
		<?php endforeach;?>
		</ul>
	<?php endif;?>
	
	<?php echo $this->element('generic'.DS.'nearby');?>
	
	<?php if(!empty($item[$modelClass]['geo_lat']) && !empty($item[$modelClass]['geo_lon'])):?>
		<h2><?php echo __('Carte');?></h2>
		<?php echo $this->element('google-maps', array('lat' => $item[$modelClass]['geo_lat'], 'lon' => $item[$modelClass]['geo_lon']));?>
	<?php endif;?>
	
	<?php echo $this->element('generic'.DS.'comments');?>

	<?php echo $this->element('generic'.DS.'created-modified');?>
</div>