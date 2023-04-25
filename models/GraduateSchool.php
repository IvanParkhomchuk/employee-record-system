<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class GraduateSchool
    {
        protected static $tableName = 'graduate_school';

        public static function addGraduateSchool($row) {

            $fieldsList = [
                'graduateSchool', 'gsInstitutionName', 'gsDiploma', 'gsDiplomaNumber',
                'gsDiplomaIssueDate', 'gsGraduationYear', 'gsScientificDegree', 'gsAcademicStatus', 'employee_id'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updateGraduateSchool($id, $row) {
            $fieldsList = [
                'graduateSchool', 'gsInstitutionName', 'gsDiploma', 'gsDiplomaNumber', 'gsDiplomaIssueDate',
                'gsGraduationYear', 'gsScientificDegree', 'gsAcademicStatus'
            ];

            $row = Utils::filterArray($row, $fieldsList);


            Employee::upgradePostEducationalTable($id, $row, $fieldsList, self::$tableName);
        }

        public static function getGraduateSchoolById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deleteGraduateSchool($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }