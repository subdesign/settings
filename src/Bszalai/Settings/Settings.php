<?php namespace Bszalai\Settings;

use Config;

class Settings {

	/**
	 * G as Get setting
	 * 
	 * @return variable 
	 */
	public static function g($name)
	{
		if( is_null($value = Config::get('settings::'.$name)) ) 
		{
			throw new KeyNotFoundException('The config key "'.$name.'" cannot be found');
		}

		return $value;
	}

}