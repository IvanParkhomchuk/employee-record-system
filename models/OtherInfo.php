<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class OtherInfo
    {
        protected static $tableName = 'other_info';

        public static function addOtherInfo($row) {
            $fieldsList = [
                'employee_id', 'pensionInformation', 'additionalInfo', 'firedDate', 'firedReason'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateOtherInfo($id, $row) {
            $fieldsList = [
                'pensionInformation', 'additionalInfo', 'firedDate', 'firedReason'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'employee_id' => $id
            ]);
        }

        public static function getOtherInfoById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deleteOtherInfo($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }