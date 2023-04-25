<?php
    /** @var array $employee */
    /** @var array $personalInfo */
    /** @var array $enterpriseInfo */
    /** @var array $education */
    /** @var array $graduateSchool */
    /** @var array $postgraduateSchool */
    /** @var array $doctorate */
    /** @var array $lastwork */
    /** @var array $family */
    /** @var array $actualResidence */
    /** @var array $residenceStateReg */
    /** @var array $passport */
    /** @var array $militaryRec */
    /** @var array $professionalEducation */
    /** @var array $transfer */
    /** @var array $vacation */
    /** @var array $otherInfo */
    /** @var array $districts */
    /** @var array $departments */
    /** @var array $positions */
    /** @var int|null $position_id */
?>

<h2 class="text-center my-3">Редагування працівника</h2>

<div class="row">
    <div class="col-md-12 mx-0">
        <form id="msform" method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <div class="form-card">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="fired" name="fired"
                            <?php if ($personalInfo['fired'] || $_POST['fired']) echo 'checked' ?>
                        />
                        <label for="fired">Звільнити</label>
                    </div>

                    <h3 class="fs-title">Загальна інформація</h3>

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div>
                                <label for="enterpriseName">Назва підприємства</label>
                                <input type="text" class="form-control" id="enterpriseName" name="enterpriseName"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['enterpriseName']) ? $_POST['enterpriseName'] : $enterpriseInfo['enterpriseName'] ?>"
                                />

                                <?php if (!empty($errors['enterpriseName'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['enterpriseName']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="EDRPOUcode">Код ЄДРПОУ</label>
                                <input type="number" class="form-control" id="EDRPOUcode" name="EDRPOUcode"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['EDRPOUcode']) ? $_POST['EDRPOUcode'] : $enterpriseInfo['EDRPOUcode'] ?>"
                                />

                                <?php if (!empty($errors['EDRPOUcode'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['EDRPOUcode']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div>
                                <label for="completionDate">Дата заповнення</label>
                                <input type="date" class="form-control" id="completionDate" name="completionDate"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['completionDate']) ? $_POST['completionDate'] : $enterpriseInfo['completionDate'] ?>"
                                />

                                <?php if (!empty($errors['completionDate'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['completionDate']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="workType">Тип роботи</label>
                                <input type="text" class="form-control" id="workType" name="workType" autocomplete="off" required
                                           value="<?= !empty($_POST['workType']) ? $_POST['workType'] : $enterpriseInfo['workType'] ?>"
                                />

                                <?php if (!empty($errors['workType'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['workType']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Особиста інформація</h3>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="firstname">Ім'я</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname"
                                                   autocomplete="off" required
                                                   value="<?= !empty($_POST['firstname']) ? $_POST['firstname'] : $personalInfo['firstname'] ?>"
                                            />

                                            <?php if (!empty($errors['firstname'])) : ?>
                                                <div class="form-text text-danger"><?= $errors['firstname']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="lastname">Прізвище</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" autocomplete="off" required
                                                   value="<?= !empty($_POST['lastname']) ? $_POST['lastname'] : $personalInfo['lastname'] ?>"
                                            />

                                            <?php if (!empty($errors['lastname'])) : ?>
                                                <div class="form-text text-danger"><?= $errors['lastname']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="midname">По батькові</label>
                                            <input type="text" class="form-control" id="midname" name="midname" autocomplete="off" required
                                                   value="<?= !empty($_POST['midname']) ? $_POST['midname'] : $personalInfo['midname'] ?>"
                                            />

                                            <?php if (!empty($errors['midname'])) : ?>
                                                <div class="form-text text-danger"><?= $errors['midname']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="phoneNumber">Номер телефону</label>
                                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                                   autocomplete="off" required
                                                   value="<?= !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : $personalInfo['phoneNumber'] ?>"
                                            />

                                            <?php if (!empty($errors['phoneNumber'])) : ?>
                                                <div class="form-text text-danger"><?= $errors['phoneNumber']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="email">Електронна пошта</label>
                                            <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                                                   value="<?= !empty($_POST['email']) ? $_POST['email'] : $personalInfo['email'] ?>"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="gender">Стать</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <?php if ($_POST['gender']) : ?>
                                                    <option <?php if ($_POST['gender'] == 'Чоловіча') echo 'selected' ?> value="Чоловіча">Чоловіча</option>
                                                    <option <?php if ($_POST['gender'] == 'Жіноча') echo 'selected' ?> value="Жіноча">Жіноча</option>
                                                <?php else : ?>
                                                    <option <?php if ($personalInfo['gender'] == 'Чоловіча') echo 'selected' ?> value="Чоловіча">Чоловіча</option>
                                                    <option <?php if ($personalInfo['gender'] == 'Жіноча') echo 'selected' ?> value="Жіноча">Жіноча</option>
                                                <?php endif; ?>
                                            </select>

                                            <?php if (!empty($errors['gender'])) : ?>
                                                <div class="form-text text-danger"><?= $errors['gender']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="citizenship">Громадянство</label>
                                            <input type="text" class="form-control" id="citizenship" name="citizenship"
                                                   autocomplete="off" required
                                                   value="<?= !empty($_POST['citizenship']) ? $_POST['citizenship'] : $personalInfo['citizenship'] ?>"
                                            />

                                            <?php if (!empty($errors['citizenship'])) : ?>
                                                <div class="form-text text-danger"><?= $errors['citizenship']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="birthdate">Дата народження</label>
                                            <input type="date" class="form-control" id="birthdate" name="birthdate" required
                                                   value="<?= !empty($_POST['birthdate']) ? $_POST['birthdate'] : $personalInfo['birthdate'] ?>"
                                            />

                                            <?php if (!empty($errors['birthdate'])) : ?>
                                                <div class="form-text text-danger"><?= $errors['birthdate']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="personnelNumber">Табельний номер</label>
                                            <input type="text" class="form-control" id="personnelNumber" name="personnelNumber"
                                                   value="<?= !empty($_POST['personnelNumber']) ? $_POST['personnelNumber'] : $personalInfo['personnelNumber'] ?>"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <label for="identificationNumber">Індивідуальний ідентифікаційний номер</label>
                                            <input type="number" class="form-control" id="identificationNumber"
                                                   name="identificationNumber"
                                                   value="<?= !empty($_POST['identificationNumber']) ? $_POST['identificationNumber'] : $personalInfo['identificationNumber'] ?>"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <label for="district_id">Район</label>

                                        <select class="form-control" id="district_id" name="district_id">
                                            <?php foreach ($districts as $district) : ?>
                                                <?php if ($district['id'] == $employee['district_id']) : ?>
                                                    <option <?php if ($district['id'] == $_POST['district_id']) echo 'selected'; ?>
                                                            value="<?= $district['id'] ?>"><?= $district['name'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="department_id">Відділ</label>

                                        <select class="form-control" id="department_id" name="department_id">
                                            <?php foreach ($departments as $department) : ?>
                                                <?php if ($department['id'] == $employee['department_id']) : ?>
                                                    <option <?php if ($department['id'] == $_POST['department_id']) echo 'selected'; ?>
                                                            value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        <div>
                                            <label for="file">Фото</label>

                                            <?php $filePath = 'files/employee/' . $personalInfo['photo']; ?>

                                            <?php if (is_file($filePath)) : ?>
                                                <img src="/<?= $filePath ?>" class="card-img-top img-thumbnail" alt="">
                                            <?php else : ?>
                                                <img src="/static/images/no-image.jpg" class="card-img-top img-thumbnail" alt="">
                                            <?php endif; ?>

                                            <input type="file" accept=".jpg, .jpeg, .png" class="form-control mt-2" id="file" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h2 class="fs-title">Освіта</h2>

                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <label for="education">Освіта</label>
                            <select name="education" id="education" class="form-control">
                                <?php if ($_POST['workType']) : ?>
                                    <option <?php if ($_POST['education'] == 'Базова загальна середня') echo 'selected' ?> value="Базова загальна середня">Базова загальна середня</option>
                                    <option <?php if ($_POST['education'] == 'Повна загальна середня') echo 'selected' ?> value="Повна загальна середня">Повна загальна середня</option>
                                    <option <?php if ($_POST['education'] == 'Професійно-технічна') echo 'selected' ?> value="Професійно-технічна">Професійно-технічна</option>
                                    <option <?php if ($_POST['education'] == 'Неповна вища') echo 'selected' ?> value="Неповна вища">Неповна вища</option>
                                    <option <?php if ($_POST['education'] == 'Базова вища') echo 'selected' ?> value="Базова вища">Базова вища</option>
                                    <option <?php if ($_POST['education'] == 'Повна вища') echo 'selected' ?> value="Повна вища">Повна вища</option>
                                <?php else : ?>
                                    <option <?php if ($education['education'] == 'Базова загальна середня') echo 'selected' ?> value="Базова загальна середня">Базова загальна середня</option>
                                    <option <?php if ($education['education'] == 'Повна загальна середня') echo 'selected' ?> value="Повна загальна середня">Повна загальна середня</option>
                                    <option <?php if ($education['education'] == 'Професійно-технічна') echo 'selected' ?> value="Професійно-технічна">Професійно-технічна</option>
                                    <option <?php if ($education['education'] == 'Неповна вища') echo 'selected' ?> value="Неповна вища">Неповна вища</option>
                                    <option <?php if ($education['education'] == 'Базова вища') echo 'selected' ?> value="Базова вища">Базова вища</option>
                                    <option <?php if ($education['education'] == 'Повна вища') echo 'selected' ?> value="Повна вища">Повна вища</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="parent-education-block">
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" id="append-education-btn" class="btn btn-primary mx-3">Додати</button>
                            <button type="button" id="remove-education-btn" class="btn btn-danger">Видалити</button>
                        </div>

                        <?php if (!empty($_POST)) : ?>
                            <?php for ($i = 0; $i < count($_POST['institutionName']); $i++) : ?>
                                <div class="education-block py-4">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="institutionName">Назва освітнього закладу</label>
                                            <input type="text" class="form-control" id="institutionName" name="institutionName[]"
                                                   value="<?= $_POST['institutionName'][$i] ?>"
                                            />
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="diplomaCertificate">Диплом(сертифікат)</label>
                                            <input type="text" class="form-control" id="diplomaCertificate" name="diplomaCertificate[]"
                                                   value="<?= $_POST['diplomaCertificate'][$i] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="diplomaSeries">Серія диплому</label>
                                            <input type="text" class="form-control" id="diplomaSeries" name="diplomaSeries[]"
                                                   value="<?= $_POST['diplomaSeries'][$i] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="diplomaNumber">Номер диплому</label>
                                            <input type="number" class="form-control" id="diplomaNumber" name="diplomaNumber[]"
                                                   value="<?= $_POST['diplomaNumber'][$i] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="graduationYear">Рік закінчення</label>
                                            <input type="date" class="form-control" id="citizenship" name="graduationYear[]"
                                                   value="<?= $_POST['graduationYear'][$i] ?>"
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="diplomaSpecialty">Спеціальінсть за дипломом</label>
                                            <input type="text" class="form-control" id="diplomaSpecialty" name="diplomaSpecialty[]"
                                                   value="<?= $_POST['diplomaSpecialty'][$i] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="diplomaQualification">Кваліфікація за дипломом</label>
                                            <input type="text" class="form-control" id="diplomaQualification" name="diplomaQualification[]"
                                                   value="<?= $_POST['diplomaQualification'][$i] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="educationForm">Форма навчання</label>

                                            <select name="educationForm[]" id="educationForm" class="form-control">
                                                <option <?php if ($_POST['educationForm'][$i] == 'Денна') echo 'selected' ?> value="Денна">Денна</option>
                                                <option <?php if ($_POST['educationForm'][$i] == 'Вечірня') echo 'selected' ?> value="Вечірня">Вечірня</option>
                                                <option <?php if ($_POST['educationForm'][$i] == 'Заочна') echo 'selected' ?> value="Заочна">Заочна</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = 0; $i < count($education); $i++) : ?>
                                <div class="education-block py-4">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="institutionName">Назва освітнього закладу</label>
                                            <input type="text" class="form-control" id="institutionName" name="institutionName[]"
                                                   value="<?= $education[$i]['institutionName'] ?>"
                                            />
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="diplomaCertificate">Диплом(сертифікат)</label>
                                            <input type="text" class="form-control" id="diplomaCertificate" name="diplomaCertificate[]"
                                                   value="<?= $education[$i]['diplomaCertificate'] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="diplomaSeries">Серія диплому</label>
                                            <input type="text" class="form-control" id="diplomaSeries" name="diplomaSeries[]"
                                                   value="<?= $education[$i]['diplomaSeries'] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="diplomaNumber">Номер диплому</label>
                                            <input type="number" class="form-control" id="diplomaNumber" name="diplomaNumber[]"
                                                   value="<?= $education[$i]['diplomaNumber'] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="graduationYear">Рік закінчення</label>
                                            <input type="date" class="form-control" id="citizenship" name="graduationYear[]"
                                                   value="<?= $education[$i]['graduationYear'] ?>"
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="diplomaSpecialty">Спеціальінсть за дипломом</label>
                                            <input type="text" class="form-control" id="diplomaSpecialty" name="diplomaSpecialty[]"
                                                   value="<?= $education[$i]['diplomaSpecialty'] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="diplomaQualification">Кваліфікація за дипломом</label>
                                            <input type="text" class="form-control" id="diplomaQualification" name="diplomaQualification[]"
                                                   value="<?= $education[$i]['diplomaQualification'] ?>"
                                            >
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="educationForm">Форма навчання</label>

                                            <select name="educationForm[]" id="educationForm" class="form-control">
                                                <option <?php if ($education[$i]['educationForm'] == 'Денна') echo 'selected' ?> value="Денна">Денна</option>
                                                <option <?php if ($education[$i]['educationForm'] == 'Вечірня') echo 'selected' ?> value="Вечірня">Вечірня</option>
                                                <option <?php if ($education[$i]['educationForm'] == 'Заочна') echo 'selected' ?> value="Заочна">Заочна</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-5 mt-3">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h2 class="fs-title">Післядипломна професійна підготовка</h2>

                    <div class="form-check">
                        <input type="checkbox" name="graduateSchool" class="form-check-input" id="graduateSchool"
                            <?php echo (!empty($_POST['graduateSchool'])
                                ? ($_POST['graduateSchool'] == 'on' ? 'checked' : '')
                                : ($graduateSchool['graduateSchool'] == 'on' ? 'checked' : '')
                            ) ?>
                        />

                        <label for="graduateSchool" class="form-check-label">Аспірантура</label>
                    </div>

                    <div class="graduateSchoolCheck mb-4">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="gsInstitutionName">Назва освітнього закладу</label>
                                <input type="text" id="gsInstitutionName" name="gsInstitutionName"
                                       class="form-control gs-input"
                                       value="<?= !empty($_POST['gsInstitutionName']) ? $_POST['gsInstitutionName'] : $graduateSchool['gsInstitutionName'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="gsDiploma">Диплом</label>
                                <input type="text" id="gsDiploma" name="gsDiploma" class="form-control gs-input"
                                       value="<?= !empty($_POST['gsDiploma']) ? $_POST['gsDiploma'] : $graduateSchool['gsDiploma'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="gsDiplomaNumber">Номер диплому</label>
                                <input type="number" id="gsDiplomaNumber" name="gsDiplomaNumber"
                                       class="form-control gs-input"
                                       value="<?= !empty($_POST['gsDiplomaNumber']) ? $_POST['gsDiplomaNumber'] : $graduateSchool['gsDiplomaNumber'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="gsDiplomaIssueDate">Дата видачі</label>
                                <input type="date" id="gsDiplomaIssueDate" name="gsDiplomaIssueDate"
                                       class="form-control gs-input"
                                       value="<?= !empty($_POST['gsDiplomaIssueDate']) ? $_POST['gsDiplomaIssueDate'] : $graduateSchool['gsDiplomaIssueDate'] ?>"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="gsGraduationYear">Рік закінчення</label>
                                <input type="date" id="gsGraduationYear" name="gsGraduationYear"
                                       class="form-control gs-input"
                                       value="<?= !empty($_POST['gsGraduationYear']) ? $_POST['gsGraduationYear'] : $graduateSchool['gsGraduationYear'] ?>"
                                />
                            </div>
                            <div class="col-sm-4">
                                <label for="gsScientificDegree">Науковий ступінь</label>
                                <input type="text" id="gsScientificDegree" name="gsScientificDegree"
                                       class="form-control gs-input"
                                       value="<?= !empty($_POST['gsScientificDegree']) ? $_POST['gsScientificDegree'] : $graduateSchool['gsScientificDegree'] ?>"
                                />
                            </div>
                            <div class="col-sm-4">
                                <label for="gsAcademicStatus">Учене звання</label>
                                <input type="text" id="gsAcademicStatus" name="gsAcademicStatus"
                                       class="form-control gs-input"
                                       value="<?= !empty($_POST['gsAcademicStatus']) ? $_POST['gsAcademicStatus'] : $graduateSchool['gsAcademicStatus'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h2 class="fs-title">Післядипломна професійна підготовка</h2>

                    <div class="form-check">
                        <input type="checkbox" name="postgraduateSchool" class="form-check-input" id="postgraduateSchool"
                            <?php echo (!empty($_POST['postgraduateSchool'])
                                ? ($_POST['postgraduateSchool'] == 'on' ? 'checked' : '')
                                : ($postgraduateSchool['postgraduateSchool'] == 'on' ? 'checked' : '')
                            ) ?>
                        />
                        <label for="postgraduateSchool" class="form-check-label">Ад'юнктура</label>
                    </div>

                    <div class="postgraduateSchoolCheck mb-4">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="psInstitutionName">Назва освітнього закладу</label>
                                <input type="text" id="psInstitutionName" name="psInstitutionName"
                                       class="form-control ps-input"
                                       value="<?= !empty($_POST['psInstitutionName']) ? $_POST['psInstitutionName'] : $postgraduateSchool['psInstitutionName'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="psDiploma">Диплом</label>
                                <input type="text" id="psDiploma" name="psDiploma" class="form-control ps-input"
                                       value="<?= !empty($_POST['psDiploma']) ? $_POST['psDiploma'] : $postgraduateSchool['psDiploma'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="psDiplomaNumber">Номер диплому</label>
                                <input type="number" id="psDiplomaNumber" name="psDiplomaNumber"
                                       class="form-control ps-input"
                                       value="<?= !empty($_POST['psDiplomaNumber']) ? $_POST['psDiplomaNumber'] : $postgraduateSchool['psDiplomaNumber'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="psDiplomaIssueDate">Дата видачі</label>
                                <input type="date" id="psDiplomaIssueDate" name="psDiplomaIssueDate"
                                       class="form-control ps-input"
                                       value="<?= !empty($_POST['psDiplomaIssueDate']) ? $_POST['psDiplomaIssueDate'] : $postgraduateSchool['psDiplomaIssueDate'] ?>"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="psDiplomaGraduationYear">Рік закінчення</label>
                                <input type="date" id="psDiplomaGraduationYear" name="psDiplomaGraduationYear"
                                       class="form-control ps-input"
                                       value="<?= !empty($_POST['psDiplomaGraduationYear']) ? $_POST['psDiplomaGraduationYear'] : $postgraduateSchool['psDiplomaGraduationYear'] ?>"
                                />
                            </div>
                            <div class="col-sm-4">
                                <label for="psScientificDegree">Науковий ступінь</label>
                                <input type="text" id="psScientificDegree" name="psScientificDegree"
                                       class="form-control ps-input"
                                       value="<?= !empty($_POST['psScientificDegree']) ? $_POST['psScientificDegree'] : $postgraduateSchool['psScientificDegree'] ?>"
                                />
                            </div>
                            <div class="col-sm-4">
                                <label for="psAcademicStatus">Учене звання</label>
                                <input type="text" id="psAcademicStatus" name="psAcademicStatus"
                                       class="form-control ps-input"
                                       value="<?= !empty($_POST['psAcademicStatus']) ? $_POST['psAcademicStatus'] : $postgraduateSchool['psAcademicStatus'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h2 class="fs-title">Післядипломна професійна підготовка</h2>

                    <div class="form-check">
                        <input type="checkbox" name="doctorate" class="form-check-input" id="doctorate"
                            <?php echo (!empty($_POST['doctorate'])
                                ? ($_POST['doctorate'] == 'on' ? 'checked' : '')
                                : ($doctorate['doctorate'] == 'on' ? 'checked' : '')
                            ) ?>
                        />
                        <label for="doctorate" class="form-check-label">Докторантура</label>
                    </div>

                    <div class="doctorateCheck mb-4">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="docInstitutionName">Назва освітнього закладу</label>
                                <input type="text" id="docInstitutionName" name="docInstitutionName"
                                       class="form-control doc-input"
                                       value="<?= !empty($_POST['docInstitutionName']) ? $_POST['docInstitutionName'] : $doctorate['docInstitutionName'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="docDiploma">Диплом</label>
                                <input type="text" id="docDiploma" name="docDiploma" class="form-control doc-input"
                                       value="<?= !empty($_POST['docDiploma']) ? $_POST['docDiploma'] : $doctorate['docDiploma'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="docDiplomaNumber">Номер диплому</label>
                                <input type="number" id="docDiplomaNumber" name="docDiplomaNumber"
                                       class="form-control doc-input"
                                       value="<?= !empty($_POST['docDiplomaNumber']) ? $_POST['docDiplomaNumber'] : $doctorate['docDiplomaNumber'] ?>"
                                />
                            </div>
                            <div class="col-sm-3">
                                <label for="docDiplomaIssueDate">Дата видачі</label>
                                <input type="date" id="docDiplomaIssueDate" name="docDiplomaIssueDate"
                                       class="form-control doc-input"
                                       value="<?= !empty($_POST['docDiplomaIssueDate']) ? $_POST['docDiplomaIssueDate'] : $doctorate['docDiplomaIssueDate'] ?>"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="docGraduationYear">Рік закінчення</label>
                                <input type="date" id="docGraduationYear" name="docGraduationYear"
                                       class="form-control doc-input"
                                       value="<?= !empty($_POST['docGraduationYear']) ? $_POST['docGraduationYear'] : $doctorate['docGraduationYear'] ?>"
                                />
                            </div>
                            <div class="col-sm-4">
                                <label for="docScientificDegree">Науковий ступінь</label>
                                <input type="text" id="docScientificDegree" name="docScientificDegree"
                                       class="form-control doc-input"
                                       value="<?= !empty($_POST['docScientificDegree']) ? $_POST['docScientificDegree'] : $doctorate['docScientificDegree'] ?>"
                                />
                            </div>
                            <div class="col-sm-4">
                                <label for="docAcademicStatus">Учене звання</label>
                                <input type="text" id="docAcademicStatus" name="docAcademicStatus"
                                       class="form-control doc-input"
                                       value="<?= !empty($_POST['docAcademicStatus']) ? $_POST['docAcademicStatus'] : $doctorate['docAcademicStatus'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Останнє місце роботи</h3>

                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <div>
                                <label for="lastWorkPlace">Останнє місце роботи</label>
                                <input type="text" class="form-control" id="lastWorkPlace" name="lastWorkPlace"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['lastWorkPlace']) ? $_POST['lastWorkPlace'] : $lastwork['lastWorkPlace'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="lastWorkPlacePosition">Посада</label>
                                <input type="text" class="form-control" id="lastWorkPlacePosition"
                                       name="lastWorkPlacePosition" autocomplete="off"
                                       value="<?= !empty($_POST['lastWorkPlacePosition']) ? $_POST['lastWorkPlacePosition'] : $lastwork['lastWorkPlacePosition'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="acceptanceDate">Дата прийняття</label>
                                <input type="date" class="form-control" id="acceptanceDate" name="acceptanceDate"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['acceptanceDate']) ? $_POST['acceptanceDate'] : $lastwork['acceptanceDate'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="serviceDays">Вислуга за дні</label>
                                <input type="number" class="form-control" id="serviceDays" name="serviceDays"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['serviceDays']) ? $_POST['serviceDays'] : $lastwork['serviceDays'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <div>
                                <label for="serviceMonths">Вислуга за місяці</label>
                                <input type="number" class="form-control" id="serviceMonths" name="serviceMonths"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['serviceMonths']) ? $_POST['serviceMonths'] : $lastwork['serviceMonths'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="serviceYears">Вислуга за роки</label>
                                <input type="number" class="form-control" id="serviceYears" name="serviceYears"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['serviceYears']) ? $_POST['serviceYears'] : $lastwork['serviceYears'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="dismissedDate">Дата звільнення</label>
                                <input type="date" class="form-control" id="dismissedDate" name="dismissedDate"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['dismissedDate']) ? $_POST['dismissedDate'] : $lastwork['dismissedDate'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="dismissedReason">Причина звільнення</label>
                                <input type="text" class="form-control" id="dismissedReason" name="dismissedReason"
                                       value="<?= !empty($_POST['dismissedReason']) ? $_POST['dismissedReason'] : $lastwork['dismissedReason'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Сім'я</h3>

                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <label for="familyStatus">Родинний стан</label>
                            <input type="text" class="form-control" id="familyStatus" name="familyStatus"
                                   autocomplete="off" required
                                   value="<?= !empty($_POST['familyStatus']) ? $_POST['familyStatus'] : $family[0]['familyStatus'] ?>"
                            />

                            <?php if (!empty($errors['familyStatus'])) : ?>
                                <div class="form-text text-danger"><?= $errors['familyStatus']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="parent-family-block">
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" id="append-family-btn" class="btn btn-primary mx-3">Додати</button>
                            <button type="button" id="remove-family-btn" class="btn btn-danger">Видалити</button>
                        </div>

                        <?php if (!empty($_POST)) : ?>
                            <?php for ($i = 0; $i < count($_POST['familyMember']); $i++) : ?>
                                <div class="family-block">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <div>
                                                <label for="familyMember">Член родини</label>
                                                <input type="text" class="form-control" id="familyMember"
                                                       name="familyMember[]" autocomplete="off"
                                                       value="<?= $_POST['familyMember'][$i] ?>"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div>
                                                <label for="memberFullname">ПІБ</label>
                                                <input type="text" class="form-control" id="memberFullname"
                                                       name="memberFullname[]" autocomplete="off"
                                                       value="<?= $_POST['memberFullname'][$i] ?>"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div>
                                                <label for="memberBirthdate">Дата народження</label>
                                                <input type="date" class="form-control" id="memberBirthdate"
                                                       name="memberBirthdate[]" autocomplete="off"
                                                       value="<?= $_POST['memberBirthdate'][$i] ?>"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = 0; $i < count($family); $i++) : ?>
                                <div class="family-block">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <div>
                                                <label for="familyMember">Член родини</label>
                                                <input type="text" class="form-control" id="familyMember" name="familyMember[]"
                                                       value="<?= $family[$i]['familyMember'] ?>"
                                                       autocomplete="off"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div>
                                                <label for="memberFullname">ПІБ</label>
                                                <input type="text" class="form-control" id="memberFullname"
                                                       name="memberFullname[]"
                                                       value="<?= $family[$i]['memberFullname'] ?>"
                                                       autocomplete="off"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div>
                                                <label for="memberBirthdate">Дата народження</label>
                                                <input type="date" class="form-control" id="memberBirthdate"
                                                       name="memberBirthdate[]"
                                                       value="<?= $family[$i]['memberBirthdate'] ?>"
                                                       autocomplete="off"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-5 mt-3">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Місце фактичного проживання</h3>

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div>
                                <label for="region">Область проживання</label>
                                <input type="text" class="form-control" id="region" name="region" autocomplete="off" required
                                       value="<?= !empty($_POST['region']) ? $_POST['region'] : $actualResidence['region'] ?>"
                                />

                                <?php if (!empty($errors['region'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['region']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="city">Місто</label>
                                <input type="text" class="form-control" id="city" name="city" autocomplete="off" required
                                       value="<?= !empty($_POST['city']) ? $_POST['city'] : $actualResidence['city'] ?>"
                                />

                                <?php if (!empty($errors['city'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['city']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="district">Район</label>
                                <input type="text" class="form-control" id="district" name="district" autocomplete="off" required
                                       value="<?= !empty($_POST['district']) ? $_POST['district'] : $actualResidence['district'] ?>"
                                />

                                <?php if (!empty($errors['district'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['district']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <div>
                                <label for="street">Вулиця</label>
                                <input type="text" class="form-control" id="street" name="street" autocomplete="off" required
                                       value="<?= !empty($_POST['street']) ? $_POST['street'] : $actualResidence['street'] ?>"
                                />

                                <?php if (!empty($errors['street'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['street']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="houseNumber">Номер будинку</label>
                                <input type="number" class="form-control" id="houseNumber" name="houseNumber"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['houseNumber']) ? $_POST['houseNumber'] : $actualResidence['houseNumber'] ?>"
                                />

                                <?php if (!empty($errors['houseNumber'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['houseNumber']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="apartmentNumber">Номер квартири</label>
                                <input type="number" class="form-control" id="apartmentNumber" name="apartmentNumber"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['apartmentNumber']) ? $_POST['apartmentNumber'] : $actualResidence['apartmentNumber'] ?>"
                                />

                                <?php if (!empty($errors['apartmentNumber'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['apartmentNumber']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="postIndex">Поштовий індекс</label>
                                <input type="number" class="form-control" id="postIndex" name="postIndex"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['postIndex']) ? $_POST['postIndex'] : $actualResidence['postIndex'] ?>"
                                />

                                <?php if (!empty($errors['postIndex'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['postIndex']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Місце проживання за державною реєстрацією</h3>

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div>
                                <label for="regionStateRegistration">Область проживання</label>
                                <input type="text" class="form-control" id="regionStateRegistration"
                                       name="regionStateRegistration" autocomplete="off" required
                                       value="<?= !empty($_POST['regionStateRegistration']) ? $_POST['regionStateRegistration'] : $residenceStateReg['regionStateRegistration'] ?>"
                                />

                                <?php if (!empty($errors['regionStateRegistration'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['regionStateRegistration']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="cityStateRegistration">Місто</label>
                                <input type="text" class="form-control" id="cityStateRegistration"
                                       name="cityStateRegistration" autocomplete="off" required
                                       value="<?= !empty($_POST['cityStateRegistration']) ? $_POST['cityStateRegistration'] : $residenceStateReg['cityStateRegistration'] ?>"
                                />

                                <?php if (!empty($errors['cityStateRegistration'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['cityStateRegistration']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="districtStateRegistration">Район</label>
                                <input type="text" class="form-control" id="districtStateRegistration"
                                       name="districtStateRegistration" autocomplete="off" required
                                       value="<?= !empty($_POST['districtStateRegistration']) ? $_POST['districtStateRegistration'] : $residenceStateReg['districtStateRegistration'] ?>"
                                />

                                <?php if (!empty($errors['districtStateRegistration'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['districtStateRegistration']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <div>
                                <label for="streetStateRegistration">Вулиця</label>
                                <input type="text" class="form-control" id="streetStateRegistration"
                                       name="streetStateRegistration" autocomplete="off" required
                                       value="<?= !empty($_POST['streetStateRegistration']) ? $_POST['streetStateRegistration'] : $residenceStateReg['streetStateRegistration'] ?>"
                                />

                                <?php if (!empty($errors['streetStateRegistration'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['streetStateRegistration']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="houseStateRegistration">Номер будинку</label>
                                <input type="number" class="form-control" id="houseStateRegistration"
                                       name="houseStateRegistration" autocomplete="off" required
                                       value="<?= !empty($_POST['houseStateRegistration']) ? $_POST['houseStateRegistration'] : $residenceStateReg['houseStateRegistration'] ?>"
                                />

                                <?php if (!empty($errors['houseStateRegistration'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['houseStateRegistration']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="apartmentStateRegistration">Номер квартири</label>
                                <input type="number" class="form-control" id="apartmentStateRegistration"
                                       name="apartmentStateRegistration" autocomplete="off" required
                                       value="<?= !empty($_POST['apartmentStateRegistration']) ? $_POST['apartmentStateRegistration'] : $residenceStateReg['apartmentStateRegistration'] ?>"
                                />

                                <?php if (!empty($errors['apartmentNumber'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['apartmentNumber']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="postIndexStateRegistration">Поштовий індекс</label>
                                <input type="number" class="form-control" id="postIndexStateRegistration"
                                       name="postIndexStateRegistration" autocomplete="off" required
                                       value="<?= !empty($_POST['postIndexStateRegistration']) ? $_POST['postIndexStateRegistration'] : $residenceStateReg['postIndexStateRegistration'] ?>"
                                />

                                <?php if (!empty($errors['postIndexStateRegistration'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['postIndexStateRegistration']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Паспорт</h3>

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div>
                                <label for="passportSeries">Серія паспорту</label>
                                <input type="text" class="form-control" id="passportSeries"
                                       name="passportSeries" autocomplete="off" required
                                       value="<?= !empty($_POST['passportSeries']) ? $_POST['passportSeries'] : $passport['passportSeries'] ?>"
                                />

                                <?php if (!empty($errors['passportSeries'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['passportSeries']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="passportNumber">Номер паспорту</label>
                                <input type="number" class="form-control" id="passportNumber" name="passportNumber"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['passportNumber']) ? $_POST['passportNumber'] : $passport['passportNumber'] ?>"
                                />

                                <?php if (!empty($errors['passportNumber'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['passportNumber']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div>
                                <label for="passportIssuedBy">Ким виданий</label>
                                <input type="text" class="form-control" id="passportIssuedBy" name="passportIssuedBy"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['passportIssuedBy']) ? $_POST['passportIssuedBy'] : $passport['passportIssuedBy'] ?>"
                                />

                                <?php if (!empty($errors['passportIssuedBy'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['passportIssuedBy']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="passportIssueDate">Дата видачі</label>
                                <input type="date" class="form-control" id="passportIssueDate" name="passportIssueDate"
                                       autocomplete="off" required
                                       value="<?= !empty($_POST['passportIssueDate']) ? $_POST['passportIssueDate'] : $passport['passportIssueDate'] ?>"
                                />

                                <?php if (!empty($errors['passportIssueDate'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['passportIssueDate']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Відомості про військовий облік</h3>

                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <div>
                                <label for="accountingGroup">Група обліку</label>
                                <input type="text" class="form-control" id="accountingGroup" name="accountingGroup"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['accountingGroup']) ? $_POST['accountingGroup'] : $militaryRec['accountingGroup'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="accountingCategory">Категорія обліку</label>
                                <input type="text" class="form-control" id="accountingCategory"
                                       name="accountingCategory" autocomplete="off"
                                       value="<?= !empty($_POST['accountingCategory']) ? $_POST['accountingCategory'] : $militaryRec['accountingCategory'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="staff">Склад</label>
                                <input type="text" class="form-control" id="staff" name="staff" autocomplete="off"
                                       value="<?= !empty($_POST['staff']) ? $_POST['staff'] : $militaryRec['staff'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <label for="militaryRank">Військове звання</label>
                                <input type="text" class="form-control" id="militaryRank" name="militaryRank"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['militaryRank']) ? $_POST['militaryRank'] : $militaryRec['militaryRank'] ?>"
                                />

                                <?php if (!empty($errors['militaryRank'])) : ?>
                                    <div class="form-text text-danger"><?= $errors['militaryRank']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div>
                                <label for="militaryAccountingSpecialtyNumber">Військово-облікова спеціальність
                                    №</label>
                                <input type="number" class="form-control" id="militaryAccountingSpecialtyNumber"
                                       name="militaryAccountingSpecialtyNumber" autocomplete="off"
                                       value="<?= !empty($_POST['militaryAccountingSpecialtyNumber']) ? $_POST['militaryAccountingSpecialtyNumber'] : $militaryRec['militaryAccountingSpecialtyNumber'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="militaryServiceSuitability">Придатність до служби</label>
                                <input type="text" class="form-control" id="militaryServiceSuitability"
                                       name="militaryServiceSuitability" autocomplete="off"
                                       value="<?= !empty($_POST['militaryServiceSuitability']) ? $_POST['militaryServiceSuitability'] : $militaryRec['militaryServiceSuitability'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="registrationDMCommissariatName">Назва райвійськкомату за місцем
                                    реєстрації</label>
                                <input type="text" class="form-control" id="registrationDMCommissariatName"
                                       name="registrationDMCommissariatName" autocomplete="off"
                                       value="<?= !empty($_POST['registrationDMCommissariatName']) ? $_POST['registrationDMCommissariatName'] : $militaryRec['registrationDMCommissariatName'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div>
                                <label for="actualDMCommissariatName">Назва райвійськкомату за місцем фактичного
                                    проживання</label>
                                <input type="text" class="form-control" id="actualDMCommissariatName"
                                       name="actualDMCommissariatName" autocomplete="off"
                                       value="<?= !empty($_POST['actualDMCommissariatName']) ? $_POST['actualDMCommissariatName'] : $militaryRec['actualDMCommissariatName'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="specialAccounting">Перебування на спеціальному обліку</label>
                                <input type="text" class="form-control" id="specialAccounting" name="specialAccounting"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['specialAccounting']) ? $_POST['specialAccounting'] : $militaryRec['specialAccounting'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Професійна освіта</h3>

                    <div class="professional-education-family-block">
                        <div class="d-flex justify-content-end">
                            <button type="button" id="append-profEducation-btn" class="btn btn-primary mx-3">Додати</button>
                            <button type="button" id="remove-profEducation-btn" class="btn btn-danger">Видалити</button>
                        </div>

                        <?php if (!empty($_POST)) : ?>
                            <?php for ($i = 0; $i < count($_POST['PEdate']); $i++) : ?>
                                <div class="professional-education-block">
                                    <div class="mb-3">
                                        <div class="row mb-1">
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEdate">Дата</label>
                                                    <input type="date" class="form-control" id="PEdate" name="PEdate[]"
                                                           autocomplete="off"
                                                           value="<?= $_POST['PEdate'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstructuralDivisionName">Назва структурного
                                                        підрозділу</label>
                                                    <input type="text" class="form-control"
                                                           id="PEstructuralDivisionName"
                                                           name="PEstructuralDivisionName[]" autocomplete="off"
                                                           value="<?= $_POST['PEstructuralDivisionName'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstudyStart">Початок навчання</label>
                                                    <input type="date" class="form-control" id="PEstudyStart"
                                                           name="PEstudyStart[]" autocomplete="off"
                                                           value="<?= $_POST['PEstudyStart'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstudyEnd">Кінець навчання</label>
                                                    <input type="date" class="form-control" id="PEstudyEnd"
                                                           name="PEstudyEnd[]" autocomplete="off"
                                                           value="<?= $_POST['PEstudyEnd'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstudyType">Вид навчання</label>
                                                    <input type="text" class="form-control" id="PEstudyType"
                                                           name="PEstudyType[]" autocomplete="off"
                                                           value="<?= $_POST['PEstudyType'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstudyForm">Форма навчання</label>
                                                    <input type="text" class="form-control" id="PEstudyForm"
                                                           name="PEstudyForm[]" autocomplete="off"
                                                           value="<?= $_POST['PEstudyForm'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PElaboratoryName">Назва лабораторії</label>
                                                    <input type="text" class="form-control" id="PElaboratoryName"
                                                           name="PElaboratoryName[]" autocomplete="off"
                                                           value="<?= $_POST['PElaboratoryName'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEissuedBy">Ким виданий</label>
                                                    <input type="text" class="form-control" id="PEissuedBy"
                                                           name="PEissuedBy[]" autocomplete="off"
                                                           value="<?= $_POST['PEissuedBy'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = 0; $i < count($professionalEducation); $i++) : ?>
                                <div class="professional-education-block">
                                    <div class="mb-3">
                                        <div class="row mb-1">
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEdate">Дата</label>
                                                    <input type="date" class="form-control" id="PEdate" name="PEdate[]"
                                                           autocomplete="off"
                                                           value="<?= $professionalEducation[$i]['PEdate'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstructuralDivisionName">Назва структурного
                                                        підрозділу</label>
                                                    <input type="text" class="form-control" id="PEstructuralDivisionName"
                                                           name="PEstructuralDivisionName[]" autocomplete="off"
                                                           value="<?= $professionalEducation[$i]['PEstructuralDivisionName'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstudyStart">Початок навчання</label>
                                                    <input type="date" class="form-control" id="PEstudyStart"
                                                           name="PEstudyStart[]" autocomplete="off"
                                                           value="<?= $professionalEducation[$i]['PEstudyStart'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstudyEnd">Кінець навчання</label>
                                                    <input type="date" class="form-control" id="PEstudyEnd"
                                                           name="PEstudyEnd[]" autocomplete="off"
                                                           value="<?= $professionalEducation[$i]['PEstudyEnd'] ?>"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstudyType">Вид навчання</label>
                                                    <input type="text" class="form-control" id="PEstudyType"
                                                           name="PEstudyType[]" autocomplete="off"
                                                           value="<?= $professionalEducation[$i]['PEstudyType'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEstudyForm">Форма навчання</label>
                                                    <input type="text" class="form-control" id="PEstudyForm"
                                                           name="PEstudyForm[]" autocomplete="off"
                                                           value="<?= $professionalEducation[$i]['PEstudyForm'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PElaboratoryName">Назва лабораторії</label>
                                                    <input type="text" class="form-control" id="PElaboratoryName"
                                                           name="PElaboratoryName[]" autocomplete="off"
                                                           value="<?= $professionalEducation[$i]['PElaboratoryName'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label for="PEissuedBy">Ким виданий</label>
                                                    <input type="text" class="form-control" id="PEissuedBy"
                                                           name="PEissuedBy[]" autocomplete="off"
                                                           value="<?= $professionalEducation[$i]['PEissuedBy'] ?>"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-5 mt-3">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Призначення і переведення</h3>

                    <div class="transfer-family-block">
                        <div class="d-flex justify-content-end">
                            <button type="button" id="append-transfer-btn" class="btn btn-primary mx-3">Додати</button>
                            <button type="button" id="remove-transfer-btn" class="btn btn-danger">Видалити</button>
                        </div>

                        <?php if (!empty($_POST)) : ?>
                            <?php for ($i = 0; $i < count($_POST['transferDate']); $i++) : ?>
                                <div class="transfer-block">
                                    <div class="mb-3">
                                        <div class="row mb-1">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="transferDate">Дата</label>
                                                    <input type="date" class="form-control" id="transferDate"
                                                           name="transferDate[]" autocomplete="off" required
                                                           value="<?= $_POST['transferDate'][$i] ?>"
                                                    />

                                                    <?php if (!empty($errors['transferDate'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['transferDate']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="transferStructuralDivisionName">Назва структурного
                                                        підрозділу</label>
                                                    <input type="text" class="form-control"
                                                           id="transferStructuralDivisionName" required
                                                           name="transferStructuralDivisionName[]" autocomplete="off"
                                                           value="<?= $_POST['transferStructuralDivisionName'][$i] ?>"
                                                    />

                                                    <?php if (!empty($errors['transferStructuralDivisionName'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['transferStructuralDivisionName']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="position_id">Назва посади</label>

                                                    <select class="form-control" id="position_id" name="position_id[]">
                                                        <?php foreach ($positions as $position) : ?>
                                                            <option <?php if ($position['id'] == $_POST['position_id'][$i]) echo 'selected'; ?>
                                                                    value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="positionCode">Код посади</label>
                                                    <input type="text" class="form-control" id="positionCode"
                                                           name="positionCode[]" autocomplete="off" required
                                                           value="<?= $_POST['positionCode'][$i] ?>"
                                                    />

                                                    <?php if (!empty($errors['positionCode'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['positionCode']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="transferSalary">Оклад</label>
                                                    <input type="number" class="form-control" id="transferSalary"
                                                           name="transferSalary[]" autocomplete="off" required
                                                           value="<?= $_POST['transferSalary'][$i] ?>"
                                                    />

                                                    <?php if (!empty($errors['transferSalary'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['transferSalary']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="transferOrder">Підстава, наказ №</label>
                                                    <input type="text" class="form-control" id="transferOrder"
                                                           name="transferOrder[]" autocomplete="off" required
                                                           value="<?= $_POST['transferOrder'][$i] ?>"
                                                    />

                                                    <?php if (!empty($errors['transferOrder'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['transferOrder']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = 0; $i < count($transfer); $i++) : ?>
                                <div class="transfer-block">
                                    <div class="mb-3">
                                        <div class="row mb-1">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="transferDate">Дата</label>
                                                    <input type="date" class="form-control" id="transferDate"
                                                           name="transferDate[]" autocomplete="off" required
                                                           value="<?= $transfer[$i]['transferDate'] ?>"
                                                    />

                                                    <?php if (!empty($errors['transferDate'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['transferDate']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="transferStructuralDivisionName">Назва структурного
                                                        підрозділу</label>
                                                    <input type="text" class="form-control"
                                                           id="transferStructuralDivisionName" required
                                                           name="transferStructuralDivisionName[]" autocomplete="off"
                                                           value="<?= $transfer[$i]['transferStructuralDivisionName'] ?>"
                                                    />

                                                    <?php if (!empty($errors['transferStructuralDivisionName'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['transferStructuralDivisionName']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="position_id">Назва посади</label>

                                                    <select class="form-control" id="position_id" name="position_id[]">
                                                        <?php foreach ($positions as $position) : ?>
                                                            <option <?php if ($position['id'] == $transfer[$i]['position_id']) echo 'selected'; ?>
                                                                    value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="positionCode">Код посади</label>
                                                    <input type="text" class="form-control" id="positionCode"
                                                           name="positionCode[]" autocomplete="off" required
                                                           value="<?= $transfer[$i]['positionCode'] ?>"
                                                    />

                                                    <?php if (!empty($errors['positionCode'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['positionCode']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="transferSalary">Оклад</label>
                                                    <input type="number" class="form-control" id="transferSalary"
                                                           name="transferSalary[]" autocomplete="off" required
                                                           value="<?= $transfer[$i]['transferSalary'] ?>"
                                                    />

                                                    <?php if (!empty($errors['transferSalary'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['transferSalary']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="transferOrder">Підстава, наказ №</label>
                                                    <input type="text" class="form-control" id="transferOrder"
                                                           name="transferOrder[]" autocomplete="off" required
                                                           value="<?= $transfer[$i]['transferOrder'] ?>"
                                                    />

                                                    <?php if (!empty($errors['transferOrder'])) : ?>
                                                        <div class="form-text text-danger"><?= $errors['transferOrder']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-5 mt-3">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Відпустки</h3>

                    <div class="vacation-family-block">
                        <div class="d-flex justify-content-end">
                            <button type="button" id="append-vacation-btn" class="btn btn-primary mx-3">Додати</button>
                            <button type="button" id="remove-vacation-btn" class="btn btn-danger">Видалити</button>
                        </div>

                        <?php if (!empty($_POST)) : ?>
                            <?php for ($i = 0; $i < count($_POST['vacationType']); $i++) : ?>
                                <div class="vacation-block">
                                    <div class="mb-3">
                                        <div class="row mb-1">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="vacationType">Тип відпустки</label>
                                                    <input type="text" class="form-control" id="vacationType"
                                                           name="vacationType[]" autocomplete="off"
                                                           value="<?= $_POST['vacationType'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="workedPeriodStart">Початок відпрацьованого
                                                        періоду</label>
                                                    <input type="date" class="form-control" id="workedPeriodStart"
                                                           name="workedPeriodStart[]" autocomplete="off"
                                                           value="<?= $_POST['workedPeriodStart'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="workedPeriodEnd">Кінець відпрацьованого періоду</label>
                                                    <input type="date" class="form-control" id="workedPeriodEnd"
                                                           name="workedPeriodEnd[]" autocomplete="off"
                                                           value="<?= $_POST['workedPeriodEnd'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="vacationStart">Початок відпустки</label>
                                                    <input type="date" class="form-control" id="vacationStart"
                                                           name="vacationStart[]" autocomplete="off"
                                                           value="<?= $_POST['vacationStart'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="vacationEnd">Кінець відпустки</label>
                                                    <input type="date" class="form-control" id="vacationEnd"
                                                           name="vacationEnd[]" autocomplete="off"
                                                           value="<?= $_POST['vacationEnd'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="vacationOrder">Підстава, наказ №</label>
                                                    <input type="text" class="form-control" id="vacationOrder"
                                                           name="vacationOrder[]" autocomplete="off"
                                                           value="<?= $_POST['vacationOrder'][$i] ?>"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = 0; $i < count($vacation); $i++) : ?>
                                <div class="vacation-block">
                                    <div class="mb-3">
                                        <div class="row mb-1">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="vacationType">Тип відпустки</label>
                                                    <input type="text" class="form-control" id="vacationType"
                                                           name="vacationType[]" autocomplete="off"
                                                           value="<?= $vacation[$i]['vacationType'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="workedPeriodStart">Початок відпрацьованого періоду</label>
                                                    <input type="date" class="form-control" id="workedPeriodStart"
                                                           name="workedPeriodStart[]" autocomplete="off"
                                                           value="<?= $vacation[$i]['workedPeriodStart'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="workedPeriodEnd">Кінець відпрацьованого періоду</label>
                                                    <input type="date" class="form-control" id="workedPeriodEnd"
                                                           name="workedPeriodEnd[]" autocomplete="off"
                                                           value="<?= $vacation[$i]['workedPeriodEnd'] ?>"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="vacationStart">Початок відпустки</label>
                                                    <input type="date" class="form-control" id="vacationStart"
                                                           name="vacationStart[]" autocomplete="off"
                                                           value="<?= $vacation[$i]['vacationStart'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="vacationEnd">Кінець відпустки</label>
                                                    <input type="date" class="form-control" id="vacationEnd"
                                                           name="vacationEnd[]" autocomplete="off"
                                                           value="<?= $vacation[$i]['vacationEnd'] ?>"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div>
                                                    <label for="vacationOrder">Підстава, наказ №</label>
                                                    <input type="text" class="form-control" id="vacationOrder"
                                                           name="vacationOrder[]" autocomplete="off"
                                                           value="<?= $vacation[$i]['vacationOrder'] ?>"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-5 mt-3">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>

                    <button type="submit" class="btn btn-success mt-2 px-3">Зберегти</button>

                    <input type="button" name="next" class="btn btn-primary mt-2 px-5 next" value="Далі"/>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-card">
                    <h3 class="fs-title">Додаткова інформація</h3>

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div>
                                <label for="pensionInformation">Відомості про отримання пенсії</label>
                                <input type="text" class="form-control" id="pensionInformation"
                                       name="pensionInformation" autocomplete="off"
                                       value="<?= !empty($_POST['pensionInformation']) ? $_POST['pensionInformation'] : $otherInfo['pensionInformation'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="additionalInfo">Додаткові відомості</label>

                                <input type="text" class="form-control" id="additionalInfo" name="additionalInfo"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['additionalInfo']) ? $_POST['additionalInfo'] : $otherInfo['additionalInfo'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div>
                                <label for="firedDate">Дата звільнення</label>
                                <input type="date" class="form-control" id="firedDate" name="firedDate"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['firedDate']) ? $_POST['firedDate'] : $otherInfo['firedDate'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="firedReason">Причина звільнення</label>
                                <input type="text" class="form-control" id="firedReason" name="firedReason"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['firedReason']) ? $_POST['firedReason'] : $otherInfo['firedReason'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div>
                                <label for="personnelServiceEmployeePosition">Посада працівника кадрової служби</label>
                                <input type="text" class="form-control" id="personnelServiceEmployeePosition"
                                       name="personnelServiceEmployeePosition" autocomplete="off"
                                       value="<?= !empty($_POST['personnelServiceEmployeePosition']) ? $_POST['personnelServiceEmployeePosition'] : $enterpriseInfo['personnelServiceEmployeePosition'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="personnelServiceEmployeeFullname">ПІБ працівника кадрової служби</label>
                                <input type="text" class="form-control" id="personnelServiceEmployeeFullname"
                                       name="personnelServiceEmployeeFullname" autocomplete="off"
                                       value="<?= !empty($_POST['personnelServiceEmployeeFullname']) ? $_POST['personnelServiceEmployeeFullname'] : $enterpriseInfo['personnelServiceEmployeeFullname'] ?>"
                                />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="dateOfSignature">Дата підпису</label>
                                <input type="date" class="form-control" id="dateOfSignature" name="dateOfSignature"
                                       autocomplete="off"
                                       value="<?= !empty($_POST['dateOfSignature']) ? $_POST['dateOfSignature'] : $enterpriseInfo['dateOfSignature'] ?>"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div>
                                <label for="file">Додати файли</label>
                                <input type="file" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple" class="form-control" id="files" name="files[]">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div>
                                <label for="delFiles">Видалити обрані файли</label>
                                <select name="delFiles[]" id="delFiles" class="form-select" multiple>
                                    <?php foreach ($files as $file) : ?>
                                        <option value="<?= $file['name'] ?>"><?= $file['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="button" name="previous" class="btn btn-primary mt-2 px-5 previous" value="Назад"/>
                    <button type="submit" class="btn btn-success mt-2 px-1">Зберегти</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
