<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class PersonalInfo
    {
        protected static $tableName = 'personal_info';

        public static function getEmployees() {
            $rows = Core::getInstance()->db->select(self::$tableName);

            return $rows;
        }

        public static function getSomeEmployees($position_id) {
            $rows = Core::getInstance()->db->select('appointment_transfer', 'employee_id', [
                'position_id' => $position_id
            ]);

            $employeeTransferRows = [];

            foreach ($rows as $row) {
                $employeeTransferRows[] = Core::getInstance()->db->select('appointment_transfer', '*', [
                    'employee_id' => $row['employee_id']
                ]);
            }

            $TransferArray = [];
            foreach ($employeeTransferRows as $subArray) {
                $TransferArray[] = end($subArray);
            }

            $resultArray = [];
            foreach ($TransferArray as $subArray) {
                if ($subArray['position_id'] == $_SESSION['position_id'])
                    $resultArray[] = Core::getInstance()->db->select('personal_info', '*', [
                        'employee_id' => $subArray['employee_id']
                    ]);;
            }

            return array_merge(...$resultArray);
        }

        public static function addPersonalInfo($row, $photoPath) {
            do {
                $fileName = uniqid() . '.jpg';
                $newPath = "files/employee/{$fileName}";
            } while (file_exists($newPath));

            move_uploaded_file($photoPath, $newPath);

            $fieldsList = [
                'employee_id', 'lastname', 'firstname', 'midname', 'phoneNumber', 'email', 'gender', 'citizenship',
                'birthdate', 'personnelNumber', 'identificationNumber'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            $row['photo'] = $fileName;

            Core::getInstance()->db->insert(self::$tableName, $row);
        }

        public static function updatePersonalInfo($id, $row) {
            $fieldsList = [
                'fired', 'lastname', 'firstname', 'midname', 'phoneNumber', 'email', 'gender', 'citizenship',
                'birthdate', 'personnelNumber', 'identificationNumber'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'employee_id' => $id
            ]);
        }

        public static function getPersonalInfoById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows[0];
            else return null;
        }

        public static function deletePersonalInfo($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }

        public static function changePhoto($id, $newPhoto) {
            self::deletePhotoFile($id);

            do {
                $fileName = uniqid() . '.jpg';
                $newPath = "files/employee/{$fileName}";
            } while (file_exists($newPath));

            move_uploaded_file($newPhoto, $newPath);

            Core::getInstance()->db->update(self::$tableName, [
                'photo' => $fileName
            ], [
                'employee_id' => $id
            ]);
        }

        public static function deletePhotoFile($id) {
            $row = self::getPersonalInfoById($id);

            $photoPath = 'files/employee/' . $row['photo'];

            if (is_file($photoPath))
                unlink($photoPath);
        }
    }