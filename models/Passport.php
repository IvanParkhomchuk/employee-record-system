<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class Passport
    {
        protected static $tableName = 'passport';

        public static function addPassport($row) {
            $fieldsList = [
                'employee_id', 'passportSeries', 'passportNumber', 'passportIssuedBy', 'passportIssueDate'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updatePassport($id, $row) {
            $fieldsList = [
                'passportSeries', 'passportNumber', 'passportIssuedBy', 'passportIssueDate'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'employee_id' => $id
            ]);
        }

        public static function getPassportById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deletePassport($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }