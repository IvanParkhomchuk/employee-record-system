<?php
    namespace core;

    class DB {
        protected $pdo;

        public function __construct($hostname, $login, $password, $dbname) {
            $this->pdo = new \PDO("mysql: host=$hostname; dbname=$dbname", $login, $password);
        }

        public function select($tableName, $fieldsList = "*", $conditionArray = null) {
            if (is_string($fieldsList)) $fieldsListString = $fieldsList;
            if (is_array($fieldsList))  $fieldsListString = implode(', ', $fieldsList);

            $wherePartString = '';

            if (is_array($conditionArray)) {
                $parts = [];

                foreach ($conditionArray as $key => $value) {
                    $parts[] = "{$key} = :{$key}";
                }

                $wherePartString = "WHERE " . implode(' AND ', $parts);
            }


            $res = $this->pdo->prepare("SELECT {$fieldsListString} FROM {$tableName} {$wherePartString}");

            $res->execute($conditionArray);

            return $res->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function update($tableName, $newValuesArray, $conditionArray) {
            $setParts = [];
            $paramsArray = [];
            foreach ($newValuesArray as $key => $value) {
                $setParts [] = "{$key} = :set{$key}";
                $paramsArray['set'.$key] = $value;
            }
            $setPartString = implode(', ', $setParts);

            $whereParts = [];
            foreach ($conditionArray as $key => $value) {
                $whereParts [] = "{$key} = :{$key}";
                $paramsArray[$key] = $value;
            }
            $wherePartString = "WHERE ".implode(' AND ', $whereParts);

            $res = $this->pdo->prepare("UPDATE {$tableName} SET {$setPartString} {$wherePartString}");

            $res->execute($paramsArray);
        }

        public function insert($tableName, $newRowArray) {
            $fieldsArray = array_keys($newRowArray);
            $fieldsListString = implode(', ', $fieldsArray);
            $paramsArray = [];

            foreach($newRowArray as $key => $value) {
                $paramsArray[] = ':' . $key;
            }

            $valuesListString = implode(', ', $paramsArray);

            $res = $this->pdo->prepare("INSERT INTO {$tableName} ($fieldsListString) VALUES ($valuesListString)");

            $res->execute($newRowArray);
        }

        public function delete($tableName, $conditionArray) {
            $whereParts = [];

            foreach ($conditionArray as $key => $value) {
                $whereParts[] = "{$key} = :{$key}";
                $paramsArray[$key] = $value;
            }

            $wherePartString = "WHERE " . implode(' AND ', $whereParts);

            $res = $this->pdo->prepare("DELETE FROM {$tableName} $wherePartString");
            $res->execute($conditionArray);
        }
    }