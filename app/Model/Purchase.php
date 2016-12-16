<?php
App::uses('AppModel', 'Model');
/**
 * Purchase Model
 *
 * @property Food $Foods
 * @property User $User
 */
class Purchase extends AppModel {
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'food_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'price' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'membership_point' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'date_created' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            ),
        ),
    );
    // The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Foods' => array(
            'className' => 'Foods',
            'foreignKey' => 'food_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}