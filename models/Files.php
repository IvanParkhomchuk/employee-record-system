<?php

    namespace models;

    use core\Core;
    use core\Utils;

    class Files
    {
        protected static $tableName = 'files';

        public static function addFiles($row, $photoPath) {
            $checkRows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $row['employee_id']
            ]);

            if (empty($checkRows[0]['name'])) {
                Core::getInstance()->db->delete(self::$tableName, [
                    'employee_id' => $row['employee_id']
                ]);
            }

            $fieldsList = [
                'employee_id', 'name', 'file'
            ];

            $row = Utils::filterArray($row, $fieldsList);

            if (!empty($photoPath['tmp_name'][0])) {
                for ($i = 0; $i < count($photoPath['name']); $i++) {
                    do {
                        $fileNameArray = explode('.', $photoPath['name'][$i]);
                        $uniqueFileName = $fileNameArray[0] . '_' . uniqid() . '.' . $fileNameArray[1];
                        $originalFileName = $photoPath['name'][$i];
                        $newPath = "files/employee_files/{$uniqueFileName}";
                    } while (file_exists($newPath));

                    $row['name'][$i] = $originalFileName;
                    $row['file'][$i] = $uniqueFileName;

                    move_uploaded_file($photoPath['tmp_name'][$i], $newPath);
                }
            } else {
                $row['name'][0] = null;
                $row['file'][0] = null;
            }

            Employee::setEmployeeTable($row, $fieldsList, self::$tableName);
        }

        public static function removeSomeFiles($fileNames) {
            $rows = [];

            foreach ($fileNames['delFiles'] as $fileName) {
                $rows[] = Core::getInstance()->db->select(self::$tableName, '*', [
                    'name' => $fileName
                ]);
            }

            $rows = array_merge(...$rows);

            foreach ($rows as $row) {
                unlink("files/employee_files/{$row['file']}");

                Core::getInstance()->db->delete(self::$tableName, [
                    'name' => $row['name']
                ]);
            }
        }

        public static function getFilesById($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, '*', [
                'employee_id' => $id
            ]);

            if (!empty($rows)) return $rows;
            else return null;
        }

        public static function deleteFiles($id) {
            $rows = Core::getInstance()->db->select(self::$tableName, 'file', [
                'employee_id' => $id
            ]);

            foreach ($rows as $row) {
                unlink("files/employee_files/{$row['file']}");
            }

            Core::getInstance()->db->delete(self::$tableName, [
                'employee_id' => $id
            ]);
        }
    }