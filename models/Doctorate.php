<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class Doctorate
    {
        protected static $tableName = 'doctorate';

        public static function addDoctorate($row) {

            $fieldsList = [
                'employee_id', 'doctorate', 'docInstitutionName', 'docDiploma', 'docDiplomaNumber',
                'docDiplomaIssueDate', 'docGraduationYear', 'docScientificDegree', 'docAcademicStatus'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateDoctorate($id, $row) {
            $fieldsList = [
                'doctorate', 'docInstitutionName', 'docDiploma', 'docDiplomaNumber', 'docDiplomaIssueDate',
                'docGraduationYear', 'docScientificDegree', 'docAcademicStatus'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::upgradePostEducationalTable($id, $row, $fieldsList, self::$tableName);
        }

        public static function getDoctorateById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deleteDoctorate($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }