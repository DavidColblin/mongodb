<h1>MongoDb testing</h1>



<?php

//http://www.phpfreaks.com/tutorial/an-introduction-to-php-and-mongodb

//initialise database instance
	$mongo = new Mongo();

//create database
	$db = $mongo->ebooks;  
	//$db = $mongo->selectDB('ebooks');

//create database table (i.e. collection)
	//OR :: $collection = $db->ebooks;
	$ebooks = $db->selectCollection('ebooks');
	

//creating a table named authors

	$authors = $db->authors;
	$author = array(
		'first_name'=>'Thomas',
		'last_name' =>'Johnson',
		'website'=>'http://www.tomfmason.net'
	);

	$author_id = $authors->insert($author);

	echo  "returned author id is $author_id";
	
//creating insert for ebooks with author_id as link.

	
	$ebook = array(
		'title'=>'php and mongo: A simple scalable CMS tutorial',
		'description'=>"Some nice description here. ",
		'author_id'=>$author_id,
		'reviews'=>array()
	);
	
	$ebook_id = $ebooks->insert($ebook);
	
	echo "<br/>ebook_id is $ebook_id";
