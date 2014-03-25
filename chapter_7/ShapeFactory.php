<?php

abstract class ShapeFactory
{
	static function Create($type, array $sizes)
	{
		switch ($type) {
			case 'rectangle':
				return new Rectangle($sizes[0], $sizes[1]);
				break;
			case 'triangle':
				return new Triangle($sizes[0], $sizes[1], $sizes[2]);
				break;
		}
	}
}
