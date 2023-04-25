<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class ResidenceStateReg
    {
        protected static $tableName = 'residence_state_registration';

        public static function addResidenceStateReg($row) {
            $fieldsList = [
                'employee_id', 'regionStateRegistration', 'cityStateRegistration', 'districtStateRegistration',
                'streetStateRegistration', 'houseStateRegistration', 'apartmentStateRegistration', 'postIndexStateRegistration'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateResidenceStateReg($id, $row) {
            $fieldsList = [
                'regionStateRegistration', 'cityStateRegistration', 'districtStateRegistration',
                'streetStateRegistration', 'houseStateRegistration', 'apartmentStateRegistration', 'postIndexStateRegistration'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'employee_id' => $id
            ]);
        }

        public static function getResidenceStateRegById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deleteResidenceStateReg($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }