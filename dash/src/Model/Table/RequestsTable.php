<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class RequestsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('People', [
            'foreignKey' => 'person_id'
        ]);
		$this->addBehavior('Utils.Uploadable', [
		  'avatar' => [
			'path' => '{ROOT}{DS}{WEBROOT}{DS}img{DS}{model}{DS}{field}{DS}',
			'removeFileOnUpdate' => true,
			'removeFileOnDelete' => true, 
			'fields' => [
				'directory' => 'avatar_directory',
				'url' => 'avatar_url',
				'type' => 'avatar_type',
				'size' => 'avatar_size',
				'fileName' => 'avatar_name'
			  ]
			],
		  ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->notEmpty('category')
            ->notEmpty('description')
            ->notEmpty('property_address');

        return $validator;
    }

    // src/Model/Table/ArticlesTable.php
    public function isOwnedBy($articleId, $userId)
    {
        return $this->exists(['id' => $articleId, 'user_id' => $userId]);
    }

}

?>