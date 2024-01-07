<?php

namespace App\classes;


class Validation
{

    protected $_data     = array();
    protected $_errors   = array();



    public function key($key)
    {
        $this->_data['key'] = $key;
        return $this;
    }

    public function value($value)
    {
        $this->_data['value'] = $value;
        return $this;
    }

    public function required()
    {
        if (empty($this->_data['value'])) {
            $this->_errors[$this->_data['key']][] = $this->_data['key'] . "  is required";
        }
        return $this;
    }

    public function min($length, $inclusive = false)
    {
        $this->_data['min'] = $length;
        $verify = ($inclusive === true ? strlen($this->_data['value']) >= $length : strlen($this->_data['value']) > $length);

        if (!$verify) {
            $this->_errors[$this->_data['key']][] = $this->_data['key'] . " should be more than $length characters";
        }

        return $this;
    }

    public function max($length, $inclusive = false)
    {
        $checkMaxAndMin = $this->_data['min'] < $length ? true : false;

        $verify = ($inclusive === true ? strlen($this->_data['value']) <= $length : strlen($this->_data['value']) < $length);

        if (!$checkMaxAndMin) {
            $this->_errors[$this->_data['key']][] = $this->_data['key'] . "  min should be less tha max";
        } else {
            if (!$verify) {
                $this->_errors[$this->_data['key']][] = $this->_data['key'] . " should be less than $length characters";
            }
        }

        return $this;
    }

    public function between($minValue, $maxValue, $inclusive = false)
    {
        $this->_data['min'] = $minValue;
        $this->_data['max'] = $maxValue;

        $verify = ($inclusive === true ?
            ($this->_data['value'] >= $minValue && $this->_data['value'] <= $maxValue) : ($this->_data['value'] > $minValue && $this->_data['value'] < $maxValue)
        );

        if (!$verify) {
            $this->_errors[$this->_data['key']][] = $this->_data['key'] . " should be between $minValue and $maxValue";
        }

        return $this;
    }

    public function lengthBetween($minLength, $maxLength, $inclusive = false)
    {
        $this->_data['min_length'] = $minLength;
        $this->_data['max_length'] = $maxLength;

        $length = strlen($this->_data['value']);
        $verify = ($inclusive === true ?
            ($length >= $minLength && $length <= $maxLength) : ($length > $minLength && $length < $maxLength)
        );

        if (!$verify) {
            $this->_errors[$this->_data['key']][] = $this->_data['key'] . " length should be between $minLength and $maxLength characters";
        }

        return $this;
    }

    public function isEmail()
    {
        if (filter_var($this->_data['value'], FILTER_VALIDATE_EMAIL) === false) {
            $this->_errors[$this->_data['key']][] = $this->_data['key'] . " Not a valid Email";
        }
        return $this;
    }

    public function IsPasswordsMatch($value)
    {
        $password = trim($this->_data['value']);
        $confirmPassword = trim($value);

        if ($password === $confirmPassword) {
            return $this;
        } else {
            return $this->_errors[$this->_data['key']][] = $this->_data['key'] . " Do Not Match With Password";
        }
    }


    public function isNumber()
    {
        if (!is_numeric($this->_data['value'])) {
            $this->_errors[$this->_data['key']][] = $this->_data['key'] . " is not a valid number";
        }
        return $this;
    }

    public function isUrl()
    {
        if (filter_var($this->_data['value'], FILTER_VALIDATE_URL) === false) {
            $this->_errors[$this->_data['key']][] = $this->_data['key'] . " Not a valid URL";
        }
        return $this;
    }

    public function sanitize($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

        return $data;
    }

    public function isValid()
    {
        if (empty($this->_errors)) return true;
    }

    function isImage()
    {
        $file = $this->_data['value'];
       

        if (empty($file)) {
            $this->_errors[$this->_data['key']][] = "Please select an image file to upload.";
            return $this;
        }

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];

        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "bmp", "webp", "svg");
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            $this->_errors[$this->_data['key']][] = "Only image files with .jpg, .jpeg, .png, .gif, .bmp, .webp, or .svg extensions are allowed.";
        }

        $imageInfo = getimagesize($fileTmpName);
        if (!$imageInfo) {
            $this->_errors[$this->_data['key']][] = "The uploaded file is not a valid image.";
        }

        $maxFileSize = 6 * 1024 * 1024; // 5MB
        if ($fileSize > $maxFileSize) {
            $this->_errors[$this->_data['key']][] = "The uploaded file exceeds the maximum allowed size of 6MB.";
        }

        return $this;
    }


    public function getErrors()
    {
        return $this->_errors;
    }
    public function setError($key, $error)
    {
        $this->_errors[$key][] = $error;

        return $this->_errors;
    }
}
