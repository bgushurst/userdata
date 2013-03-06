<?php
/**
 * User Data Library
 *
 * @copyright Copyright (c) 2013 Brad Gushurst
 * @license MIT License
 */

namespace UserData;

interface IUserData
{

	public function setValue( $value );
	public function getValue();

	public function getValidators();
	public function addValidator( IValidator $validator );

	public function getFilters();
	public function addFilter( IFilter $filter );

	public function getSanitizers();
	public function addSanitizer( ISanitizer $sanitizer );

}