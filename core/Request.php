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
        /* echo '<pre>';
        print_r($this->__rules);
        echo '</pre>'; */
        if (!empty($this->__rules)) {
            $dataFields = $this->getFields();
            echo '<pre>';
            print_r($dataFields);
            echo '</pre>';
            echo '<pre>';
            print_r($this->__rules);
            echo '</pre>';

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
                        if (empty($dataFields[$fieldName])) {  // ko co du lieu
                            $this->errors[$fieldName][$ruleName] = $this->__message[$fieldName . '.' . $ruleName];
                        }
                    }
                }
            }
        }
    }
    // Get errors
    public function error($fieldName)
    {
        return $fieldName;
    }
}
