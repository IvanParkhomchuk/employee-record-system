<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class Vacation
    {
        protected static $tableName = 'vacation';

        public static function addVacation($row) {
            $fieldsList = [
                'vacationType', 'workedPeriodStart', 'workedPeriodEnd', 'vacationStart', 'vacationEnd',
                'vacationOrder', 'employee_id'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::setEmployeeTable($row, $fieldsList, self::$tableName);
        }

        public static function updateVacation($id, $row) {
            $fieldsList = [
                'vacationType', 'workedPeriodStart', 'workedPeriodEnd', 'vacationStart', 'vacationEnd',
                'vacationOrder'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::upgradeEmployeeTable($id, $row, $fieldsList, self::$tableName);
        }

        public static function getVacationById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows;
            else return null;
        }

        public static function deleteVacation($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }
