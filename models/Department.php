<?php

    namespace models;

    use core\Core;
    use core\Utils;

    class Department {
        protected static $tableName = 'department';

        public static function getDepartmentById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function getDepartments() {
            $rows = Core::getInstance()->db->select(self::$tableName);

            return $rows;
        }

        public static function getSomeDepartments($district_id) {
            $id_array = [];

            if (isset($district_id)) $id_array['district_id'] = $district_id;

            $departmentRows = Core::getInstance()->db->select(self::$tableName, '*', $id_array);

            return $departmentRows;
        }

        public static function addDepartment($row) {
            $fieldsList = [
                'name', 'district_id'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateDepartment($id, $newName) {
            Core::getInstance()->db->update(self::$tableName, [
                'name' => $newName
            ], [
                'id' => $id
            ]);
        }

        public static function deleteDepartment($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'id' => $id
            ]);


        }

    }