<?php
    namespace models;

    use core\Core;

    class Position {
        protected static $tableName = 'position';

        public static function addPosition($name) {
            Core::getInstance()->db->insert(self::$tableName, [
                'name' => $name
            ]);
        }

        public static function getPositionById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function getPositions() {
            $rows = Core::getInstance()->db->select(self::$tableName);

            return $rows;
        }
    }