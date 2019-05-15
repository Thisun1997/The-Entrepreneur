<?php
class Validate {
    private $_passed = false,
    $_errors = array(),
    $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();

    }
    public function check($source, $items = array()){
        foreach($items as $item =>$rules){
            foreach($rules as $rule =>$rule_value) {
                
                
                $item=escape($item);
                if($rule === 'requiredsel' && empty($source[$item])){
                    $this->adderror(" - {$item} should be selected");
                }
                else if($rule === 'requiredchk' && empty($source[$item])){
                    $this->adderror(" - <strong>Agree to terms of user</strong>");
                }
                else if($rule === 'requiredemaillog' && empty($source[$item])){
                    $this->adderror(" - email is required");
                }
                else if($rule==='required'&& empty(trim($source[$item]))) {
                    $this->adderror(" - {$item} is required");
                }else if (!empty(trim($source[$item]))){
                    $value = trim($source[$item]);
                    switch($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError(" - {$item} must be a minimum of {$rule_value} characters.");
                            }
                        break;
                        case'max':
                        if(strlen($value) > $rule_value) {
                            $this->addError(" - {$item} must be a maximum of {$rule_value} characters.");
                            }
                        break;
                        case'matches':
                        if($value != $source[$rule_value]) {
                         $this->addError(" - two passwords do not match.");
                           }
                        break;
                        case'unique':
                           $check=$this->_db->get($rule_value, array($item, '=', $value));
                           if($check->count()) {
                               $this->addError(" - {$item} already exists.");
                           }
                        break;
                        case 'validity':
                            if (!filter_var($value, $rule_value)) {
                                $this->addError(" - invalid email address.");
                            }
                        break;

                    }
                    if ($rule === 'limit'){
                        $uc = 0; $lc = 0; $num = 0; $other = 0;
                        for ($i = 0, $j = strlen($value); $i < $j; $i++) {
                            $c = substr($value,$i,1);
                            if (preg_match('/^[[:upper:]]$/',$c)) {
                                $uc++;
                            } elseif (preg_match('/^[[:lower:]]$/',$c)) {
                                $lc++;
                            } elseif (preg_match('/^[[:digit:]]$/',$c)) {
                                $num++;
                            } else {
                                $other++;
                            }
                        }
                        if ($lc == 0 || $uc==0 || $num==0 || $other == 0){
                            $this->addError(" - Your password should contain at least one lowercase letter, uppercase letter, number and special charachter.");
                        }
                        
                    }
                    
                }

            }
        }
        if(empty($this->errors())){
            $this->_passed=true;
        }
        return $this;

    }

    private function adderror($error) {
        $this->_errors[]=$error;
    }

    public function errors(){
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }

}