<?php
Configure::write('Modules.titles', array(
	'users' => __('Membres'),
	'links' => __('Annuaire'),
	'ads' => __('Annonces'),
	'photos' => __('Photos'),
	'games' => __('Jeux gratuits'),
	'categories' => __('Catégories'),
	'file_manager' => __('Gestionnaire de fichiers'),
	'contact' => __('Contact'),
));

Configure::write('Crud.translations', array(
	'create' => array(
		'success' => array(
			'message' => __('Enregistrement ajouté avec succès !'),
		),
		'error' => array(
			'message' => __('Veuillez corriger les erreurs ci-dessous.'),
		)
	),
	'update' => array(
		'success' => array(
			'message' => __('Enregistrement modifié avec succès !'),
		),
		'error' => array(
			'message' => __('Veuillez corriger les erreurs ci-dessous.'),
		)
	),
	'delete' => array(
		'success' => array(
			'message' => __('Enregistrement supprimé avec succès !'),
		),
		'error' => array(
			'message' => __('La suppression de l\'enregistrement a échoué.'),
		)
	),
	'find' => array(
		'error' => array(
			'message' => __('Enregistrement non trouvé.'),
		)
	),
	'error' => array(
		'invalid_http_request' => array(
			'message' => __('Requête HTTP non valide'),
		),
		'invalid_id' => array(
			'message' => __('Id non valide'),
		)
	)
));