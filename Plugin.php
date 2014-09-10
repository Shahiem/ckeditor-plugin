<?php
/**
 * Created by ShahiemSeymor.
 * Date: 6/9/14
 */
namespace ShahiemSeymor\Ckeditor;

use App;
use Backend;
use Event;
use Illuminate\Foundation\AliasLoader;
use ShahiemSeymor\Ckeditor\Models\Settings;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'CKeditor',
            'description' => 'CKEditor is a ready-for-use HTML text editor designed to simplify web content creation',
            'author'      => 'ShahiemSeymor',
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'ShahiemSeymor\Ckeditor\FormWidgets\Wysiwyg' => [
                'label' => 'Wysiwyg',
                'alias' => 'wysiwyg'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'CKEditor',
                'description' => 'Manage CKEditor preferences.',
                'icon'        => 'icon-paperclip',
                'context'     => 'mysettings',
                'category'    =>  SettingsManager::CATEGORY_MYSETTINGS,
                'class'       => 'ShahiemSeymor\Ckeditor\Models\Settings',
            ]
        ];
    }

    public function boot()
    {
        \App::register('Barryvdh\Elfinder\ElfinderServiceProvider');
        
        Event::listen('backend.form.extendFields', function($form) 
        {
            if(Settings::get('show_cms_pages_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Page')
            {
                return static::useEditor($form);
            }

            if(Settings::get('show_cms_content_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Content')
            {
                return static::useEditor($form);
            }

            if(Settings::get('show_cms_partial_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Partial')
            {
                return static::useEditor($form);
            }

            if(Settings::get('show_cms_layouts_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Layout')
            {
                return static::useEditor($form);
            }

            if(Settings::get('show_rainlab_blog_as_wysiwyg', false) && $form->model instanceof \RainLab\Blog\Models\Post)
            {
                return static::useEditor($form);
            }

            if(Settings::get('show_shahiem_maintenance_as_wysiwyg', false) && $form->model instanceof \ShahiemSeymor\Maintenance\Models\Settings)
            {
                return static::useEditor($form);
            }
        });
    }

    public static function useEditor($form)
    {
        foreach ($form->getFields() as $field )
        {
            if (empty($field->config['type']) || $field->config['type'] != 'codeeditor' && $field->config['type'] != 'Eein\Wysiwyg\FormWidgets\Trumbowyg')
            continue;

            $field->config['type'] = $field->config['widget'] = 'ShahiemSeymor\Ckeditor\FormWidgets\Wysiwyg';
        }
    }
}
