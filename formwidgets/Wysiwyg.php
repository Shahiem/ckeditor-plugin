<?php namespace ShahiemSeymor\Ckeditor\FormWidgets;

use Backend\Classes\FormWidgetBase;
use ShahiemSeymor\Ckeditor\Models\Settings;

class Wysiwyg extends FormWidgetBase
{
   public function widgetDetails()
    {
        return [
            'name'        => 'CKeditor',
            'description' => 'Renders a wysiwyg field.'
        ];
    }

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('wysiwyg');
    }

    public function prepareVars()
    {
         $this->vars['name']      = $this->formField->getName();
         $this->vars['value']     = $this->model->{$this->fieldName};
         $this->vars['width']     = Settings::instance()->form_width;
         $this->vars['height']    = Settings::instance()->form_height;
         $this->vars['toolbar']   = Settings::instance()->toolbar;
         $this->vars['skin']      = Settings::instance()->skin;
         $this->vars['up_public'] = Settings::instance()->up_public;
         $this->vars['language']  = Settings::instance()->language;
    }

    public function loadAssets()
    {
        $this->addJs('/plugins/shahiemseymor/ckeditor/formwidgets/wysiwyg/assets/ckeditor/ckeditor.js',        'ShahiemSeymor.Ckeditor');
        $this->addJs('/plugins/shahiemseymor/ckeditor/formwidgets/wysiwyg/assets/ckeditor/adapters/jquery.js', 'ShahiemSeymor.Ckeditor');
        $this->addJs('/plugins/shahiemseymor/ckeditor/formwidgets/wysiwyg/assets/javascript/editor.js',        'ShahiemSeymor.Ckeditor');
    }
    
}