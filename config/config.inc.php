<?php

namespace ephedra\config {
	

	/**
	 * String value indicates the database path
	 *
	 * @var 		string
	 * @example		mysql:host=localhost;dbname=mydatabase
	 * @example		sqlite:../db/ephedra.sqlite.db
	 * @example		sqlite:/tmp/ephedra.sqlite.db
	 * @since  		p.o.c
	 */
	define('DATABASE_PATH', 'sqlite:../db/ephedra.sqlite.db');
	
	/**
	 * String value determines the database user name
	 *
	 * @var 		string
	 * @since  		p.o.c
	 */
	define('DATABASE_USER_NAME', '');
	
	/**
	 * String value determines the database password
	 *
	 * @var 		string
	 * @since  		p.o.c
	 */
	define('DATABASE_PASSWORD', '');
	
}
?>