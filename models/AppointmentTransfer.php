<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class AppointmentTransfer
    {
        protected static $tableName = 'appointment_transfer';

        public static function addTransfer($row) {
            $fieldsList = [
                'transferDate', 'transferStructuralDivisionName', 'position_id', 'positionCode',
                'transferSalary', 'transferOrder', 'employee_id'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::setEmployeeTable($row, $fieldsList, self::$tableName);
        }

        public static function updateTransfer($id, $row) {
            $fieldsList = [
                'transferDate', 'transferStructuralDivisionName', 'position_id', 'positionCode', 'transferSalary',
                'transferOrder'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::upgradeEmployeeTable($id, $row, $fieldsList, self::$tableName);
        }

        public static function getTransferById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows;
            else return null;
        }

        public static function deleteTransfer($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }