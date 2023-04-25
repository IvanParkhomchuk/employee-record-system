<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class ActualResidence
    {
        protected static $tableName = 'actual_residence';

        public static function addActualResidence($row) {
            $fieldsList = [
                'employee_id', 'region', 'city', 'district', 'street', 'houseNumber', 'apartmentNumber', 'postIndex'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateActualResidence($id, $row) {
            $fieldsList = [
                'region', 'city', 'district', 'street', 'houseNumber', 'apartmentNumber', 'postIndex'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'employee_id' => $id
            ]);
        }

        public static function getActualResidenceById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deleteActualResidence($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }