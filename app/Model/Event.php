<?php
class Event extends AppModel{
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank',
            'required' => true,
        ),
        'body' => array (
            'rule' => 'notBlank',
            'required' => true,
        )
    );
}
?>