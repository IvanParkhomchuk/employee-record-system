<?php
    namespace models;

    use core\Core;

    class District {
        protected static $tableName = 'district';

        public static function getDistricts() {
            $rows = Core::getInstance()->db->select(self::$tableName);

            return $rows;
        }

        public static function getDistrictById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function addDistrict($name) {
            Core::getInstance()->db->insert(self::$tableName, [
                'name' => $name
            ]);
        }

        public static function updateDistrict($id, $newName) {
            Core::getInstance()->db->update(self::$tableName, [
                'name' => $newName
            ], [
                'id' => $id
            ]);
        }

        public static function deleteDistrict($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'id' => $id
            ]);
        }

    }