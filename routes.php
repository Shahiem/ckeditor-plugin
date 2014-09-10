<?php
Route::get('elfinder',           'Barryvdh\Elfinder\ElfinderController@showIndex');
Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');
Route::get('elfinder/ckeditor4', 'Barryvdh\Elfinder\ElfinderController@showCKeditor4');