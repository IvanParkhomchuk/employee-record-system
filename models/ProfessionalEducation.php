<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class ProfessionalEducation
    {
        protected static $tableName = 'professional_education';

        public static function addProfessionalEducation($row) {

            $fieldsList = [
                'PEdate', 'PEstructuralDivisionName', 'PEstudyStart', 'PEstudyEnd',
                'PEstudyType', 'PEstudyForm', 'PElaboratoryName', 'PEissuedBy', 'employee_id'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::setEmployeeTable($row, $fieldsList, self::$tableName);
        }

        public static function updateProfessionalEducation($id, $row) {
            $fieldsList = [
                'PEdate', 'PEstructuralDivisionName', 'PEstudyStart', 'PEstudyEnd', 'PEstudyType',
                'PEstudyForm', 'PElaboratoryName', 'PEissuedBy'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Employee::upgradeEmployeeTable($id, $row, $fieldsList, self::$tableName);
        }

        public static function getProfEducById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows;
            else return null;
        }

        public static function deleteProfessionalEducation($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }