<?php
/**
 * User Data Library
 *
 * Core validator interface to be implemented
 *
 * @category 	UserData
 * @package 	Validator
 * @author 		Brad Gushurst
 * @copyright 	Copyright (c) 2013 Brad Gushurst
 * @license 	MIT License
 */

namespace BRRS\UserData;

interface IValidator
{
	/**
	 * Return true if value passes validation requirements implemented by implementing class
	 * 
	 * If the value fails validation error messages will be available via the getMessages
	 * method for further explanation on why validation failed. 
	 * 
	 * @param mixed $value
	 * @return boolean
	 * @throws Validator_Exception If validation of $value is impossible
	 */
	function isValid( $value );
	
	/**
	 * Returns an array of messages explaining why value did not validate
	 * 
	 * @return array
	 */
	function getMessages();
}