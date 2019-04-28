<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 26/03/2019
 * Time: 12:03
 */
class Validator {
    private function __construct()
    {}
    public static function validate(?array &$inputs,array $fields): bool{
            if(!$inputs){ return false; }
            foreach ($fields as $field){
                echo $inputs[$field];
                if(!isset($inputs[$field])){
                    return false;
                }
            }
            return true;
        }
}