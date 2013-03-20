<?php
class Leave extends AppModel {
	public  $name = 'Leave';
	public $uses = 'leaves';
	public  $displayField = 'title';
	public  $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'start' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		)
	);

	var $belongsTo = array(
 		'EventType' => array(
			'className' => 'EventType',
			'foreignKey' => 'event_type_id'
		)
	);

}
?>
