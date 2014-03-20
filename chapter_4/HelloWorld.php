<?php

/**
 * This page defines the HelloWorld class
 *
 * written via Chapter 4
 * @author Justin Page <xjustinpagex@gmail.com>
 * @copyright 2014
 */

/**
 * Hello world class says "Hello, World!" in different languages
 *
 * not a good example of OOP
 */
class HelloWorld
{
	/**
	 * Function that says "Hello, world in different languages
	 *
	 * @param string $language Default is "English"
	 * @return void
	 */
	function sayHello($language = 'English')
	{
		echo '<p>';

		switch ($language) {
			case 'Dutch':
				echo 'Hallo, wereld!';
				break;
			case 'French':
				echo 'Bonjour, monde!';
				break;
			case 'German':
				echo 'Hall, Welt!';
				break;
			case 'Italian':
				echo 'Ciao, mondo!';
				break;
			case 'Spanish':
				echo 'Hola, mundo!';
				break;
			case 'English':
			default:
				echo 'Hello, world!';
				break;
		}

		echo '</p>';
	}
}
