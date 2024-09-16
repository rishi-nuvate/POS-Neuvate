<?php

if (!function_exists('textInputField')) {
    function textInputField($class, $label, $inputType, $name, $id, $placeholder, $star = '', $inputClass='', $defaultValue = '', $required = '', $readonly = null)
    {
        $value = old($name, $defaultValue);
        return '
        <div class="' . $class . '">
            <label class="form-label" for="' . $id . '">' . $label . '</label>
            <span class="text-danger"><strong>' . $star . '</strong></span>
            <input type="' . $inputType . '" id="' . $id . '" name="' . $name . '" class= "form-control ' .$inputClass .' " placeholder="' . $placeholder . '" value="' . $value . '" ' . $required . '' . $readonly . ' />
        </div>';
    }
}

if (!function_exists('selectField')) {
    function selectField($class, $label, $name, $id, $selectClass, $placeholder , $options = [], $star = '', $defaultValue = '', $required = '', $readonly = null)
    {
        $value = old($name, $defaultValue);
        $readonlyAttr = $readonly ? 'disabled' : '';

        $optionsHtml = '';
        foreach ($options as $optionValue => $optionLabel) {
            $selected = $optionValue == $value ? 'selected' : '';
            $optionsHtml .= '<option value="' . $optionValue . '" ' . $selected . '>' . $optionLabel . '</option>';
        }

        return '
        <div class="' . $class .'">
            <label class="form-label" for="' . $id . '">' . $label . '</label>
            <span class="text-danger"><strong>' . $star .'</strong></span>
            <select id="' . $id . '" name="' . $name . '" " data-placeholder="' . $placeholder . '"class="' .$selectClass. ' " ' . $required . ' ' . $readonlyAttr . '>
                ' . $optionsHtml . '
            </select>
        </div>';
    }

}

