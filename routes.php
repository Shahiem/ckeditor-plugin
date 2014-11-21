<?php
use Backend\Facades\BackendAuth;

Route::filter('auth', function()
{
    if (!BackendAuth::check())
    {
        return Redirect::to(Backend::url());
    }
});

Route::group(array('before' => 'auth'), function() {
	Route::get('elfinder',                            'Barryvdh\Elfinder\ElfinderController@showIndex');
	Route::any('elfinder/connector',                  'Barryvdh\Elfinder\ElfinderController@showConnector');
	Route::get('elfinder/ckeditor4',                  'Barryvdh\Elfinder\ElfinderController@showCKeditor4');
	Route::get('elfinder/standalonepopup/{input_id}', 'Barryvdh\Elfinder\ElfinderController@showPopup');
});