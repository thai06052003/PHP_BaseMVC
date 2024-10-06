<?php
class Request
{
    private $__rules = [], $__message = [];
    public $errors = [];
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function isPost()
    {
        if ($this->getMethod() == 'post') {
            return true;
        }
        return false;
    }
    public function isGet()
    {
        if ($this->getMethod() == 'get') {
            return true;
        }
        return false;
    }
    public function getFields()
    {
        $dataFields = [];
        if ($this->isGet()) {
            // Lấy dữ liệu với phương thức get
            if (!empty($_GET)) {
                echo 'get';
                foreach ($_GET as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        } else if ($this->isPost()) {
            // Lấy dữ liệu với phương thức post
            if (!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $dataFields;
    }
    // set rules
    public function rules($rules = [])
    {
        $this->__rules = $rules;
    }
    // set message
    public function message($message)
    {
        $this->__message = $message;
        //$validate = $this->validate();
    }
    // Run validate
    public function validate()
    {
        $this->__rules = array_filter($this->__rules);
        $checkValidate = true;
        if (!empty($this->__rules)) {
            $dataFields = $this->getFields();
            
            foreach ($this->__rules as $fieldName => $ruleItem) {
                $ruleItemArr = explode('|', $ruleItem);
                foreach ($ruleItemArr as $rule) {
                    $rulesArr = explode(':', $rule);
                    $ruleName = null;
                    $rulevalue = null;

                    $ruleName = reset($rulesArr);
                    if (count($rulesArr) > 1) {
                        $rulevalue = end($rulesArr);
                    }
                    if ($ruleName == 'required') {
                        if (empty(trim($dataFields[$fieldName]))) {
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }
                    if ($ruleName == 'min') {
                        if (strlen(trim($dataFields[$fieldName])) < $rulevalue) {
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }
                    if ($ruleName == 'max') {
                        if (strlen(trim($dataFields[$fieldName])) > $rulevalue) {
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }
                    if ($ruleName == 'email') {
                        if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)) {
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }
                    if ($ruleName == 'match') {
                        if (trim($dataFields[$fieldName]) != trim($dataFields[$rulevalue])) {
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }
                }
            }
        }
        if (!empty($this->errors)) {
            $checkValidate = false;
        }
        return $checkValidate;
    }
    // Get errors
    public function error($fieldName='')
    {
        if (!empty($this->errors)) {
            if (empty($fieldName)) {
                foreach($this->errors as $key=>$error) {
                    $errorsArr[$key] = reset($error);
                }
                return $errorsArr;
                //return $this->errors;
            }
            return reset($this->errors[$fieldName]);
        }
        return false;
    }
    // Set error
    public function setErrors($fieldName, $ruleName) {
        $this->errors[$fieldName][$ruleName] = $this->__message[$fieldName . '.' . $ruleName];
    }
}
