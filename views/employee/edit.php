<?php
    /** @var array $employee */
    /** @var array $positions */
    /** @var int|null $position_id */
?>

<h2 class="text-center my-3">Редагування працівника</h2>

<form method="post" action="" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-sm-6">
            <label for="enterpriseName">Назва підприємства</label>
            <input type="text" class="form-control" id="enterpriseName" name="enterpriseName" value="<?= $employee['enterpriseName'] ?>">
        </div>

        <div class="col-sm-6">
            <label for="EDRPOUcode">Код ЄДРПОУ</label>
            <input type="number" class="form-control" id="EDRPOUcode" name="EDRPOUcode" value="<?= $employee['EDRPOUcode'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="completionDate">Дата заповнення</label>
            <input type="date" class="form-control" id="completionDate" name="completionDate" value="<?= $employee['completionDate'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="personnelNumber">Табельний номер</label>
            <input type="number" class="form-control" id="personnelNumber" name="personnelNumber" value="<?= $employee['personnelNumber'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="identificationNumber">Індивідуальний ідентифікаційний номер</label>
            <input type="number" class="form-control" id="identificationNumber" name="identificationNumber" value="<?= $employee['identificationNumber'] ?>">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-4">
            <label for="gender">Стать</label>
            <select name="gender" id="gender" class="form-control">
                <option <?php if ($employee['gender'] == 'Чоловіча') echo 'selected' ?> value="Чоловіча">Чоловіча</option>
                <option <?php if ($employee['gender'] == 'Жіноча') echo 'selected' ?> value="Жіноча">Жіноча</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label for="workType">Вид роботи</label>

            <select name="workType" id="workType" class="form-control">
                <option <?php if ($employee['gender'] == 'Основна') echo 'selected' ?> value="Основна">Основна</option>
                <option <?php if ($employee['gender'] == 'За сумісництвом') echo 'selected' ?> value="За сумісництвом">За сумісництвом</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label for="file">Фото</label>
            <?php $filePath = 'files/employee/' . $employee['photo']; ?>

            <?php if (is_file($filePath)) : ?>
                <img src="/<?= $filePath ?>" class="card-img-top img-thumbnail" alt="">
            <?php else : ?>
                <img src="/static/images/no-image.jpg" class="card-img-top img-thumbnail" alt="">
            <?php endif; ?>

            <input type="file" class="form-control mt-2" id="file" name="file">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="lastname">Прізвище</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $employee['lastname'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="firstname">Ім'я</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $employee['firstname'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="midname">По батькові</label>
            <input type="text" class="form-control" id="midname" name="midname" value="<?= $employee['midname'] ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-sm-4">
            <label for="birthdate">Дата народження</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $employee['birthdate'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="citizenship">Громадянство</label>
            <input type="text" class="form-control" id="citizenship" name="citizenship" value="<?= $employee['citizenship'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="education">Освіта</label>

            <select name="education" id="education" class="form-control">
                <option <?php if ($employee['gender'] == 'Базова загальна середня') echo 'selected' ?> value="Базова загальна середня">Базова загальна середня</option>
                <option <?php if ($employee['gender'] == 'Повна загальна середня') echo 'selected' ?> value="Повна загальна середня">Повна загальна середня</option>
                <option <?php if ($employee['gender'] == 'Професійно-технічна') echo 'selected' ?> value="Професійно-технічна">Професійно-технічна</option>
                <option <?php if ($employee['gender'] == 'Неповна вища') echo 'selected' ?> value="Неповна вища">Неповна вища</option>
                <option <?php if ($employee['gender'] == 'Базова вища') echo 'selected' ?> value="Базова вища">Базова вища</option>
                <option <?php if ($employee['gender'] == 'Повна вища') echo 'selected' ?> value="Повна вища">Повна вища</option>
            </select>
        </div>
    </div>

    <div class="mb-4">
        <div class="parent-block">
            <div class="d-flex justify-content-end">
                <button type="button" id="append-btn" class="btn btn-primary mx-3">Додати</button>
                <button type="button" id="remove-btn" class="btn btn-danger">Видалити</button>
            </div>
            <?php
                $institutionsArray = explode('/', $employee['institutionName']);
                $diplomaCertificatesArray = explode('/', $employee['diplomaCertificate']);
                $diplomaSeriesArray = explode('/', $employee['diplomaSeries']);
                $diplomaNumbersArray = explode('/', $employee['diplomaNumber']);
                $graduationYearsArray = explode('/', $employee['graduationYear']);

                $diplomaSpecialtiesArray = explode('/', $employee['diplomaSpecialty']);
                $diplomaQualificationsArray = explode('/', $employee['diplomaQualification']);
                $educationFormsArray = explode('/', $employee['educationForm']);
            ?>

            <?php for ($i = 0; $i < count($institutionsArray); $i++) : ?>
                <div class="needToClone">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="institutionName">Назва освітнього закладу</label>
                            <input type="text" class="form-control" id="institutionName" name="institutionName[]" value="<?= $institutionsArray[$i] ?>">
                        </div>
                        <div class="col-sm-3">
                            <label for="diplomaCertificate">Диплом (свідоцтво)</label>
                            <input type="text" class="form-control" id="diplomaCertificate" name="diplomaCertificate[]" value="<?= $diplomaCertificatesArray[$i] ?>">
                        </div>
                        <div class="col-sm-2">
                            <label for="diplomaSeries">Серія</label>
                            <input type="text" class="form-control" id="diplomaSeries" name="diplomaSeries[]" value="<?= $diplomaSeriesArray[$i] ?>">
                        </div>
                        <div class="col-sm-2">
                            <label for="diplomaNumber">Номер</label>
                            <input type="text" class="form-control" id="diplomaNumber" name="diplomaNumber[]" value="<?= $diplomaNumbersArray[$i] ?>">
                        </div>
                        <div class="col-sm-2">
                            <label for="graduationYear">Рік закінчення</label>
                            <input type="date" class="form-control" id="citizenship" name="graduationYear[]" value="<?= $graduationYearsArray[$i] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="diplomaSpecialty">Спеціальінсть за дипломом</label>
                            <input type="text" class="form-control" id="diplomaSpecialty" name="diplomaSpecialty[]" value="<?= $diplomaSpecialtiesArray[$i] ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="diplomaQualification">Кваліфікація за дипломом</label>
                            <input type="text" class="form-control" id="diplomaQualification" name="diplomaQualification[]" value="<?= $diplomaQualificationsArray[$i] ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="educationForm">Форма навчання</label>

                            <select name="educationForm[]" id="educationForm" class="form-control">
                                <option <?php if ($educationFormsArray[$i] == 'Денна') echo 'selected' ?> value="Денна">Денна</option>
                                <option <?php if ($educationFormsArray[$i] == 'Вечірня') echo 'selected' ?> value="Вечірня">Вечірня</option>
                                <option <?php if ($educationFormsArray[$i] == 'Заочна') echo 'selected' ?> value="Заочна">Заочна</option>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="d-flex mb-4">
        <div class="form-check">
            <input <?php if ($employee['graduateSchool'] == '1') echo 'checked' ?> type="checkbox" name="graduateSchool" id="graduateSchool" class="form-check-input">
            <label for="graduateSchool" class="form-check-label">Аспірантура</label>
        </div>
        <div class="form-check mx-3">
            <input <?php if ($employee['adjunct'] == '1') echo 'checked' ?> type="checkbox" name="adjunct" id="adjunct" class="form-check-input">
            <label for="adjunct" class="form-check-label">Ад'юнктура</label>
        </div>
        <div class="form-check">
            <input <?php if ($employee['doctorate'] == '1') echo 'checked' ?> type="checkbox" name="doctorate" id="doctorate" class="form-check-input">
            <label for="doctorate" class="form-check-label">Докторантура</label>
        </div>
    </div>

    <div class="mb-4">
        <div class="d-flex justify-content-end">
            <button type="button" id="" class="btn btn-primary mx-3">Додати</button>
            <button type="button" id="" class="btn btn-danger">Видалити</button>
        </div>

        <?php
            $scientificInstitutionNamesArray = explode('/', $employee['scientificInstitutionName']);
            $diplomasArray = explode('/', $employee['diploma']);
            $diplomaNumbers2Array = explode('/', $employee['diplomaNumber2']);
            $diplomaIssueDatesArray = explode('/', $employee['diplomaIssueDate']);
            $graduationYears2Array = explode('/', $employee['graduationYear2']);
            $scientificDegreesArray = explode('/', $employee['scientificDegree']);
            $academicStatusesArray = explode('/', $employee['academicStatus']);
        ?>

        <?php for ($i = 0; $i < count($scientificInstitutionNamesArray); $i++) : ?>
            <div class="row">
                <div class="col-sm-3">
                    <label for="scientificInstitutionName">Назва освітнього закладу</label>
                    <input type="text" id="scientificInstitutionName" name="scientificInstitutionName[]" class="form-control" value="<?= $scientificInstitutionNamesArray[$i] ?>">
                </div>
                <div class="col-sm-3">
                    <label for="diploma">Диплом</label>
                    <input type="text" id="diploma" name="diploma[]" class="form-control" value="<?= $diplomasArray[$i] ?>">
                </div>
                <div class="col-sm-3">
                    <label for="diplomaNumber2">Номер диплому</label>
                    <input type="text" id="diplomaNumber2" name="diplomaNumber2[]" class="form-control" value="<?= $diplomaNumbers2Array[$i] ?>">
                </div>
                <div class="col-sm-3">
                    <label for="diplomaIssueDate">Дата видачі</label>
                    <input type="date" id="diplomaIssueDate" name="diplomaIssueDate[]" class="form-control" value="<?= $diplomaIssueDatesArray[$i] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label for="graduationYear2">Рік закінчення</label>
                    <input type="text" id="graduationYear2" name="graduationYear2[]" class="form-control" value="<?= $graduationYears2Array[$i] ?>">
                </div>
                <div class="col-sm-4">
                    <label for="scientificDegree">Науковий ступінь</label>
                    <input type="text" id="scientificDegree" name="scientificDegree[]" class="form-control" value="<?= $scientificDegreesArray[$i] ?>">
                </div>
                <div class="col-sm-4">
                    <label for="academicStatus">Учене звання</label>
                    <input type="text" id="academicStatus" name="academicStatus[]" class="form-control" value="<?= $academicStatusesArray[$i] ?>">
                </div>
            </div>
        <?php endfor; ?>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label for="lastWorkPlace">Останнє місце роботи</label>
            <input type="text" class="form-control" id="lastWorkPlace" name="lastWorkPlace" value="<?= $employee['lastWorkPlace'] ?>">
        </div>
        <div class="col-sm-6">
            <label for="position_id">Посада</label>
            <select class="form-control" name="position_id" id="position_id">
                <?php foreach ($positions as $position) : ?>
                    <option <?php if ($position['id'] == $position_id) echo 'selected' ?> value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-6">
            <label for="acceptanceDate">Дата прийняття</label>
            <input type="date" class="form-control" id="acceptanceDate" name="acceptanceDate" value="<?= $employee['acceptanceDate'] ?>">
        </div>
        <div class="col-sm-2">
            <label for="serviceDays">Вислуга дні</label>
            <input type="number" class="form-control" id="serviceDays" name="serviceDays" value="<?= $employee['serviceDays'] ?>">
        </div>
        <div class="col-sm-2">
            <label for="serviceMonths">місяці</label>
            <input type="number" class="form-control" id="serviceMonths" name="serviceMonths" value="<?= $employee['serviceMonths'] ?>">
        </div>
        <div class="col-sm-2">
            <label for="serviceYears">роки</label>
            <input type="number" class="form-control" id="serviceYears" name="serviceYears" value="<?= $employee['serviceYears'] ?>">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-12">
            <label for="dismissedDate">Дата звільнення</label>
            <input type="date" class="form-control" id="dismissedDate" name="dismissedDate" value="<?= $employee['dismissedDate'] ?>">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-6">
            <label for="dismissedReason">Причина звільнення</label>
            <textarea class="form-control" name="dismissedReason" id="dismissedReason" rows="2"><?= $employee['dismissedReason'] ?></textarea>
        </div>
        <div class="col-sm-6">
            <label for="pensionInformation">Відомості про отримання пенсії</label>
            <textarea class="form-control" name="pensionInformation" id="pensionInformation" rows="2"><?= $employee['pensionInformation'] ?></textarea>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-12">
            <label for="familyStatus">Родинний стан</label>
            <input type="text" class="form-control" id="familyStatus" name="familyStatus" value="<?= $employee['familyStatus'] ?>">
        </div>
    </div>

    <div class="mb-4">
        <div>
            <div class="d-flex justify-content-end">
                <button type="button" id="" class="btn btn-primary mx-3">Додати</button>
                <button type="button" id="" class="btn btn-danger">Видалити</button>
            </div>
            <div>
                <?php
                    $familyMembersArray = explode('/', $employee['familyMembers']);
                    $familyFullnamesArray = explode('/', $employee['familyFullname']);
                    $familyBirthsDatesArray = explode('/', $employee['familyBirthdate']);
                ?>

                <?php for ($i = 0; $i < count($familyMembersArray); $i++) : ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="familyMembers">Член родини</label>
                            <input type="text" class="form-control" id="familyMembers" name="familyMembers[]" value="<?= $familyMembersArray[$i] ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="familyFullname">ПІБ</label>
                            <input type="text" class="form-control" id="familyFullname" name="familyFullname[]" value="<?= $familyFullnamesArray[$i] ?>">
                        </div>
                        <div class="col-sm-4">
                            <label for="familyBirthdate">Рік народження</label>
                            <input type="date" class="form-control" id="familyBirthdate" name="familyBirthdate[]" value="<?= $familyBirthsDatesArray[$i] ?>">
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <label for="region">Область проживання</label>
            <input type="text" class="form-control" name="region" id="region" value="<?= $employee['region'] ?>">
        </div>
        <div class="col-sm-2">
            <label for="city">Місто</label>
            <input type="text" class="form-control" name="city" id="city" value="<?= $employee['city'] ?>">
        </div>
        <div class="col-sm-2">
            <label for="district">Район</label>
            <input type="text" class="form-control" name="district" id="district" value="<?= $employee['district'] ?>">
        </div>
        <div class="col-sm-2">
            <label for="street">Вулиця</label>
            <input type="text" class="form-control" name="street" id="street" value="<?= $employee['street'] ?>">
        </div>
        <div class="col-sm-2">
            <label for="houseNumber">Номер будинку</label>
            <input type="number" class="form-control" name="houseNumber" id="houseNumber" value="<?= $employee['houseNumber'] ?>">
        </div>
        <div class="col-sm-2">
            <label for="apartmentNumber">Номер квартири</label>
            <input type="number" class="form-control" name="apartmentNumber" id="apartmentNumber" value="<?= $employee['apartmentNumber'] ?>">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-4">
            <label for="phoneNumber">Номер телефону</label>
            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="<?= $employee['phoneNumber'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="email">Електронна пошта</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $employee['email'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="postIndex">Поштовий індекс</label>
            <input type="number" class="form-control" name="postIndex" id="postIndex" value="<?= $employee['postIndex'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="regionStateRegistration">Область проживання за державною реєстрацією</label>
            <input type="text" class="form-control" name="regionStateRegistration" id="regionStateRegistration" value="<?= $employee['regionStateRegistration'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="cityStateRegistration">Місто за державною реєстрацією</label>
            <input type="text" class="form-control" name="cityStateRegistration" id="cityStateRegistration" value="<?= $employee['cityStateRegistration'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="districtStateRegistration">Район за державною реєстрацією</label>
            <input type="text" class="form-control" name="districtStateRegistration" id="districtStateRegistration" value="<?= $employee['districtStateRegistration'] ?>">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-3">
            <label for="streetStateRegistration">Вулиця за державною реєстрацією</label>
            <input type="text" class="form-control" name="streetStateRegistration" id="streetStateRegistration" value="<?= $employee['streetStateRegistration'] ?>">
        </div>
        <div class="col-sm-3">
            <label for="houseStateRegistration">Номер будинку</label>
            <input type="number" class="form-control" name="houseStateRegistration" id="houseStateRegistration" value="<?= $employee['houseStateRegistration'] ?>">
        </div>
        <div class="col-sm-3">
            <label for="apartmentStateRegistration">Номер квартири</label>
            <input type="number" class="form-control" name="apartmentStateRegistration" id="apartmentStateRegistration" value="<?= $employee['apartmentStateRegistration'] ?>">
        </div>
        <div class="col-sm-3">
            <label for="postIndexStateRegistration">Поштовий індекс</label>
            <input type="number" class="form-control" name="postIndexStateRegistration" id="postIndexStateRegistration" value="<?= $employee['postIndexStateRegistration'] ?>">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-3">
            <label for="passportSeries">Серія паспорту</label>
            <input type="text" class="form-control" name="passportSeries" id="passportSeries" value="<?= $employee['passportSeries'] ?>">
        </div>
        <div class="col-sm-3">
            <label for="passportNumber">Номер паспорту</label>
            <input type="text" class="form-control" name="passportNumber" id="passportNumber" value="<?= $employee['passportNumber'] ?>">
        </div>
        <div class="col-sm-3">
            <label for="passportIssued">Ким виданий</label>
            <input type="text" class="form-control" name="passportIssued" id="passportIssued" value="<?= $employee['passportIssued'] ?>">
        </div>
        <div class="col-sm-3">
            <label for="passportIssueDate">Дата видачі</label>
            <input type="date" class="form-control" name="passportIssueDate" id="passportIssueDate" value="<?= $employee['passportIssueDate'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="accountingGroup">Група обліку</label>
            <input type="text" class="form-control" name="accountingGroup" id="accountingGroup" value="<?= $employee['accountingGroup'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="accountingCategory">Категорія обліку</label>
            <input type="text" class="form-control" name="accountingCategory" id="accountingCategory" value="<?= $employee['accountingCategory'] ?>">
        </div>
        <div class="col-sm-4">
            <label for="staff">Склад</label>
            <input type="text" class="form-control" name="staff" id="staff" value="<?= $employee['staff'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label for="militaryRank">Військове звання</label>
            <input type="text" class="form-control" name="militaryRank" id="militaryRank" value="<?= $employee['militaryRank'] ?>">
        </div>
        <div class="col-sm-6">
            <label for="militaryAccountingSpecialtyNumber">Військово-облікова спецціальність №</label>
            <input type="number" class="form-control" name="militaryAccountingSpecialtyNumber" id="militaryAccountingSpecialtyNumber" value="<?= $employee['militaryAccountingSpecialtyNumber'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label for="militaryServiceSuitability">Придатність до військової служби</label>
            <input type="text" class="form-control" name="militaryServiceSuitability" id="militaryServiceSuitability" value="<?= $employee['militaryServiceSuitability'] ?>">
        </div>
        <div class="col-sm-6">
            <label for="registrationDMCommissariatName">Назва райвійськкомату за місцем реєстрації</label>
            <input type="text" class="form-control" name="registrationDMCommissariatName" id="registrationDMCommissariatName" value="<?= $employee['registrationDMCommissariatName'] ?>">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-6">
            <label for="actualDMCommissariatName">Назва райвійськкомату за фактичним місцем проживання</label>
            <input type="text" class="form-control" name="actualDMCommissariatName" id="actualDMCommissariatName" value="<?= $employee['actualDMCommissariatName'] ?>">
        </div>
        <div class="col-sm-6">
            <label for="specialAccounting">Перебування на спеціальному обліку</label>
            <input type="text" class="form-control" name="specialAccounting" id="specialAccounting" value="<?= $employee['specialAccounting'] ?>">
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary">Зберегти</button>
    </div>
</form>