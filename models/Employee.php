<?php
    namespace models;

    use core\Core;
    use core\Utils;

    class Employee {
        protected static $tableName = 'employee';

        public static function addEmployee($row, $photoPath) {
            do {
                $fileName = uniqid() . '.jpg';
                $newPath = "files/employee/{$fileName}";
            } while (file_exists($newPath));

            move_uploaded_file($photoPath, $newPath);

            $fieldsList = [
                'enterpriseName', 'EDRPOUcode', 'completionDate', 'personnelNumber', 'identificationNumber', 'gender',
                'workType', 'lastname', 'firstname', 'midname', 'birthdate', 'citizenship', 'education',
                'institutionName', 'diplomaCertificate', 'diplomaSeries', 'diplomaNumber', 'graduationYear',
                'diplomaSpecialty', 'diplomaQualification', 'educationForm', 'graduateSchool', 'adjunct', 'doctorate',
                'scientificInstitutionName', 'diploma', 'diplomaNumber2', 'diplomaIssueDate', 'graduationYear2',
                'scientificDegree', 'academicStatus', 'lastWorkPlace', 'position_id', 'acceptanceDate', 'serviceDays',
                'serviceMonths', 'serviceYears', 'dismissedDate', 'dismissedReason', 'pensionInformation', 'familyStatus',
                'familyMembers', 'familyFullname', 'familyBirthdate', 'region', 'city', 'district', 'street', 'houseNumber',
                'apartmentNumber', 'phoneNumber', 'email', 'postIndex', 'regionStateRegistration', 'cityStateRegistration',
                'districtStateRegistration', 'streetStateRegistration', 'houseStateRegistration', 'apartmentStateRegistration',
                'postIndexStateRegistration', 'passportSeries', 'passportNumber', 'passportIssued', 'passportIssueDate',
                'accountingGroup', 'accountingCategory', 'staff', 'militaryRank', 'militaryAccountingSpecialtyNumber',
                'militaryServiceSuitability', 'registrationDMCommissariatName', 'actualDMCommissariatName', 'specialAccounting'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            $row['photo'] = $fileName;

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

        public static function getEmployeesInPosition($position_id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'position_id' => $position_id
            ]);

            return $rows;
        }

        public static function updateEmployee($id, $row) {
            $fieldsList = [
                'enterpriseName', 'EDRPOUcode', 'completionDate', 'personnelNumber', 'identificationNumber', 'gender',
                'workType', 'lastname', 'firstname', 'midname', 'birthdate', 'citizenship', 'education',
                'institutionName', 'diplomaCertificate', 'diplomaSeries', 'diplomaNumber', 'graduationYear',
                'diplomaSpecialty', 'diplomaQualification', 'educationForm', 'graduateSchool', 'adjunct', 'doctorate',
                'scientificInstitutionName', 'diploma', 'diplomaNumber2', 'diplomaIssueDate', 'graduationYear2',
                'scientificDegree', 'academicStatus', 'lastWorkPlace', 'lastWorkPlacePosition', 'acceptanceDate', 'serviceDays',
                'serviceMonths', 'serviceYears', 'dismissedDate', 'dismissedReason', 'pensionInformation', 'familyStatus',
                'familyMembers', 'familyFullname', 'familyBirthdate', 'region', 'city', 'district', 'street', 'houseNumber',
                'apartmentNumber', 'phoneNumber', 'email', 'postIndex', 'regionStateRegistration', 'cityStateRegistration',
                'districtStateRegistration', 'streetStateRegistration', 'houseStateRegistration', 'apartmentStateRegistration',
                'postIndexStateRegistration', 'passportSeries', 'passportNumber', 'passportIssued', 'passportIssueDate',
                'accountingGroup', 'accountingCategory', 'staff', 'militaryRank', 'militaryAccountingSpecialtyNumber',
                'militaryServiceSuitability', 'registrationDMCommissariatName', 'actualDMCommissariatName', 'specialAccounting'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            Core::getInstance()->db->update(self::$tableName, $row, [
                'id' => $id
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
                'id' => $id
            ]);
        }

        public static function deletePhotoFile($id) {
            $row = self::getEmployeeById($id);

            $photoPath = 'files/employee/' . $row['photo'];

            if (is_file($photoPath))
                unlink($photoPath);
        }

        public static function deleteEmployee($id) {
            Core::getInstance()->db->delete(self::$tableName, [
                'id' => $id
            ]);
        }
    }