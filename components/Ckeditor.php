<?php namespace ShahiemSeymor\Ckeditor\Components;

use Cms\Classes\ComponentBase;

class Ckeditor extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Editable',
            'description' => 'Change the redactor editor to CKeditor'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->addJs('/plugins/shahiemseymor/ckeditor/formwidgets/wysiwyg/assets/ckeditor/ckeditor.js');
    }
}