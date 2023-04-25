<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class Position {
        protected static $tableName = 'position';

        public static function addPosition($row) {
            $fieldsList = [
                'name', 'department_id'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
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

        public static function getSomePositions($department_id) {
            $id_array = [];

            if (isset($department_id)) $id_array['department_id'] = $department_id;

            $positionRows = Core::getInstance()->db->select(self::$tableName, '*', $id_array);

            return $positionRows;
        }

        public static function updatePosition($id, $newName) {
            Core::getInstance()->db->update(self::$tableName, [
                'name' => $newName
            ], [
                'id' => $id
            ]);
        }

        public static function deletePosition($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'id' => $id
            ]);
        }
    }