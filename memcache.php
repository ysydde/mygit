
<?php
/**
*  memcache ʹ��
*/
$memcache = new Memcache;
$memcache->connect('localhost', 11211) or die ("Could not connect");

$version = $memcache->getVersion();
echo "Server's version: ".$version."<br/>\n";

$tmp_object = new stdClass;
$tmp_object->str_attr = 'test';
$tmp_object->int_attr = 123;

//$memcache->set('key', $tmp_object, MEMCACHE_COMPRESSED, 50) or die ("Failed to save data at the server");
$memcache->set('key', $tmp_object, false, 50) or die ("Failed to save data at the server");
echo "Store data in the cache (data will expire in 10 seconds)<br/>\n";

$get_result = $memcache->get('key');
echo "Data from the cache:<br/>\n";

if($get_result){
	var_dump($get_result);
}else {
	echo "no data";
}


