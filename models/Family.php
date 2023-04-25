<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class Family
    {
        protected static $tableName = 'family';

        public static function addFamilyMember($row) {

            $fieldsList = [
                'familyMember', 'memberFullname', 'memberBirthdate', 'employee_id', 'familyStatus'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::setEmployeeTable($row, $fieldsList, self::$tableName);
        }

        public static function updateFamily($id, $row) {
            $fieldsList = [
                'familyStatus', 'familyMember', 'memberFullname', 'memberBirthdate'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::upgradeEmployeeTable($id, $row, $fieldsList, self::$tableName);
        }

        public static function getFamilyById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows;
            else return null;
        }

        public static function deleteFamily($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }