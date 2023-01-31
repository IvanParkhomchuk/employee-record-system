<?php
    namespace controllers;

    use core\Controller;
    use core\Core;
    use core\Template;
    use models\Employee;
    use models\Position;

    class EmployeeController extends Controller {
        public function indexAction() {
            $rows = Employee::getEmployees();
            $viewPath = null;

            return $this->render($viewPath, [
                'rows' => $rows
            ]);
        }

        public function viewAction($params) {
            $id = intval($params[0]);

            if ($id > 0) {
                $employee = Employee::getEmployeeById($id);
                $position = Position::getPositionById($employee['id']);

                if (Core::getInstance()->requestMethod === 'POST') {
                    $errors = [];

                    // if ()  @todo: Errors (server validation)

                    if (empty($errors)) {

                    } else {
                        $model = $_POST;

                        return $this->render(null, [
                            'errors' => $errors,
                            'model' => $model,
                            'employee' => $employee
                        ]);
                    }
                }
            }

            return $this->render(null, [
                'employee' => $employee,
                'position' => $position
            ]);
        }

        public function addAction($params) {
            $position_id = intval($params[0]);

            if (empty($position_id))
                $position_id = null;

            $positions = Position::getPositions();

            if (Core::getInstance()->requestMethod === 'POST') {
                $errors = [];

                if (empty($_POST['enterpriseName']))
                    $errors['enterpriseName'] = 'Назву підприємства не вказано';
                if (empty($_POST['EDRPOUcode']))
                    $errors['EDRPOUcode'] = 'Код ЄДРПОУ не вказано';
                if (empty($_POST['completionDate']))
                    $errors['completionDate'] = 'Дату заповнення не вказано';
                if (empty($_POST['personnelNumber']))
                    $errors['personnelNumber'] = 'Табельний номер не вказано';
                if (empty($_POST['identificationNumber']))
                    $errors['identificationNumber'] = 'Індивідуальний ідентифікаційний номер не вказано';
                if (empty($_POST['workType']))
                    $errors['workType'] = 'Тип роботи не вказано';
                if (empty($_POST['lastname']))
                    $errors['lastname'] = 'Прізвище не вказано';
                if (empty($_POST['firstname']))
                    $errors['firstname'] = 'Ім\'я не вказано';
                if (empty($_POST['midname']))
                    $errors['midname'] = 'По батькові не вказано';
                if (empty($_POST['birthdate']))
                    $errors['birthdate'] = 'Дату народження не вказано';
                if (empty($_POST['citizenship']))
                    $errors['citizenship'] = 'Громадянство не вказано';
                if (empty($_POST['education']))
                    $errors['education'] = 'Освіту не вказано';
                if (empty($_POST['institutionName']))
                    $errors['institutionName'] = 'Назву освітнього закладу не вказано';
                if (empty($_POST['diplomaCertificate']))
                    $errors['diplomaCertificate'] = 'Свідоцтво диплому не вказано';
                if (empty($_POST['diplomaSeries']))
                    $errors['diplomaSeries'] = 'Серію диплому не вказано';
                if (empty($_POST['diplomaNumber']))
                    $errors['diplomaNumber'] = 'Номер диплому не вказано';
                if (empty($_POST['graduationYear']))
                    $errors['graduationYear'] = 'Рік закінчення не вказано';
                if (empty($_POST['diplomaSpecialty']))
                    $errors['diplomaSpecialty'] = 'Спеціальність за дипломом не вказано';
                if (empty($_POST['diplomaQualification']))
                    $errors['diplomaQualification'] = 'Кваліфікацію за дипломом не вказано';
                if (empty($_POST['region']))
                    $errors['region'] = 'Область проживання не вказано';
                if (empty($_POST['city']))
                    $errors['city'] = 'Місто проживання не вказано';
                if (empty($_POST['district']))
                    $errors['district'] = 'Район проживання не вказано';
                if (empty($_POST['street']))
                    $errors['street'] = 'Вулицю проживання не вказано';
                if (empty($_POST['houseNumber']))
                    $errors['houseNumber'] = 'Номер будинку не вказано';
                if (empty($_POST['apartmentNumber']))
                    $errors['apartmentNumber'] = 'Номер квартири не вказано';
                if (empty($_POST['phoneNumber']))
                    $errors['phoneNumber'] = 'Телефон не вказано';
                if (empty($_POST['email']))
                    $errors['email'] = 'Електронну пошту не вказано';
                if (empty($_POST['postIndex']))
                    $errors['postIndex'] = 'Поштовий індекс не вказано';
                if (empty($_POST['regionStateRegistration']))
                    $errors['regionStateRegistration'] = 'Область проживання за державною реєстрацією не вказано';
                if (empty($_POST['cityStateRegistration']))
                    $errors['cityStateRegistration'] = 'Місто проживання за державною реєстрацією не вказано';
                if (empty($_POST['districtStateRegistration']))
                    $errors['districtStateRegistration'] = 'Район проживання за державною реєстрацією не вказано';
                if (empty($_POST['streetStateRegistration']))
                    $errors['streetStateRegistration'] = 'Вулицю проживання за державною реєстрацією не вказано';
                if (empty($_POST['houseStateRegistration']))
                    $errors['houseStateRegistration'] = 'Номер будинку за державною реєстрацією	 не вказано';
                if (empty($_POST['apartmentStateRegistration']))
                    $errors['apartmentStateRegistration'] = 'Номер квартири за державною реєстрацією не вказано';
                if (empty($_POST['postIndexStateRegistration']))
                    $errors['postIndexStateRegistration'] = 'Поштовий індекс за державною реєстрацією не вказано';
                if (empty($_POST['passportSeries']))
                    $errors['passportSeries'] = 'Серію паспорту не вказано';
                if (empty($_POST['passportNumber']))
                    $errors['passportNumber'] = 'Номер паспорту не вказано';
                if (empty($_POST['passportIssued']))
                    $errors['passportIssued'] = 'Ким виданий не вказано';
                if (empty($_POST['passportIssueDate']))
                    $errors['passportIssueDate'] = 'Дату видачі не вказано';

                if (empty($errors)) {
                    foreach ($_POST as $key => $value) {
                        if (is_array($value)) {
                            $_POST[$key] = implode('/', $value);
                        }

                        if ($value == 'on') {
                            $_POST[$key] = '1';
                        }
                    }

                    Employee::addEmployee($_POST, $_FILES['file']['tmp_name']);

                    return $this->redirect('/employee/index');
                } else {
                    $model = $_POST;

                    return $this->render(null, [
                        'errors' => $errors,
                        'model' => $model,
                        'positions' => $positions,
                        'position_id' => $position_id,
                    ]);
                }
            }

            return $this->render(null, [
                'positions' => $positions,
                'position_id' => $position_id,
            ]);
        }

        public function editAction($params) {
            $id = intval($params[0]);

            if (empty($position_id))
                $position_id = null;

            $positions = Position::getPositions();

            if ($id > 0) {
                $employee = Employee::getEmployeeById($id);

                if (Core::getInstance()->requestMethod === 'POST') {
                    $errors = [];

                    if (empty($errors)) {
                        foreach ($_POST as $key => $value) {
                            if (is_array($value)) {
                                $_POST[$key] = implode('/', $value);
                            }

                            if ($value == 'on') {
                                $_POST[$key] = '1';
                            }
                        }

                        Employee::updateEmployee($id, [
                            'enterpriseName' => $_POST['enterpriseName'],
                            'EDRPOUcode' => $_POST['EDRPOUcode'],
                            'completionDate' => $_POST['completionDate'],
                            'personnelNumber' => $_POST['personnelNumber'],
                            'identificationNumber' => $_POST['identificationNumber'],
                            'gender' => $_POST['gender'],
                            'workType' => $_POST['workType'],
                            'lastname' => $_POST['lastname'],
                            'firstname' => $_POST['firstname'],
                            'midname' => $_POST['midname'],
                            'birthdate' => $_POST['birthdate'],
                            'citizenship' => $_POST['citizenship'],
                            'education' => $_POST['education'],
                            'institutionName' => $_POST['institutionName'],
                            'diplomaCertificate' => $_POST['diplomaCertificate'],
                            'diplomaSeries' => $_POST['diplomaSeries'],
                            'diplomaNumber' => $_POST['diplomaNumber'],
                            'graduationYear' => $_POST['graduationYear'],
                            'diplomaSpecialty' => $_POST['diplomaSpecialty'],
                            'diplomaQualification' => $_POST['diplomaQualification'],
                            'educationForm' => $_POST['educationForm'],
                            'graduateSchool' => $_POST['graduateSchool'],
                            'adjunct' => $_POST['adjunct'],
                            'doctorate' => $_POST['doctorate'],
                            'scientificInstitutionName' => $_POST['scientificInstitutionName'],
                            'diploma' => $_POST['diploma'],
                            'diplomaNumber2' => $_POST['diplomaNumber2'],
                            'diplomaIssueDate' => $_POST['diplomaIssueDate'],
                            'graduationYear2' => $_POST['graduationYear2'],
                            'scientificDegree' => $_POST['scientificDegree'],
                            'academicStatus' => $_POST['academicStatus'],
                            'lastWorkPlace' => $_POST['lastWorkPlace'],
                            'position_id' => $_POST['position_id'],
                            'acceptanceDate' => $_POST['acceptanceDate'],
                            'serviceDays' => $_POST['serviceDays'],
                            'serviceMonths' => $_POST['serviceMonths'],
                            'serviceYears' => $_POST['serviceYears'],
                            'dismissedDate' => $_POST['dismissedDate'],
                            'dismissedReason' => $_POST['dismissedReason'],
                            'pensionInformation' => $_POST['pensionInformation'],
                            'familyStatus' => $_POST['familyStatus'],
                            'familyMembers' => $_POST['familyMembers'],
                            'familyFullname' => $_POST['familyFullname'],
                            'familyBirthdate' => $_POST['familyBirthdate'],
                            'region' => $_POST['region'],
                            'city' => $_POST['city'],
                            'district' => $_POST['district'],
                            'street' => $_POST['street'],
                            'houseNumber' => $_POST['houseNumber'],
                            'apartmentNumber' => $_POST['apartmentNumber'],
                            'phoneNumber' => $_POST['phoneNumber'],
                            'email' => $_POST['email'],
                            'postIndex' => $_POST['postIndex'],
                            'regionStateRegistration' => $_POST['regionStateRegistration'],
                            'cityStateRegistration' => $_POST['cityStateRegistration'],
                            'districtStateRegistration' => $_POST['districtStateRegistration'],
                            'streetStateRegistration' => $_POST['streetStateRegistration'],
                            'houseStateRegistration' => $_POST['houseStateRegistration'],
                            'apartmentStateRegistration' => $_POST['apartmentStateRegistration'],
                            'postIndexStateRegistration' => $_POST['postIndexStateRegistration'],
                            'passportSeries' => $_POST['passportSeries'],
                            'passportNumber' => $_POST['passportNumber'],
                            'passportIssued' => $_POST['passportIssued'],
                            'passportIssueDate' => $_POST['passportIssueDate'],
                            'accountingGroup' => $_POST['accountingGroup'],
                            'accountingCategory' => $_POST['accountingCategory'],
                            'staff' => $_POST['staff'],
                            'militaryRank' => $_POST['militaryRank'],
                            'militaryAccountingSpecialtyNumber' => $_POST['militaryAccountingSpecialtyNumber'],
                            'militaryServiceSuitability' => $_POST['militaryServiceSuitability'],
                            'registrationDMCommissariatName' => $_POST['registrationDMCommissariatName'],
                            'actualDMCommissariatName' => $_POST['actualDMCommissariatName'],
                            'specialAccounting' => $_POST['specialAccounting']
                        ]);

                        if (!empty($_FILES['file']['tmp_name'])) {
                            Employee::changePhoto($id, $_FILES['file']['tmp_name']);
                        }

                        return $this->redirect('/employee/index');
                    } else {
                        $model = $_POST;

                        return $this->render(null, [
                            'errors' => $errors,
                            'model' => $model,
                            'positions' => $positions,
                            'position_id' => $position_id
                        ]);
                    }
                }

                return $this->render(null, [
                    'employee' => $employee,
                    'positions' => $positions,
                    'position_id' => $employee['position_id'],
                ]);
            }
        }

        public function deleteAction($params) {
            $id = intval($params[0]);
            $yes = boolval($params[1] === 'yes');

            if ($id > 0) {
                $employee = Employee::getEmployeeById($id);

                if ($yes) {
                    $filePath = 'files/employee/' . $employee['photo'];

                    if (is_file($filePath))
                        unlink($filePath);

                    Employee::deleteEmployee($id);

                    return $this->redirect('/employee');
                }

                return $this->render(null, [
                    'employee' => $employee
                ]);
            }
        }
    }