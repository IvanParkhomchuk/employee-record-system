<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class Employee {
        protected static $tableName = 'employee';

        public static function addEmployee($row) {
            $fieldsList = [
                'district_id', 'department_id'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function getEmployeeById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function getEmployees() {
            $rows = Core::getInstance()->db->select(self::$tableName);

            return $rows;
        }

        public static function updateEmployee($id, $row) {
            $fieldsList = [
                'district_id', 'department_id'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'id' => $id
            ]);
        }

        public static function deleteEmployee($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'id' => $id
            ]);
        }

        public static function getLastEmployeeId() {
            $employees = self::getEmployees();

            $employeeLastId = $employees[count($employees) - 1]['id'];

            return $employeeLastId;
        }

        public static function setEmployeeTable($row, $fieldsList, $tableName) {
            $lastId = Employee::getLastEmployeeId();

            for ($i = 0; $i < count($row[$fieldsList[1]]); $i++) {
                $newArray = [];

                foreach ($fieldsList as $elem) {
                    if ($elem == "employee_id") $newArray[$elem] = $lastId;
                    else if ($elem == "education") $newArray[$elem] = $row['education'];
                    else if ($elem == "familyStatus") $newArray[$elem] = $row['familyStatus'];
                    else {
                        $newArray[$elem] = $row[$elem][$i];
                    }
                }

                $newArray = Utils::filterArray($newArray, $fieldsList);

                Core::getInstance()->db->insert($tableName, $newArray);
            }
        }

        public static function upgradeEmployeeTable($id, $row, $fieldsList, $tableName) {
            Core::getInstance()->db->delete($tableName, [
                'employee_id' => $id
            ]);

            for ($i = 0; $i < count($row[$fieldsList[1]]); $i++) {
                $newArray = [];

                foreach ($fieldsList as $elem) {
                    if ($elem == "employee_id") $newArray[$elem] = $id;
                    else if ($elem == "education") $newArray[$elem] = $row['education'];
                    else if ($elem == "familyStatus") $newArray[$elem] = $row['familyStatus'];
                    else {
                        if (empty($row[$elem][$i])) $newArray[$elem] = null;
                        else $newArray[$elem] = $row[$elem][$i];
                    }
                }

                $idRows = Core::getInstance()->db->select($tableName, 'id', [
                    'employee_id' => $id
                ]);

                $fieldIdArray = [];

                foreach ($idRows as $idRow) {
                    $fieldIdArray[] = $idRow['id'];
                }

                $newArray = Utils::filterArray($newArray, $fieldsList);
                $newArray['employee_id'] = $id;

                Core::getInstance()->db->insert($tableName, $newArray);
            }
        }

        public static function upgradePostEducationalTable($id, $row, $fieldsList, $tableName) {
            Core::getInstance()->db->delete($tableName, [
                'employee_id' => $id
            ]);

            $newArray = [];

            foreach ($fieldsList as $elem) {
                if ($elem == "employee_id") $newArray[$elem] = $id;
                else {
                    if (empty($row[$elem])) $newArray[$elem] = null;
                    else $newArray[$elem] = $row[$elem];
                }
            }

            $newArray = Utils::filterArray($newArray, $fieldsList);
            $newArray['employee_id'] = $id;

            Core::getInstance()->db->insert($tableName, $newArray);
        }
    }