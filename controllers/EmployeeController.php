<?php
    namespace controllers;

    use core\Controller;
    use core\Core;
    use core\Template;
    use models\ActualResidence;
    use models\AppointmentTransfer;
    use models\Department;
    use models\District;
    use models\Doctorate;
    use models\Education;
    use models\Employee;
    use models\EnterpriseInfo;
    use models\Family;
    use models\Files;
    use models\GraduateSchool;
    use models\LastWork;
    use models\MilitaryRecords;
    use models\OtherInfo;
    use models\Passport;
    use models\PersonalInfo;
    use models\Position;
    use models\postGraduateSchool;
    use models\ProfessionalEducation;
    use models\ResidenceStateReg;
    use models\Vacation;

    class EmployeeController extends Controller {
        public function indexAction() {
            if ($_SESSION['position_id']) {
                $rows = PersonalInfo::getSomeEmployees($_SESSION['position_id']);
            } else {
                $rows = PersonalInfo::getEmployees();
            }

            $viewPath = null;

            return $this->render($viewPath, [
                'rows' => $rows
            ]);
        }

        public function viewAction($params) {
            $id = intval($params[0]);

            if ($id > 0) {
                $employee = Employee::getEmployeeById($id);
                $enterpriseInfo = EnterpriseInfo::getEnterPriseInfoById($id);
                $personalInfo = PersonalInfo::getPersonalInfoById($id);
                $education = Education::getEducationById($id);
                $graduateSchool = GraduateSchool::getGraduateSchoolById($id);
                $postgraduateSchool = PostGraduateSchool::getPostgraduateSchoolById($id);
                $doctorate = Doctorate::getDoctorateById($id);
                $lastwork = LastWork::getLastWorkById($id);
                $family = Family::getFamilyById($id);
                $actualResidence = ActualResidence::getActualResidenceById($id);
                $residenceStateReg = ResidenceStateReg::getResidenceStateRegById($id);
                $passport = Passport::getPassportById($id);
                $militaryRec = MilitaryRecords::getMilitaryRecordsById($id);
                $professionalEducation = ProfessionalEducation::getProfEducById($id);
                $transfer = AppointmentTransfer::getTransferById($id);
                $vacation = Vacation::getVacationById($id);
                $otherInfo = OtherInfo::getOtherInfoById($id);
                $files = Files::getFilesById($id);

                $positions = Position::getPositions();

                if (Core::getInstance()->requestMethod === 'POST') {
                    $errors = [];

                    return $this->render(null, [
                        'errors' => $errors,
                        'employee' => $employee,
                        'districts' => $districts,
                        'district_id' => $employee['district_id'],
                        'departments' => $departments,
                        'department_id' => $employee['department_id'],
                        'enterpriseInfo' => $enterpriseInfo,
                        'personalInfo' => $personalInfo,
                        'education' => $education,
                        'graduateSchool' => $graduateSchool,
                        'postgraduateSchool' => $postgraduateSchool,
                        'doctorate' => $doctorate,
                        'lastwork' => $lastwork,
                        'family' => $family,
                        'actualResidence' => $actualResidence,
                        'residenceStateReg' => $residenceStateReg,
                        'passport' => $passport,
                        'militaryRec' => $militaryRec,
                        'professionalEducation' => $professionalEducation,
                        'transfer' => $transfer,
                        'vacation' => $vacation,
                        'otherInfo' => $otherInfo,
                        'files' => $files,
                        'positions' => $positions
                    ]);
                }
            }

            return $this->render(null, [
                'employee' => $employee,
                'districts' => $districts,
                'district_id' => $employee['district_id'],
                'departments' => $departments,
                'department_id' => $employee['department_id'],
                'enterpriseInfo' => $enterpriseInfo,
                'personalInfo' => $personalInfo,
                'education' => $education,
                'graduateSchool' => $graduateSchool,
                'postgraduateSchool' => $postgraduateSchool,
                'doctorate' => $doctorate,
                'lastwork' => $lastwork,
                'family' => $family,
                'actualResidence' => $actualResidence,
                'residenceStateReg' => $residenceStateReg,
                'passport' => $passport,
                'militaryRec' => $militaryRec,
                'professionalEducation' => $professionalEducation,
                'transfer' => $transfer,
                'vacation' => $vacation,
                'otherInfo' => $otherInfo,
                'files' => $files,
                'positions' => $positions
            ]);
        }

        public function addAction($params) {
            $districts = District::getDistricts();
            $departments = Department::getDepartments();

            $positions = Position::getSomePositions($_SESSION['department_id']);

            if (Core::getInstance()->requestMethod === 'POST') {
                $errors = [];

                // required errors
                if (empty($_POST['enterpriseName']))
                    $errors['enterpriseName'] = 'Назву підприємства не вказано';
                if (empty($_POST['EDRPOUcode']))
                    $errors['EDRPOUcode'] = 'Код ЄДРПОУ не вказано';
                if (empty($_POST['completionDate']))
                    $errors['completionDate'] = 'Дату заповнення не вказано';
                if (empty($_POST['workType']))
                    $errors['workType'] = 'Тип роботи не вказано';
                if (empty($_POST['lastname']))
                    $errors['lastname'] = 'Прізвище не вказано';
                if (empty($_POST['firstname']))
                    $errors['firstname'] = 'Ім\'я не вказано';
                if (empty($_POST['midname']))
                    $errors['midname'] = 'По батькові не вказано';
                if (empty($_POST['phoneNumber']))
                    $errors['phoneNumber'] = 'Номер телефону не вказано';
                if (empty($_POST['citizenship']))
                    $errors['citizenship'] = 'Громадянство не вказано';
                if (empty($_POST['birthdate']))
                    $errors['birthdate'] = 'Дату народження не вказано';
                if (empty($_POST['familyStatus']))
                    $errors['familyStatus'] = 'Родинний стан не вказано';
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
                if (empty($_POST['postIndex']))
                    $errors['postIndex'] = 'Поштовий індекс не вказано';
                if (empty($_POST['regionStateRegistration']))
                    $errors['regionStateRegistration'] = 'Область проживання не вказано';
                if (empty($_POST['cityStateRegistration']))
                    $errors['cityStateRegistration'] = 'Місто проживання не вказано';
                if (empty($_POST['districtStateRegistration']))
                    $errors['districtStateRegistration'] = 'Район проживання не вказано';
                if (empty($_POST['streetStateRegistration']))
                    $errors['streetStateRegistration'] = 'Вулицю проживання не вказано';
                if (empty($_POST['houseStateRegistration']))
                    $errors['houseStateRegistration'] = 'Номер будинку  не вказано';
                if (empty($_POST['apartmentStateRegistration']))
                    $errors['apartmentStateRegistration'] = 'Номер квартири не вказано';
                if (empty($_POST['postIndexStateRegistration']))
                    $errors['postIndexStateRegistration'] = 'Поштовий індекс не вказано';
                if (empty($_POST['passportSeries']))
                    $errors['passportSeries'] = 'Серію паспорту не вказано';
                if (empty($_POST['passportNumber']))
                    $errors['passportNumber'] = 'Номер паспорту не вказано';
                if (empty($_POST['passportIssuedBy']))
                    $errors['passportIssued'] = 'Ким виданий не вказано';
                if (empty($_POST['passportIssueDate']))
                    $errors['passportIssueDate'] = 'Дату видачі не вказано';


                if (empty($errors)) {
                    Employee::addEmployee($_POST);

                    $_POST['employee_id'] = Employee::getLastEmployeeId();

                    EnterpriseInfo::addEnterPriseInfo($_POST);
                    PersonalInfo::addPersonalInfo($_POST, $_FILES['file']['tmp_name']);
                    Education::addEducation($_POST);
                    GraduateSchool::addGraduateSchool($_POST);
                    PostGraduateSchool::addPostGraduateSchool($_POST);
                    Doctorate::addDoctorate($_POST);
                    LastWork::addLastWork($_POST);
                    Family::addFamilyMember($_POST);
                    ActualResidence::addActualResidence($_POST);
                    ResidenceStateReg::addResidenceStateReg($_POST);
                    Passport::addPassport($_POST);
                    MilitaryRecords::addMilitaryRecords($_POST);
                    ProfessionalEducation::addProfessionalEducation($_POST);
                    AppointmentTransfer::addTransfer($_POST);
                    Vacation::addVacation($_POST);
                    OtherInfo::addOtherInfo($_POST);
                    Files::addFiles($_POST, $_FILES['files']);

                    session_destroy();

                    return $this->redirect('/employee/index');
                } else {
                    return $this->render(null, [
                        'errors' => $errors,
                        'districts' => $districts,
                        'departments' => $departments,
                        'positions' => $positions,
                    ]);
                }
            }

            return $this->render(null, [
                'districts' => $districts,
                'departments' => $departments,
                'positions' => $positions,
            ]);
        }

        public function editAction($params) {
            $id = intval($params[0]);

            $districts = District::getDistricts();
            $departments = Department::getDepartments();

            if ($id > 0) {
                $employee = Employee::getEmployeeById($id);
                $enterpriseInfo = EnterpriseInfo::getEnterPriseInfoById($id);
                $personalInfo = PersonalInfo::getPersonalInfoById($id);
                $education = Education::getEducationById($id);
                $graduateSchool = GraduateSchool::getGraduateSchoolById($id);
                $postgraduateSchool = PostGraduateSchool::getPostgraduateSchoolById($id);
                $doctorate = Doctorate::getDoctorateById($id);
                $lastwork = LastWork::getLastWorkById($id);
                $family = Family::getFamilyById($id);
                $actualResidence = ActualResidence::getActualResidenceById($id);
                $residenceStateReg = ResidenceStateReg::getResidenceStateRegById($id);
                $passport = Passport::getPassportById($id);
                $militaryRec = MilitaryRecords::getMilitaryRecordsById($id);
                $professionalEducation = ProfessionalEducation::getProfEducById($id);
                $transfer = AppointmentTransfer::getTransferById($id);
                $vacation = Vacation::getVacationById($id);
                $otherInfo = OtherInfo::getOtherInfoById($id);
                $files = Files::getFilesById($id);

                $positions = Position::getSomePositions($employee['department_id']);

                if (Core::getInstance()->requestMethod === 'POST') {
                    $errors = [];

                    // errors
                    if (empty($_POST['enterpriseName']))
                        $errors['enterpriseName'] = 'Назву підприємства не вказано';
                    if (empty($_POST['EDRPOUcode']))
                        $errors['EDRPOUcode'] = 'Код ЄДРПОУ не вказано';
                    if (empty($_POST['completionDate']))
                        $errors['completionDate'] = 'Дату заповнення не вказано';
                    if (empty($_POST['workType']))
                        $errors['workType'] = 'Тип роботи не вказано';
                    if (empty($_POST['lastname']))
                        $errors['lastname'] = 'Прізвище не вказано';
                    if (empty($_POST['firstname']))
                        $errors['firstname'] = 'Ім\'я не вказано';
                    if (empty($_POST['midname']))
                        $errors['midname'] = 'По батькові не вказано';
                    if (empty($_POST['phoneNumber']))
                        $errors['phoneNumber'] = 'Номер телефону не вказано';
                    if (empty($_POST['citizenship']))
                        $errors['citizenship'] = 'Громадянство не вказано';
                    if (empty($_POST['birthdate']))
                        $errors['birthdate'] = 'Дату народження не вказано';
                    if (empty($_POST['familyStatus']))
                        $errors['familyStatus'] = 'Родинний стан не вказано';
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
                    if (empty($_POST['postIndex']))
                        $errors['postIndex'] = 'Поштовий індекс не вказано';
                    if (empty($_POST['regionStateRegistration']))
                        $errors['regionStateRegistration'] = 'Область проживання не вказано';
                    if (empty($_POST['cityStateRegistration']))
                        $errors['cityStateRegistration'] = 'Місто проживання не вказано';
                    if (empty($_POST['districtStateRegistration']))
                        $errors['districtStateRegistration'] = 'Район проживання не вказано';
                    if (empty($_POST['streetStateRegistration']))
                        $errors['streetStateRegistration'] = 'Вулицю проживання не вказано';
                    if (empty($_POST['houseStateRegistration']))
                        $errors['houseStateRegistration'] = 'Номер будинку  не вказано';
                    if (empty($_POST['apartmentStateRegistration']))
                        $errors['apartmentStateRegistration'] = 'Номер квартири не вказано';
                    if (empty($_POST['postIndexStateRegistration']))
                        $errors['postIndexStateRegistration'] = 'Поштовий індекс не вказано';
                    if (empty($_POST['passportSeries']))
                        $errors['passportSeries'] = 'Серію паспорту не вказано';
                    if (empty($_POST['passportNumber']))
                        $errors['passportNumber'] = 'Номер паспорту не вказано';
                    if (empty($_POST['passportIssuedBy']))
                        $errors['passportIssued'] = 'Ким виданий не вказано';
                    if (empty($_POST['passportIssueDate']))
                        $errors['passportIssueDate'] = 'Дату видачі не вказано';
                    if (empty($_POST['transferDate'][0]))
                        $errors['transferDate'] = 'Дату переведення не вказано';
                    if (empty($_POST['transferStructuralDivisionName'][0]))
                        $errors['transferStructuralDivisionName'] = 'Назву структурного підрозділу не вказано';
                    if (empty($_POST['positionCode'][0]))
                        $errors['positionCode'] = 'Код посади не вказано';
                    if (empty($_POST['transferSalary'][0]))
                        $errors['transferSalary'] = 'Оклад не вказано';
                    if (empty($_POST['transferOrder'][0]))
                        $errors['transferOrder'] = 'Підставу не вказано';

                    if (empty($errors)) {
                        $_POST['employee_id'] = $id;

                        Employee::updateEmployee($id, [
                            'district_id' => $_POST['district_id'],
                            'department_id' => $_POST['department_id'],
                        ]);
                        EnterpriseInfo::updateEnterPriseInfo($id, [
                            'enterpriseName' => $_POST['enterpriseName'],
                            'EDRPOUcode' => $_POST['EDRPOUcode'],
                            'completionDate' => $_POST['completionDate'],
                            'workType' => $_POST['workType'],
                            'personnelServiceEmployeePosition' => $_POST['personnelServiceEmployeePosition'],
                            'personnelServiceEmployeeFullname' => $_POST['personnelServiceEmployeeFullname'],
                            'dateOfSignature' => $_POST['dateOfSignature']
                        ]);
                        PersonalInfo::updatePersonalInfo($id, [
                            'fired' => $_POST['fired'] == "on" ? 1 : 0,
                            'lastname' => $_POST['lastname'],
                            'firstname' => $_POST['firstname'],
                            'midname' => $_POST['midname'],
                            'phoneNumber' => $_POST['phoneNumber'],
                            'email' => $_POST['email'],
                            'gender' => $_POST['gender'],
                            'citizenship' => $_POST['citizenship'],
                            'birthdate' => $_POST['birthdate'],
                            'photo' => $_POST['photo'],
                            'personnelNumber' => $_POST['personnelNumber'],
                            'identificationNumber' => $_POST['identificationNumber']
                        ]);
                        Education::updateEducation($id, [
                            'education' => $_POST['education'],
                            'institutionName' => $_POST['institutionName'],
                            'diplomaCertificate' => $_POST['diplomaCertificate'],
                            'diplomaSeries' => $_POST['diplomaSeries'],
                            'diplomaNumber' => $_POST['diplomaNumber'],
                            'graduationYear' => $_POST['graduationYear'],
                            'diplomaSpecialty' => $_POST['diplomaSpecialty'],
                            'diplomaQualification' => $_POST['diplomaQualification'],
                            'educationForm' => $_POST['educationForm'],
                        ]);
                        GraduateSchool::updateGraduateSchool($id, [
                            'graduateSchool' => $_POST['graduateSchool'],
                            'gsInstitutionName' => $_POST['gsInstitutionName'],
                            'gsDiploma' => $_POST['gsDiploma'],
                            'gsDiplomaNumber' => $_POST['gsDiplomaNumber'],
                            'gsDiplomaIssueDate' => $_POST['gsDiplomaIssueDate'],
                            'gsGraduationYear' => $_POST['gsGraduationYear'],
                            'gsScientificDegree' => $_POST['gsScientificDegree'],
                            'gsAcademicStatus' => $_POST['gsAcademicStatus']
                        ]);
                        PostGraduateSchool::updatePostGraduateSchool($id, [
                            'postgraduateSchool' => $_POST['postgraduateSchool'],
                            'psInstitutionName' => $_POST['psInstitutionName'],
                            'psDiploma' => $_POST['psDiploma'],
                            'psDiplomaNumber' => $_POST['psDiplomaNumber'],
                            'psDiplomaIssueDate' => $_POST['psDiplomaIssueDate'],
                            'psDiplomaGraduationYear' => $_POST['psDiplomaGraduationYear'],
                            'psScientificDegree' => $_POST['psScientificDegree'],
                            'psAcademicStatus' => $_POST['psAcademicStatus']
                        ]);
                        Doctorate::updateDoctorate($id, [
                            'doctorate' => $_POST['doctorate'],
                            'docInstitutionName' => $_POST['docInstitutionName'],
                            'docDiploma' => $_POST['docDiploma'],
                            'docDiplomaNumber' => $_POST['docDiplomaNumber'],
                            'docDiplomaIssueDate' => $_POST['docDiplomaIssueDate'],
                            'docGraduationYear' => $_POST['docGraduationYear'],
                            'docScientificDegree' => $_POST['docScientificDegree'],
                            'docAcademicStatus' => $_POST['docAcademicStatus']
                        ]);
                        LastWork::updateLastWork($id, [
                            'lastWorkPlace' => $_POST['lastWorkPlace'],
                            'lastWorkPlacePosition' => $_POST['lastWorkPlacePosition'],
                            'acceptanceDate' => $_POST['acceptanceDate'],
                            'serviceDays' => $_POST['serviceDays'],
                            'serviceMonths' => $_POST['serviceMonths'],
                            'serviceYears' => $_POST['serviceYears'],
                            'dismissedDate' => $_POST['dismissedDate'],
                            'dismissedReason' => $_POST['dismissedReason']
                        ]);
                        Family::updateFamily($id, [
                            'familyStatus' => $_POST['familyStatus'],
                            'familyMember' => $_POST['familyMember'],
                            'memberFullname' => $_POST['memberFullname'],
                            'memberBirthdate' => $_POST['memberBirthdate']
                        ]);
                        ActualResidence::updateActualResidence($id, [
                            'region' => $_POST['region'],
                            'city' => $_POST['city'],
                            'district' => $_POST['district'],
                            'street' => $_POST['street'],
                            'houseNumber' => $_POST['houseNumber'],
                            'apartmentNumber' => $_POST['apartmentNumber'],
                            'postIndex' => $_POST['postIndex']
                        ]);
                        ResidenceStateReg::updateResidenceStateReg($id, [
                            'regionStateRegistration' => $_POST['regionStateRegistration'],
                            'cityStateRegistration' => $_POST['cityStateRegistration'],
                            'districtStateRegistration' => $_POST['districtStateRegistration'],
                            'streetStateRegistration' => $_POST['streetStateRegistration'],
                            'houseStateRegistration' => $_POST['houseStateRegistration'],
                            'apartmentStateRegistration' => $_POST['apartmentStateRegistration'],
                            'postIndexStateRegistration' => $_POST['postIndexStateRegistration']
                        ]);
                        Passport::updatePassport($id, [
                            'passportSeries' => $_POST['passportSeries'],
                            'passportNumber' => $_POST['passportNumber'],
                            'passportIssuedBy' => $_POST['passportIssuedBy'],
                            'passportIssueDate' => $_POST['passportIssueDate']
                        ]);
                        MilitaryRecords::updateMilitaryRecords($id, [
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
                        ProfessionalEducation::updateProfessionalEducation($id, [
                            'PEdate' => $_POST['PEdate'],
                            'PEstructuralDivisionName' => $_POST['PEstructuralDivisionName'],
                            'PEstudyStart' => $_POST['PEstudyStart'],
                            'PEstudyEnd' => $_POST['PEstudyEnd'],
                            'PEstudyType' => $_POST['PEstudyType'],
                            'PEstudyForm' => $_POST['PEstudyForm'],
                            'PElaboratoryName' => $_POST['PElaboratoryName'],
                            'PEissuedBy' => $_POST['PEissuedBy'],
                        ]);
                        AppointmentTransfer::updateTransfer($id, [
                            'transferDate' => $_POST['transferDate'],
                            'transferStructuralDivisionName' => $_POST['transferStructuralDivisionName'],
                            'position_id' => $_POST['position_id'],
                            'positionCode' => $_POST['positionCode'],
                            'transferSalary' => $_POST['transferSalary'],
                            'transferOrder' => $_POST['transferOrder'],
                        ]);
                        Vacation::updateVacation($id, [
                            'vacationType' => $_POST['vacationType'],
                            'workedPeriodStart' => $_POST['workedPeriodStart'],
                            'workedPeriodEnd' => $_POST['workedPeriodEnd'],
                            'vacationStart' => $_POST['vacationStart'],
                            'vacationEnd' => $_POST['vacationEnd'],
                            'vacationOrder' => $_POST['vacationOrder']
                        ]);
                        OtherInfo::updateOtherInfo($id, [
                            'pensionInformation' => $_POST['pensionInformation'],
                            'additionalInfo' => $_POST['additionalInfo'],
                            'firedDate' => $_POST['firedDate'],
                            'firedReason' => $_POST['firedReason']
                        ]);
                        Files::removeSomeFiles([
                            'delFiles' => $_POST['delFiles']
                        ]);

                        if (!empty($_FILES['files']['name'][0])) {
                            Files::addFiles($_POST, $_FILES['files']);
                        }

                        if (!empty($_FILES['file']['tmp_name'])) {
                            PersonalInfo::changePhoto($id, $_FILES['file']['tmp_name']);
                        }

                        return $this->redirect('/employee/index');
                    } else {
                        return $this->render(null, [
                            'errors' => $errors,
                            'employee' => $employee,
                            'districts' => $districts,
                            'district_id' => $employee['district_id'],
                            'departments' => $departments,
                            'department_id' => $employee['department_id'],
                            'enterpriseInfo' => $enterpriseInfo,
                            'personalInfo' => $personalInfo,
                            'education' => $education,
                            'graduateSchool' => $graduateSchool,
                            'postgraduateSchool' => $postgraduateSchool,
                            'doctorate' => $doctorate,
                            'lastwork' => $lastwork,
                            'family' => $family,
                            'actualResidence' => $actualResidence,
                            'residenceStateReg' => $residenceStateReg,
                            'passport' => $passport,
                            'militaryRec' => $militaryRec,
                            'professionalEducation' => $professionalEducation,
                            'transfer' => $transfer,
                            'vacation' => $vacation,
                            'otherInfo' => $otherInfo,
                            'positions' => $positions,
                            'files' => $files
                        ]);
                    }
                }

                return $this->render(null, [
                    'employee' => $employee,
                    'districts' => $districts,
                    'district_id' => $employee['district_id'],
                    'departments' => $departments,
                    'department_id' => $employee['department_id'],
                    'enterpriseInfo' => $enterpriseInfo,
                    'personalInfo' => $personalInfo,
                    'education' => $education,
                    'graduateSchool' => $graduateSchool,
                    'postgraduateSchool' => $postgraduateSchool,
                    'doctorate' => $doctorate,
                    'lastwork' => $lastwork,
                    'family' => $family,
                    'actualResidence' => $actualResidence,
                    'residenceStateReg' => $residenceStateReg,
                    'passport' => $passport,
                    'militaryRec' => $militaryRec,
                    'professionalEducation' => $professionalEducation,
                    'transfer' => $transfer,
                    'vacation' => $vacation,
                    'otherInfo' => $otherInfo,
                    'positions' => $positions,
                    'files' => $files
                ]);
            }
        }

        public function deleteAction($params) {
            $id = intval($params[0]);
            $yes = boolval($params[1] === 'yes');

            if ($id > 0) {
                $employee = Employee::getEmployeeById($id);
                $personal = PersonalInfo::getPersonalInfoById($employee['id']);
                $files = Files::getFilesById($employee['id']);

                if ($yes) {
                    $photoPath = 'files/employee/' . $personal['photo'];

                    if (is_file($photoPath))
                        unlink($photoPath);

                    foreach ($files as $file) {
                        $filesPath = 'files/employee_files/' . $file['file'];

                        if (is_file($filesPath))
                            unlink($filesPath);
                    }

                    EnterpriseInfo::deleteEnterPriseInfo($employee['id']);
                    PersonalInfo::deletePersonalInfo($employee['id']);
                    Education::deleteEducation($employee['id']);
                    GraduateSchool::deleteGraduateSchool($employee['id']);
                    PostGraduateSchool::deletePostGraduateSchool($employee['id']);
                    Doctorate::deleteDoctorate($employee['id']);
                    LastWork::deleteLastWork($employee['id']);
                    Family::deleteFamily($employee['id']);
                    ActualResidence::deleteActualResidence($employee['id']);
                    ResidenceStateReg::deleteResidenceStateReg($employee['id']);
                    Passport::deletePassport($employee['id']);
                    MilitaryRecords::deleteMilitaryRecords($employee['id']);
                    ProfessionalEducation::deleteProfessionalEducation($employee['id']);
                    AppointmentTransfer::deleteTransfer($employee['id']);
                    Vacation::deleteVacation($employee['id']);
                    OtherInfo::deleteOtherInfo($employee['id']);
                    Files::deleteFiles($employee['id']);

                    Employee::deleteEmployee($id);

                    return $this->redirect('/employee');
                }

                return $this->render(null, [
                    'employee' => $employee
                ]);
            }
        }

        public function firedAction() {
            $rows = PersonalInfo::getEmployees();
            $viewPath = null;

            return $this->render($viewPath, [
                'rows' => $rows
            ]);
        }
    }