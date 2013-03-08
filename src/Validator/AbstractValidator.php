<?php
/**
 * User Data Library
 *
 * Abstract validator extended by core validator classes
 *
 * @category 	UserData
 * @package 	Validator
 * @author 		Brad Gushurst
 * @copyright 	Copyright (c) 2013 Brad Gushurst
 * @license 	MIT License
 */

namespace BRRS\UserData;

abstract class Validator_AbstractValidator implements IValidator
{
	
	protected $_value;
	
	protected $_messageVariables = array();
	
	protected $_messages = array();
	
	protected $_messageTemplates = array();
	
	protected function _error( $messageKey, $value = null )
	{
		
		if( !isset($this->$_messageTemplates[$messageKey]) )
		{
			throw new Validator_Exception("Invalid message key provided [$messageKey]");
		}
		
		if (is_object($value)) {
			if (!in_array('__toString', get_class_methods($value))) {
				$value = get_class($value) . ' object';
			} else {
				$value = $value->__toString();
			}
		} else {
			$value = implode((array) $value);
		}
		
		$message = str_replace("%value%", $this->_value, $this->$_messageTemplates[$messageKey]);
		foreach ($this->_messageVariables as $ident => $property) {
			$message = str_replace(
					"%$ident%",
					implode(' ', (array) $this->$property),
					$message
			);
		}
		
		return $this;
		
	}
	
	public function getMessages()
	{
		return $this->_messages;
	}
	
	public function __get($property)
	{
		
		if ($property == 'value') {
			return $this->_value;
		}
		
		if (array_key_exists($property, $this->_messageVariables)) {
			return $this->{$this->_messageVariables[$property]};
		}
		
	}
	
}