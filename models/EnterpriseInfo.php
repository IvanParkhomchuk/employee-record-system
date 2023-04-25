<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class EnterpriseInfo
    {
        protected static $tableName = 'enterprise_info';

        public static function addEnterPriseInfo($row) {
            $fieldsList = [
                'employee_id', 'enterpriseName', 'EDRPOUcode', 'completionDate', 'workType',
                'personnelServiceEmployeePosition', 'personnelServiceEmployeeFullname', 'dateOfSignature'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateEnterPriseInfo($id, $row) {
            $fieldsList = [
                'enterpriseName', 'EDRPOUcode', 'completionDate', 'workType',
                'personnelServiceEmployeePosition', 'personnelServiceEmployeeFullname', 'dateOfSignature'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'employee_id' => $id
            ]);
        }

        public static function getEnterPriseInfoById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deleteEnterPriseInfo($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }