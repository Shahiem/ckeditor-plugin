<?php namespace ShahiemSeymor\Ckeditor\Models;

use Model;

class Settings extends Model
{
	public $implement      = ['Backend.Behaviors.UserPreferencesModel'];
	public $settingsCode   = 'shahiemseymor::ckeditor.preferences';
	public $settingsFields = 'fields.yaml';
	protected $cache       = [];
}