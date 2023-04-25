<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class Education
    {
        protected static $tableName = 'education';

        public static function addEducation($row) {
            $fieldsList = [
                'institutionName', 'diplomaCertificate', 'diplomaSeries', 'diplomaNumber', 'graduationYear',
                'diplomaSpecialty', 'diplomaQualification', 'educationForm', 'employee_id', 'education'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);

            Employee::setEmployeeTable($row, $fieldsList, self::$tableName);
        }

        public static function updateEducation($id, $row) {
            $fieldsList = [
                'education', 'institutionName', 'diplomaCertificate', 'diplomaSeries', 'diplomaNumber', 'graduationYear',
                'diplomaSpecialty', 'diplomaQualification', 'educationForm'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::upgradeEmployeeTable($id, $row, $fieldsList, self::$tableName);
        }

        public static function getEducationById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows;
            else return null;
        }

        public static function deleteEducation($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }