<?php
    namespace core;

    class Utils {
        public static function filterArray($array, $fieldsList) {
            $newArray = [];

            $row = array_diff($array, array(''));

            foreach ($row as $key => $value) {
                if (in_array($key, $fieldsList)) $newArray[$key] = $value;
            }

            return $newArray;
        }
    }