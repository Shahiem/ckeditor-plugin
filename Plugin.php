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
use System\Classes\PluginManager;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'CKeditor',
            'description' => 'CKEditor is a ready-for-use HTML text editor designed to simplify web content creation',
            'author'      => 'ShahiemSeymor'
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
                'class'       => 'ShahiemSeymor\Ckeditor\Models\Settings'
            ]
        ];
    }

    public function boot()
    {
        App::register('Barryvdh\Elfinder\ElfinderServiceProvider');

        Event::listen('backend.form.extendFields', function($form) 
        {
            $editors = ['richeditor', 'codeeditor', 'Eein\Wysiwyg\FormWidgets\Trumbowyg'];
            if($form->model instanceof \ShahiemSeymor\Ckeditor\Models\Settings)
            {
                if(PluginManager::instance()->hasPlugin('Radiantweb.Problog'))
                {
                    $form->addFields([
                        'show_radiantweb_problog_as_wysiwyg' => [
                            'label'     => 'Use Radiantweb - ProBlog',
                            'type'      => 'switch',
                            'span'      => 'auto',
                            'default'   => 'false',
                            'comment'   => 'If checked, the content entries will use the CKEditor.',
                            'tab'       => 'Content'
                        ]
                    ], 'primary');
                }

                if(PluginManager::instance()->hasPlugin('Radiantweb.Proevents'))
                {
                    $form->addFields([
                        'show_radiantweb_proevents_as_wysiwyg' => [
                            'label'     => 'Use Radiantweb - ProEvents',
                            'type'      => 'switch',
                            'span'      => 'auto',
                            'default'   => 'false',
                            'comment'   => 'If checked, the content entries will use the CKEditor.',
                            'tab'       => 'Content'
                        ]
                    ], 'primary');
                }

                if(PluginManager::instance()->hasPlugin('RainLab.Pages'))
                {
                    $form->addFields([
                        'show_rainlab_pages_as_wysiwyg' => [
                            'label'     => 'Use RainLab - Static Pages',
                            'type'      => 'switch',
                            'span'      => 'auto',
                            'default'   => 'false',
                            'comment'   => 'If checked, the content entries will use the CKEditor.',
                            'tab'       => 'Content'
                        ]
                    ], 'primary');
                }

                if(PluginManager::instance()->hasPlugin('RainLab.Blog'))
                {
                    $form->addFields([
                        'show_rainlab_blog_as_wysiwyg' => [
                            'label'     => 'Use RainLab - Blog',
                            'type'      => 'switch',
                            'span'      => 'auto',
                            'default'   => 'false',
                            'comment'   => 'If checked, the content entries will use the CKEditor.',
                            'tab'       => 'Content'
                        ]
                    ], 'primary');
                }

                if(PluginManager::instance()->hasPlugin('ShahiemSeymor.Maintenance'))
                {
                    $form->addFields([
                        'show_shahiem_maintenance_as_wysiwyg' => [
                            'label'     => 'Use ShahiemSeymor - Maintenance',
                            'type'      => 'switch',
                            'span'      => 'auto',
                            'default'   => 'false',
                            'comment'   => 'If checked, the content entries will use the CKEditor.',
                            'tab'       => 'Content'
                        ]
                    ], 'primary');
                }

            }

            if(Settings::get('show_cms_pages_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Page')
            {
                return static::useEditor($form, $editors);
            }

            if(Settings::get('show_cms_content_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Content')
            {
                return static::useEditor($form, $editors);
            }

            if(Settings::get('show_cms_partial_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Partial')
            {
                return static::useEditor($form, $editors);
            }

            if(Settings::get('show_cms_layouts_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Layout')
            {
                return static::useEditor($form, $editors);
            }

            if(Settings::get('show_rainlab_blog_as_wysiwyg', false) && $form->model instanceof \RainLab\Blog\Models\Post)
            {
                return static::useEditor($form, $editors);
            }

            if(Settings::get('show_shahiem_maintenance_as_wysiwyg', false) && $form->model instanceof \ShahiemSeymor\Maintenance\Models\Settings)
            {
                return static::useEditor($form, ['richeditor', 'Eein\Wysiwyg\FormWidgets\Trumbowyg']);
            }

            if(Settings::get('show_rainlab_pages_as_wysiwyg', false) && get_class($form->config->model) == 'RainLab\Pages\Classes\Page')
            {
                return static::useEditor($form, $editors);
            }

            if(Settings::get('show_radiantweb_problog_as_wysiwyg', false) && $form->model instanceof \Radiantweb\Problog\Models\Post)
            {
                return static::useEditor($form, $editors);
            }
            
            if(Settings::get('show_radiantweb_proevents_as_wysiwyg', false) && $form->model instanceof \Radiantweb\Proevents\Models\Event)
            {
               return static::useEditor($form, $editors);
            }
        });
    }

    public static function useEditor($form, $editor)
    {
        foreach ($form->getFields() as $field)
        {
            if (empty($field->config['type']) || !in_array($field->config['type'], $editor))
            continue;

            $field->config['type'] = $field->config['widget'] = 'ShahiemSeymor\Ckeditor\FormWidgets\Wysiwyg';
        }
    }
}
