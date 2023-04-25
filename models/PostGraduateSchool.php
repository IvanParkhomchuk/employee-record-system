<?php

    namespace models;

    use core\Core;
    use core\Utils;

    class PostGraduateSchool
    {
        protected static $tableName = 'postGraduate_school';

        public static function addPostGraduateSchool($row) {

            $fieldsList = [
                'employee_id', 'postgraduateSchool', 'psInstitutionName', 'psDiploma', 'psDiplomaNumber',
                'psDiplomaIssueDate', 'psDiplomaGraduationYear', 'psScientificDegree', 'psAcademicStatus'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updatePostGraduateSchool($id, $row) {
            $fieldsList = [
                'postgraduateSchool', 'psInstitutionName', 'psDiploma', 'psDiplomaNumber', 'psDiplomaIssueDate',
                'psDiplomaGraduationYear', 'psScientificDegree', 'psAcademicStatus'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::upgradePostEducationalTable($id, $row, $fieldsList, self::$tableName);
        }

        public static function getPostgraduateSchoolById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deletePostgraduateSchool($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }