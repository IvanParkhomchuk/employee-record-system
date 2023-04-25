<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class MilitaryRecords
    {
        protected static $tableName = 'military_records';

        public static function addMilitaryRecords($row) {
            $fieldsList = [
                'employee_id', 'accountingGroup', 'accountingCategory', 'staff', 'militaryRank',
                'militaryAccountingSpecialtyNumber', 'militaryServiceSuitability', 'registrationDMCommissariatName',
                'actualDMCommissariatName', 'specialAccounting'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateMilitaryRecords($id, $row) {
            $fieldsList = [
                'accountingGroup', 'accountingCategory', 'staff', 'militaryRank',
                'militaryAccountingSpecialtyNumber', 'militaryServiceSuitability', 'registrationDMCommissariatName',
                'actualDMCommissariatName', 'specialAccounting'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'employee_id' => $id
            ]);
        }

        public static function getMilitaryRecordsById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deleteMilitaryRecords($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }