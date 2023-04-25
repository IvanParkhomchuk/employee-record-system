<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class LastWork
    {
        protected static $tableName = 'lastwork';

        public static function addLastWork($row) {
            $fieldsList = [
                'employee_id', 'lastWorkPlace', 'lastWorkPlacePosition', 'acceptanceDate', 'serviceDays',
                'serviceMonths', 'serviceYears', 'dismissedDate', 'dismissedReason'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateLastWork($id, $row) {
            $fieldsList = [
                'lastWorkPlace', 'lastWorkPlacePosition', 'acceptanceDate', 'serviceDays',
                'serviceMonths', 'serviceYears', 'dismissedDate', 'dismissedReason'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'employee_id' => $id
            ]);
        }

        public static function getLastWorkById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deleteLastWork($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }