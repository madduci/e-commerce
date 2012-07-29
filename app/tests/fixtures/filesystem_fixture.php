<?php 
/* SVN FILE: $Id$ */
/* Filesystem Fixture generated on: 2009-08-26 12:06:26 : 1251281186*/

class FilesystemFixture extends CakeTestFixture {
	var $name = 'Filesystem';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'file' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'descrizione' => array('type'=>'string', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'filesystems_descrizione_idx' => array('column' => 'descrizione', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'file'  => 'Lorem ipsum dolor sit amet',
		'descrizione'  => 'Lorem ipsum dolor sit amet'
	));
}
?>