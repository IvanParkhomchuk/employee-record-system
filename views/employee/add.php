<h2 class="text-center my-3">Додавання працівника</h2>

<form method="post" action="" enctype="multipart/form-data">
    <div class="row mb-5">
        <div class="col-sm-6">
            <label for="enterpriseName">Назва підприємства</label>
            <input type="text" class="form-control" id="enterpriseName" name="enterpriseName" required>

            <?php if (!empty($errors['enterpriseName'])) : ?>
                <div class="form-text text-danger"><?= $errors['enterpriseName']; ?></div>
            <?php endif; ?>
        </div>

        <div class="col-sm-6">
            <label for="EDRPOUcode">Код ЄДРПОУ</label>
            <input type="number" class="form-control" id="EDRPOUcode" name="EDRPOUcode" required>

            <?php if (!empty($errors['EDRPOUcode'])) : ?>
                <div class="form-text text-danger"><?= $errors['EDRPOUcode']; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="completionDate">Дата заповнення</label>
            <input type="date" class="form-control" id="completionDate" name="completionDate" required>

            <?php if (!empty($errors['completionDate'])) : ?>
                <div class="form-text text-danger"><?= $errors['completionDate']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <label for="personnelNumber">Табельний номер</label>
            <input type="number" class="form-control" id="personnelNumber" name="personnelNumber" required>

            <?php if (!empty($errors['personnelNumber'])) : ?>
                <div class="form-text text-danger"><?= $errors['personnelNumber']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <label for="identificationNumber">Індивідуальний ідентифікаційний номер</label>
            <input type="number" class="form-control" id="identificationNumber" name="identificationNumber" required>

            <?php if (!empty($errors['identificationNumber'])) : ?>
                <div class="form-text text-danger"><?= $errors['identificationNumber']; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-sm-4">
            <label for="gender">Стать</label>

            <select name="gender" id="gender" class="form-control">
                <option value="Чоловіча">Чоловіча</option>
                <option value="Жіноча">Жіноча</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label for="workType">Вид роботи</label>

            <select name="workType" id="workType" class="form-control">
                <option value="Основна">Основна</option>
                <option value="За сумісництвом">За сумісництвом</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label for="file">Фото</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="lastname">Прізвище</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>

            <?php if (!empty($errors['lastname'])) : ?>
                <div class="form-text text-danger"><?= $errors['lastname']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <label for="firstname">Ім'я</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>

            <?php if (!empty($errors['firstname'])) : ?>
                <div class="form-text text-danger"><?= $errors['firstname']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <label for="midname">По батькові</label>
            <input type="text" class="form-control" id="midname" name="midname" required>

            <?php if (!empty($errors['midname'])) : ?>
                <div class="form-text text-danger"><?= $errors['midname']; ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-sm-4">
            <label for="birthdate">Дата народження</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>

            <?php if (!empty($errors['birthdate'])) : ?>
                <div class="form-text text-danger"><?= $errors['birthdate']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <label for="citizenship">Громадянство</label>
            <input type="text" class="form-control" id="citizenship" name="citizenship" required>

            <?php if (!empty($errors['citizenship'])) : ?>
                <div class="form-text text-danger"><?= $errors['citizenship']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <label for="education">Освіта</label>

            <select name="education" id="education" class="form-control">
                <option value="Базова загальна середня">Базова загальна середня</option>
                <option value="Повна загальна середня">Повна загальна середня</option>
                <option value="Професійно-технічна">Професійно-технічна</option>
                <option value="Неповна вища">Неповна вища</option>
                <option value="Базова вища">Базова вища</option>
                <option value="Повна вища">Повна вища</option>
            </select>
        </div>
    </div>

    <div class="mb-5">
        <div class="parent-education-block">
            <div class="d-flex justify-content-end">
                <button type="button" id="append-btn1" class="btn btn-primary mx-3">Додати</button>
                <button type="button" id="remove-btn1" class="btn btn-danger">Видалити</button>
            </div>
            <div class="education-block">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="institutionName">Назва освітнього закладу</label>
                        <input type="text" class="form-control" id="institutionName" name="institutionName[]" required>

                        <?php if (!empty($errors['institutionName'])) : ?>
                            <div class="form-text text-danger"><?= $errors['institutionName']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-3">
                        <label for="diplomaCertificate">Диплом (свідоцтво)</label>
                        <input type="text" class="form-control" id="diplomaCertificate" name="diplomaCertificate[]" required>

                        <?php if (!empty($errors['diplomaCertificate'])) : ?>
                            <div class="form-text text-danger"><?= $errors['diplomaCertificate']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-2">
                        <label for="diplomaSeries">Серія</label>
                        <input type="text" class="form-control" id="diplomaSeries" name="diplomaSeries[]" required>

                        <?php if (!empty($errors['diplomaSeries'])) : ?>
                            <div class="form-text text-danger"><?= $errors['diplomaSeries']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-2">
                        <label for="diplomaNumber">Номер</label>
                        <input type="text" class="form-control" id="diplomaNumber" name="diplomaNumber[]" required>

                        <?php if (!empty($errors['diplomaNumber'])) : ?>
                            <div class="form-text text-danger"><?= $errors['diplomaNumber']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-2">
                        <label for="graduationYear">Рік закінчення</label>
                        <input type="date" class="form-control" id="citizenship" name="graduationYear[]" required>

                        <?php if (!empty($errors['citizenship'])) : ?>
                            <div class="form-text text-danger"><?= $errors['citizenship']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="diplomaSpecialty">Спеціальінсть за дипломом</label>
                        <input type="text" class="form-control" id="diplomaSpecialty" name="diplomaSpecialty[]" required>

                        <?php if (!empty($errors['diplomaSpecialty'])) : ?>
                            <div class="form-text text-danger"><?= $errors['diplomaSpecialty']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-4">
                        <label for="diplomaQualification">Кваліфікація за дипломом</label>
                        <input type="text" class="form-control" id="diplomaQualification" name="diplomaQualification[]" required>

                        <?php if (!empty($errors['diplomaQualification'])) : ?>
                            <div class="form-text text-danger"><?= $errors['diplomaQualification']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-4">
                        <label for="educationForm">Форма навчання</label>

                        <select name="educationForm[]" id="educationForm" class="form-control">
                            <option value="Денна">Денна</option>
                            <option value="Вечірня">Вечірня</option>
                            <option value="Заочна">Заочна</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex mb-1">
        <div class="form-check">
            <input type="checkbox" name="graduateSchool" class="form-check-input" id="graduateSchool" />
            <label for="graduateSchool" class="form-check-label">Аспірантура</label>
        </div>
        <div class="form-check mx-3">
            <input type="checkbox" name="adjunct" class="form-check-input" id="adjunct" />
            <label for="adjunct" class="form-check-label">Ад'юнктура</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="doctorate" class="form-check-input" id="doctorate" />
            <label for="doctorate" class="form-check-label">Докторантура</label>
        </div>
    </div>

    <div class="mb-5">
        <div class="parent-block2">
            <div class="graduateSchoolCheck mb-4">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="scientificInstitutionName">Назва освітнього закладу</label>
                        <input type="text" id="scientificInstitutionName" name="scientificInstitutionName[]" class="form-control gs-input" placeholder="Аспірантура">
                    </div>
                    <div class="col-sm-3">
                        <label for="diploma">Диплом</label>
                        <input type="text" id="diploma" name="diploma[]" class="form-control gs-input">
                    </div>
                    <div class="col-sm-3">
                        <label for="diplomaNumber2">Номер диплому</label>
                        <input type="text" id="diplomaNumber2" name="diplomaNumber2[]" class="form-control gs-input">
                    </div>
                    <div class="col-sm-3">
                        <label for="diplomaIssueDate">Дата видачі</label>
                        <input type="date" id="diplomaIssueDate" name="diplomaIssueDate[]" class="form-control gs-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="graduationYear2">Рік закінчення</label>
                        <input type="text" id="graduationYear2" name="graduationYear2[]" class="form-control gs-input">
                    </div>
                    <div class="col-sm-4">
                        <label for="scientificDegree">Науковий ступінь</label>
                        <input type="text" id="scientificDegree" name="scientificDegree[]" class="form-control gs-input">
                    </div>
                    <div class="col-sm-4">
                        <label for="academicStatus">Учене звання</label>
                        <input type="text" id="academicStatus" name="academicStatus[]" class="form-control gs-input">
                    </div>
                </div>
            </div>
            <div class="adjunctCheck mb-4">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="scientificInstitutionName">Назва освітнього закладу</label>
                        <input type="text" id="scientificInstitutionName" name="scientificInstitutionName[]" class="form-control" placeholder="Ад'юнктура">
                    </div>
                    <div class="col-sm-3">
                        <label for="diploma">Диплом</label>
                        <input type="text" id="diploma" name="diploma[]" class="form-control adjunct-input">
                    </div>
                    <div class="col-sm-3">
                        <label for="diplomaNumber2">Номер диплому</label>
                        <input type="text" id="diplomaNumber2" name="diplomaNumber2[]" class="form-control adjunct-input">
                    </div>
                    <div class="col-sm-3">
                        <label for="diplomaIssueDate">Дата видачі</label>
                        <input type="date" id="diplomaIssueDate" name="diplomaIssueDate[]" class="form-control adjunct-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="graduationYear2">Рік закінчення</label>
                        <input type="text" id="graduationYear2" name="graduationYear2[]" class="form-control adjunct-input">
                    </div>
                    <div class="col-sm-4">
                        <label for="scientificDegree">Науковий ступінь</label>
                        <input type="text" id="scientificDegree" name="scientificDegree[]" class="form-control adjunct-input">
                    </div>
                    <div class="col-sm-4">
                        <label for="academicStatus">Учене звання</label>
                        <input type="text" id="academicStatus" name="academicStatus[]" class="form-control adjunct-input">
                    </div>
                </div>
            </div>
            <div class="doctorateCheck mb-4">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="scientificInstitutionName">Назва освітнього закладу</label>
                        <input type="text" id="scientificInstitutionName" name="scientificInstitutionName[]" class="form-control doctorate-input" placeholder="Докторантура">
                    </div>
                    <div class="col-sm-3">
                        <label for="diploma">Диплом</label>
                        <input type="text" id="diploma" name="diploma[]" class="form-control doctorate-input">
                    </div>
                    <div class="col-sm-3">
                        <label for="diplomaNumber2">Номер диплому</label>
                        <input type="text" id="diplomaNumber2" name="diplomaNumber2[]" class="form-control doctorate-input">
                    </div>
                    <div class="col-sm-3">
                        <label for="diplomaIssueDate">Дата видачі</label>
                        <input type="date" id="diplomaIssueDate" name="diplomaIssueDate[]" class="form-control doctorate-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="graduationYear2">Рік закінчення</label>
                        <input type="text" id="graduationYear2" name="graduationYear2[]" class="form-control doctorate-input">
                    </div>
                    <div class="col-sm-4">
                        <label for="scientificDegree">Науковий ступінь</label>
                        <input type="text" id="scientificDegree" name="scientificDegree[]" class="form-control doctorate-input">
                    </div>
                    <div class="col-sm-4">
                        <label for="academicStatus">Учене звання</label>
                        <input type="text" id="academicStatus" name="academicStatus[]" class="form-control doctorate-input">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label for="lastWorkPlace">Останнє місце роботи</label>
            <input type="text" class="form-control" id="lastWorkPlace" name="lastWorkPlace">
        </div>
        <div class="col-sm-6">
            <label for="lastWorkPlacePosition">Посада</label>
            <input type="text" class="form-control" id="lastWorkPlacePosition" name="lastWorkPlacePosition">
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-sm-6">
            <label for="acceptanceDate">Дата прийняття</label>
            <input type="date" class="form-control" id="acceptanceDate" name="acceptanceDate">
        </div>
        <div class="col-sm-2">
            <label for="serviceDays">Вислуга дні</label>
            <input type="number" class="form-control" id="serviceDays" name="serviceDays">
        </div>
        <div class="col-sm-2">
            <label for="serviceMonths">місяці</label>
            <input type="number" class="form-control" id="serviceMonths" name="serviceMonths">
        </div>
        <div class="col-sm-2">
            <label for="serviceYears">роки</label>
            <input type="number" class="form-control" id="serviceYears" name="serviceYears">
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-sm-12">
            <label for="dismissedDate">Дата звільнення</label>
            <input type="date" class="form-control" id="dismissedDate" name="dismissedDate">
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-sm-6">
            <label for="dismissedReason">Причина звільнення</label>
            <textarea class="form-control" name="dismissedReason" id="dismissedReason" rows="2"></textarea>
        </div>
        <div class="col-sm-6">
            <label for="pensionInformation">Відомості про отримання пенсії</label>
            <textarea class="form-control" name="pensionInformation" id="pensionInformation" rows="2"></textarea>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-sm-12">
            <label for="familyStatus">Родинний стан</label>
            <input type="text" class="form-control" id="familyStatus" name="familyStatus">
        </div>
    </div>

    <div class="mb-5">
        <div class="parent-family-block">
            <div class="d-flex justify-content-end">
                <button type="button" id="append-btn2" class="btn btn-primary mx-3">Додати</button>
                <button type="button" id="remove-btn2" class="btn btn-danger">Видалити</button>
            </div>
            <div class="family-block">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="familyMembers">Член родини</label>
                        <input type="text" class="form-control" id="familyMembers" name="familyMembers[]">
                    </div>
                    <div class="col-sm-4">
                        <label for="familyFullname">ПІБ</label>
                        <input type="text" class="form-control" id="familyFullname" name="familyFullname[]">
                    </div>
                    <div class="col-sm-4">
                        <label for="familyBirthdate">Рік народження</label>
                        <input type="date" class="form-control" id="familyBirthdate" name="familyBirthdate[]">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <label for="region">Область проживання</label>
            <input type="text" class="form-control" name="region" id="region" required>

            <?php if (!empty($errors['region'])) : ?>
                <div class="form-text text-danger"><?= $errors['region']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-2">
            <label for="city">Місто</label>
            <input type="text" class="form-control" name="city" id="city" required>

            <?php if (!empty($errors['city'])) : ?>
                <div class="form-text text-danger"><?= $errors['city']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-2">
            <label for="district">Район</label>
            <input type="text" class="form-control" name="district" id="district" required>

            <?php if (!empty($errors['district'])) : ?>
                <div class="form-text text-danger"><?= $errors['district']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-2">
            <label for="street">Вулиця</label>
            <input type="text" class="form-control" name="street" id="street" required>

            <?php if (!empty($errors['street'])) : ?>
                <div class="form-text text-danger"><?= $errors['street']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-2">
            <label for="houseNumber">Номер будинку</label>
            <input type="number" class="form-control" name="houseNumber" id="houseNumber" required>

            <?php if (!empty($errors['houseNumber'])) : ?>
                <div class="form-text text-danger"><?= $errors['houseNumber']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-2">
            <label for="apartmentNumber">Номер квартири</label>
            <input type="number" class="form-control" name="apartmentNumber" id="apartmentNumber" required>

            <?php if (!empty($errors['apartmentNumber'])) : ?>
                <div class="form-text text-danger"><?= $errors['apartmentNumber']; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mb-5">
         <div class="col-sm-4">
             <label for="phoneNumber">Номер телефону</label>
             <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" required>

             <?php if (!empty($errors['phoneNumber'])) : ?>
                 <div class="form-text text-danger"><?= $errors['phoneNumber']; ?></div>
             <?php endif; ?>
         </div>
         <div class="col-sm-4">
            <label for="email">Електронна пошта</label>
            <input type="email" class="form-control" name="email" id="email" required>

             <?php if (!empty($errors['email'])) : ?>
                 <div class="form-text text-danger"><?= $errors['email']; ?></div>
             <?php endif; ?>
         </div>
        <div class="col-sm-4">
            <label for="postIndex">Поштовий індекс</label>
            <input type="number" class="form-control" name="postIndex" id="postIndex" required>

            <?php if (!empty($errors['postIndex'])) : ?>
                <div class="form-text text-danger"><?= $errors['postIndex']; ?></div>
            <?php endif; ?>
         </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="regionStateRegistration">Область проживання за державною реєстрацією</label>
            <input type="text" class="form-control" name="regionStateRegistration" id="regionStateRegistration" required>

            <?php if (!empty($errors['regionStateRegistration'])) : ?>
                <div class="form-text text-danger"><?= $errors['regionStateRegistration']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <label for="cityStateRegistration">Місто за державною реєстрацією</label>
            <input type="text" class="form-control" name="cityStateRegistration" id="cityStateRegistration" required>

            <?php if (!empty($errors['cityStateRegistration'])) : ?>
                <div class="form-text text-danger"><?= $errors['cityStateRegistration']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <label for="districtStateRegistration">Район за державною реєстрацією</label>
            <input type="text" class="form-control" name="districtStateRegistration" id="districtStateRegistration" required>

            <?php if (!empty($errors['districtStateRegistration'])) : ?>
                <div class="form-text text-danger"><?= $errors['districtStateRegistration']; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-sm-3">
            <label for="streetStateRegistration">Вулиця за державною реєстрацією</label>
            <input type="text" class="form-control" name="streetStateRegistration" id="streetStateRegistration" required>

            <?php if (!empty($errors['streetStateRegistration'])) : ?>
                <div class="form-text text-danger"><?= $errors['streetStateRegistration']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-3">
            <label for="houseStateRegistration">Номер будинку</label>
            <input type="number" class="form-control" name="houseStateRegistration" id="houseStateRegistration" required>

            <?php if (!empty($errors['houseStateRegistration'])) : ?>
                <div class="form-text text-danger"><?= $errors['houseStateRegistration']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-3">
            <label for="apartmentStateRegistration">Номер квартири</label>
            <input type="number" class="form-control" name="apartmentStateRegistration" id="apartmentStateRegistration"> required

            <?php if (!empty($errors['apartmentStateRegistration'])) : ?>
                <div class="form-text text-danger"><?= $errors['apartmentStateRegistration']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-3">
            <label for="postIndexStateRegistration">Поштовий індекс</label>
            <input type="number" class="form-control" name="postIndexStateRegistration" id="postIndexStateRegistration" required>

            <?php if (!empty($errors['postIndexStateRegistration'])) : ?>
                <div class="form-text text-danger"><?= $errors['postIndexStateRegistration']; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-sm-3">
            <label for="passportSeries">Серія паспорту</label>
            <input type="text" class="form-control" name="passportSeries" id="passportSeries" required>

            <?php if (!empty($errors['passportSeries'])) : ?>
                <div class="form-text text-danger"><?= $errors['passportSeries']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-3">
            <label for="passportNumber">Номер паспорту</label>
            <input type="text" class="form-control" name="passportNumber" id="passportNumber" required>

            <?php if (!empty($errors['passportNumber'])) : ?>
                <div class="form-text text-danger"><?= $errors['passportNumber']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-3">
            <label for="passportIssued">Ким виданий</label>
            <input type="text" class="form-control" name="passportIssued" id="passportIssued" required>

            <?php if (!empty($errors['passportIssued'])) : ?>
                <div class="form-text text-danger"><?= $errors['passportIssued']; ?></div>
            <?php endif; ?>
        </div>
        <div class="col-sm-3">
            <label for="passportIssueDate">Дата видачі</label>
            <input type="date" class="form-control" name="passportIssueDate" id="passportIssueDate" required>

            <?php if (!empty($errors['passportIssueDate'])) : ?>
                <div class="form-text text-danger"><?= $errors['passportIssueDate']; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="accountingGroup">Група обліку</label>
            <input type="text" class="form-control" name="accountingGroup" id="accountingGroup">
        </div>
        <div class="col-sm-4">
            <label for="accountingCategory">Категорія обліку</label>
            <input type="text" class="form-control" name="accountingCategory" id="accountingCategory">
        </div>
        <div class="col-sm-4">
            <label for="staff">Склад</label>
            <input type="text" class="form-control" name="staff" id="staff">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label for="militaryRank">Військове звання</label>
            <input type="text" class="form-control" name="militaryRank" id="militaryRank">
        </div>
        <div class="col-sm-6">
            <label for="militaryAccountingSpecialtyNumber">Військово-облікова спецціальність №</label>
            <input type="number" class="form-control" name="militaryAccountingSpecialtyNumber" id="militaryAccountingSpecialtyNumber">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label for="militaryServiceSuitability">Придатність до військової служби</label>
            <input type="text" class="form-control" name="militaryServiceSuitability" id="militaryServiceSuitability">
        </div>
        <div class="col-sm-6">
            <label for="registrationDMCommissariatName">Назва райвійськкомату за місцем реєстрації</label>
            <input type="text" class="form-control" name="registrationDMCommissariatName" id="registrationDMCommissariatName">
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-sm-6">
            <label for="actualDMCommissariatName">Назва райвійськкомату за фактичним місцем проживання</label>
            <input type="text" class="form-control" name="actualDMCommissariatName" id="actualDMCommissariatName">
        </div>
        <div class="col-sm-6">
            <label for="specialAccounting">Перебування на спеціальному обліку</label>
            <input type="text" class="form-control" name="specialAccounting" id="specialAccounting">
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary">Додати працівника</button>
    </div>
</form>