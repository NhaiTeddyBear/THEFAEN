<?php
App::uses('AppModel', 'Model');
/**
 * Foods Model
 *
 */
class Food extends AppModel
{
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}