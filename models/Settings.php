<?php namespace ShahiemSeymor\Ckeditor\Models;

use Model;

class Settings extends Model
{
	public $implement      = ['Backend.Behaviors.UserPreferencesModel'];
	public $settingsCode   = 'shahiemseymor::ckeditor.preferences';
	public $settingsFields = 'fields.yaml';

	public function getLanguageOptions()
	{
	    return [
		    		'af' => 'shahiemseymor.ckeditor::lang.language.af',
	                'ar' => 'shahiemseymor.ckeditor::lang.language.ar',
	                'eu' => 'shahiemseymor.ckeditor::lang.language.eu',
	                'bn' => 'shahiemseymor.ckeditor::lang.language.bn',
	                'bs' => 'shahiemseymor.ckeditor::lang.language.bs',
	                'bg' => 'shahiemseymor.ckeditor::lang.language.bg',
	                'ca' => 'shahiemseymor.ckeditor::lang.language.ca',
	                'zh-cn' => 'shahiemseymor.ckeditor::lang.language.zh-cn',
	                'zh' => 'shahiemseymor.ckeditor::lang.language.zh',
	                'hr' => 'shahiemseymor.ckeditor::lang.language.hr',
	                'cs' => 'shahiemseymor.ckeditor::lang.language.cs',
	                'da' => 'shahiemseymor.ckeditor::lang.language.da',
	                'nl' => 'shahiemseymor.ckeditor::lang.language.nl',
	                'en' => 'shahiemseymor.ckeditor::lang.language.en',
	                'en-au' => 'shahiemseymor.ckeditor::lang.language.en-au',
	                'en-ca' => 'shahiemseymor.ckeditor::lang.language.en-ca',
	                'en-gb' => 'shahiemseymor.ckeditor::lang.language.en-gb',
	                'eo' => 'shahiemseymor.ckeditor::lang.language.eo',
	                'et' => 'shahiemseymor.ckeditor::lang.language.et',
	                'fo' => 'shahiemseymor.ckeditor::lang.language.fo',
	                'fi' => 'shahiemseymor.ckeditor::lang.language.fi',
	                'fr' => 'shahiemseymor.ckeditor::lang.language.fr',
	                'fr-ca' => 'shahiemseymor.ckeditor::lang.language.fr-ca',
	                'gl' => 'shahiemseymor.ckeditor::lang.language.gl',
	                'ka' => 'shahiemseymor.ckeditor::lang.language.ka',
	                'de' => 'shahiemseymor.ckeditor::lang.language.de',
	                'el' => 'shahiemseymor.ckeditor::lang.language.el',
	                'gu' => 'shahiemseymor.ckeditor::lang.language.gu',
	                'he' => 'shahiemseymor.ckeditor::lang.language.he',
	                'hi' => 'shahiemseymor.ckeditor::lang.language.hi',
	                'hu' => 'shahiemseymor.ckeditor::lang.language.hu',
	                'is' => 'shahiemseymor.ckeditor::lang.language.is',
	                'it' => 'shahiemseymor.ckeditor::lang.language.it',
	                'ja' => 'shahiemseymor.ckeditor::lang.language.ja',
	                'km' => 'shahiemseymor.ckeditor::lang.language.km',
	                'ko' => 'shahiemseymor.ckeditor::lang.language.ko',
	                'lv' => 'shahiemseymor.ckeditor::lang.language.lv',
	                'lt' => 'shahiemseymor.ckeditor::lang.language.lt',
	                'ms' => 'shahiemseymor.ckeditor::lang.language.ms',
	                'mn' => 'shahiemseymor.ckeditor::lang.language.mn',
	                'no' => 'shahiemseymor.ckeditor::lang.language.no',
	                'nb' => 'shahiemseymor.ckeditor::lang.language.nb',
	                'fa' => 'shahiemseymor.ckeditor::lang.language.fa',
	                'pl' => 'shahiemseymor.ckeditor::lang.language.pl',
	                'pt-br' => 'shahiemseymor.ckeditor::lang.language.pt-br',
	                'pt' => 'shahiemseymor.ckeditor::lang.language.pt',
	                'ro' => 'shahiemseymor.ckeditor::lang.language.ro',
	                'ru' => 'shahiemseymor.ckeditor::lang.language.ru',
	                'sr' => 'shahiemseymor.ckeditor::lang.language.sr',
	                'sr-latn' => 'shahiemseymor.ckeditor::lang.language.sr-latn',
	                'sk' => 'shahiemseymor.ckeditor::lang.language.sk',
	                'sl' => 'shahiemseymor.ckeditor::lang.language.sl',
	                'es' => 'shahiemseymor.ckeditor::lang.language.es',
	                'sv' => 'shahiemseymor.ckeditor::lang.language.sv',
	                'th' => 'shahiemseymor.ckeditor::lang.language.th',
	                'tr' => 'shahiemseymor.ckeditor::lang.language.tr',
	                'uk' => 'shahiemseymor.ckeditor::lang.language.uk',
	                'vi' => 'shahiemseymor.ckeditor::lang.language.vi',
	                'cy' => 'shahiemseymor.ckeditor::lang.language.cy'
	    		];
	}
}