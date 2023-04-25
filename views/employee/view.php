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
    /** @var array $positions */
    /** @var array $files */
?>

<div class="my-4">
    <div class="print-first">
        <div class="d-flex justify-content-between">
            <div>
                <p><b><u><?= $enterpriseInfo['enterpriseName'] ?></u></b>
                    <br>Найменування підприємства(установки, організації)
                    <br>Код ЄДРПОУ <b><u><?= $enterpriseInfo['EDRPOUcode'] ?></u></b></p>
            </div>
            <div>
                <p>Затверджено<br>Наказ Держкомстату<br>та Міністерства оборони України<br>25.12.2009 №495/656</p>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column justify-content-between">
                <div>
                    <table class="user-table">
                        <tr>
                            <th>Дата заповнення</th>
                            <th>Табельний номер</th>
                            <th>Індивідуальний ідентифікаційний номер</th>
                            <th>Стать (чоловіча, жіноча)</th>
                            <th>Вид роботи (основна, за сумісництвом)</th>
                        </tr>
                        <tr>
                            <td><?= $enterpriseInfo['completionDate'] ?></td>
                            <td><?= $personalInfo['personnelNumber'] ?></td>
                            <td><?= $personalInfo['identificationNumber'] ?></td>
                            <td><?= $personalInfo['gender'] ?></td>
                            <td><?= $enterpriseInfo['workType'] ?></td>
                        </tr>
                    </table>
                </div>
                <div>
                    <h2 class="text-center">Особова картка працівника</h2>
                </div>
            </div>
            <div>
                <?php $filePath = 'files/employee/' . $personalInfo['photo']; ?>

                <?php if (is_file($filePath)) : ?>
                    <img src="/<?= $filePath ?>" class="user-img" alt="">
                <?php else : ?>
                    <img src="/static/images/no-image.jpg" class="user-img" alt="">

                <?php endif; ?>
            </div>
        </div>

        <div>
            <h5>I. Загальні відомості</h5>
            <p class="mb-0"><b>1. </b>Прізвище <b><u><?= $personalInfo['lastname'] ?></u></b> Ім'я <b><u><?= $personalInfo['firstname'] ?></u></b> По батькові <b><u><?= $personalInfo['midname'] ?></u></b></p>
            <p class="mb-0"><b>2. </b>Дата народження «<b><u><?= $personalInfo['birthdate'] ?></u></b>»    <b>3.</b> Громадянство <b><u><?= $personalInfo['citizenship'] ?></u></b></p>
            <p class="mb-0"><b>4. </b>Освіта (базова загальна середня, повна загальна середня, професійно-технічна, неповна вища, базова вища, повна вища)<br><b><u><?= $education[0]['education'] ?></u></b></p>
            <br>
        </div>

        <div>
            <table class="user-table">
                <tr>
                    <th>Назва освітнього закладу</th>
                    <th>Диплом (свідоцтво, серія, номер)</th>
                    <th>Рік закінчення</th>
                </tr>
                <?php for ($i = 0; $i < 4; $i++) : ?>
                    <tr>
                        <td><?= $education[$i]['institutionName'] ?></td>
                        <td><?= $education[$i]['diplomaCertificate'] . ' ' . $education[$i]['diplomaSeries'] . ' ' . $education[$i]['diplomaNumber'] ?></td>
                        <td><?= $education[$i]['graduationYear'] ?></td>
                    </tr>
                <?php endfor; ?>
                <tr>
                    <th>Спеціальність (професія) за дипломом (свідоцтвом)</th>
                    <th>Кваліфікація за дипломом (свідоцтвом)</th>
                    <th>Форма навчанняя (денна, вечірня, заочна)</th>
                </tr>
                <?php for ($i = 0; $i < 4; $i++) : ?>
                    <tr>
                        <td><?= $education[$i]['diplomaSpecialty'] ?></td>
                        <td><?= $education[$i]['diplomaQualification'] ?></td>
                        <td><?= $education[$i]['educationForm'] ?></td>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>

        <div>
            <p><b>5. </b> Післядипломна професійна підготовка: навчання в
                <label><input type="checkbox" disabled <?php if($graduateSchool['graduateSchool']) echo 'checked' ?>> аспірантурі</label>
                <label><input type="checkbox" disabled <?php if($postgraduateSchool['postgraduateSchool']) echo 'checked' ?>> ад'юнктурі</label>
                <label><input type="checkbox" disabled <?php if($doctorate['doctorate']) echo 'checked' ?>> докторантурі</label>
            </p>
        </div>

        <div>
            <table class="user-table">
                <tr>
                    <th>Назва освітнього, наукового закладу</th>
                    <th>Диплом, номер, дата видачі</th>
                    <th>Рік закінчення</th>
                    <th>Науковий ступінь, учене звання</th>
                </tr>
                <tr>
                    <td><?= $graduateSchool['gsInstitutionName'] ?></td>
                    <td><?= $graduateSchool['gsDiploma'] . ', ' . $graduateSchool['gsDiplomaNumber'] . ', ' . $graduateSchool['gsDiplomaIssueDate'] ?></td>
                    <td><?= $graduateSchool['gsGraduationYear'] ?></td>
                    <td><?= $graduateSchool['gsScientificDegree'] . ', ' . $graduateSchool['gsAcademicStatus'] ?></td>
                </tr>
                <tr>
                    <td><?= $postgraduateSchool['psInstitutionName'] ?></td>
                    <td><?= $postgraduateSchool['psDiploma'] . ', ' . $postgraduateSchool['psDiplomaNumber'] . ', ' . $postgraduateSchool['psDiplomaIssueDate'] ?></td>
                    <td><?= $postgraduateSchool['psDiplomaGraduationYear'] ?></td>
                    <td><?= $postgraduateSchool['psScientificDegree'] . ', ' . $postgraduateSchool['psAcademicStatus'] ?></td>
                </tr>
                <tr>
                    <td><?= $doctorate['docInstitutionName'] ?></td>
                    <td><?= $doctorate['docDiploma'] . ', ' . $doctorate['docDiplomaNumber'] . ', ' . $doctorate['docDiplomaIssueDate'] ?></td>
                    <td><?= $doctorate['docGraduationYear'] ?></td>
                    <td><?= $doctorate['docScientificDegree'] . ', ' . $doctorate['docAcademicStatus'] ?></td>
                </tr>
            </table>
        </div>

        <div>
            <p><b>6. </b>Останнє місце роботи <b><u><?= $lastwork['lastWorkPlace'] ?></u></b> посада(професія) <b><u><?= $lastwork['lastWorkPlacePosition'] ?></u></b></p>

            <div class="d-flex justify-content-between">
                <?php
                    $currentDate = date_create(date('Y-m-d'));
                    $acceptanceDate = date_create($lastwork['acceptanceDate']);

                    $experienceDays = date_diff($currentDate, $acceptanceDate)->d;
                    $experienceMonths = date_diff($currentDate, $acceptanceDate)->m;
                    $experienceYears = date_diff($currentDate, $acceptanceDate)->y;
                ?>

                <div>
                    <p><b>7. </b>Стаж роботи станом на <b>«<?= $lastwork['acceptanceDate'] ?>»</b></p>
                </div>
                <div>
                    <p>Загальний <b><u><?= $experienceDays ?></u></b> днів <b><u><?= $experienceMonths ?></u></b> місяців <b><u><?= $experienceYears ?></u></b> років</p>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <p>що дає право на надбавку за вислугу років <b><u><?= $lastwork['serviceDays'] ?></u></b> днів <b><u><?= $lastwork['serviceMonths'] ?></u></b> місяців <b><u><?= $lastwork['serviceYears'] ?></u></b> років</p>
            </div>

            <?php
    //            echo "<pre>";
    //            var_dump($family);
    //            die;
            ?>

            <div>
                <p class="mb-0"><b>8. </b>Дата та причина звільнення (скорочення штатів; за власним бажанням, за прогул та інші порушення, невідповідність займаній посаді тощо)</p>
                <p class="mb-0"><b><u><?= $lastwork['dismissedDate'] ?></u> <u><?= $lastwork['dismissedReason'] ?></u></b></p>
                <p class="mb-0"><b>9. </b>Відомості про отримання пенсії (у разі наявності вказати вид пенсійних виплат згідно з чинним законодавством)</p>
                <p class="mb-0"><b><u><?= $otherInfo['pensionInformation'] ?></u></b></p>
                <p><b>10. </b>Родинний стан <b><u><?= $family[0]['familyStatus'] ?></u></b></p>
            </div>
        </div>

        <div>
            <table class="user-table">
                <tr>
                    <th>Ступінь родинного зв'язку (склад сім'ї)</th>
                    <th>ПІБ</th>
                    <th>Рік народження</th>
                </tr>
                <?php for ($i = 0; $i < 4; $i++) : ?>
                    <tr>
                        <td><?= $family[$i]['familyMember'] ?></td>
                        <td><?= $family[$i]['memberFullname'] ?></td>
                        <td><?= $family[$i]['memberBirthdate'] ?></td>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>

        <div>
            <p class="mb-0"><b>11. </b>Місце фактичного проживання (область, місто, район, вулиця, № будинку, квартири, номер контактного телефону, поштовий індекс)
                <b><u><?= $actualResidence['region'] ?> <?= $actualResidence['city'] ?> <?= $actualResidence['district'] ?> <?= $actualResidence['street'] ?> <?= $actualResidence['houseNumber'] ?>
                        <?= $actualResidence['apartmentNumber'] ?> <?= $actualResidence['phoneNumber'] ?> <?= $actualResidence['email'] ?> <?= $actualResidence['postIndex'] ?></u></b></p>
            <p class="mb-0"><b>12. </b> Місце проживання за державною реєстрацією
                <b><u><?= $residenceStateReg['regionStateRegistration'] ?> <?= $residenceStateReg['cityStateRegistration'] ?> <?= $residenceStateReg['districtStateRegistration'] ?> <?= $residenceStateReg['streetStateRegistration'] ?>
                        <?= $residenceStateReg['houseStateRegistration'] ?> <?= $residenceStateReg['apartmentStateRegistration'] ?> <?= $residenceStateReg['postIndexStateRegistration'] ?></u></b></p>
            <p>Паспорт: серія <b><u><?= $passport['passportSeries'] ?></u></b> № <b><u><?= $passport['passportNumber'] ?></u></b>
                , ким виданий <b><u><?= $passport['passportIssued'] ?></u></b>, дата видачі <b><u><?= $passport['passportIssueDate'] ?></u></b></p>
        </div>

        <div>
            <h5>II. ВІДОМОСТІ ПРО ВІЙСЬКОВИЙ ОБЛІК</h5>

            <div class="d-flex justify-content-between">
                <div>
                    <p class="mb-0">Група обліку <b><u><?= $militaryRec['accountingGroup'] ?></u></b></p>
                    <p class="mb-0">Категорія обліку <b><u><?= $militaryRec['accountingCategory'] ?></u></b></p>
                    <p class="mb-0">Склад <b><u><?= $militaryRec['staff'] ?></u></b></p>
                    <p class="mb-0">Військове звання <b><u><?= $militaryRec['militaryRank'] ?></u></b></p>
                    <p class="mb-0">Військово-облікова спеціальність № <b><u><?= $militaryRec['militaryAccountingSpecialtyNumber'] ?></u></b></p>
                </div>
                <div>
                    <p class="mb-0">Придатність до військової служби <b><u><?= $militaryRec['militaryServiceSuitability'] ?></u></b></p>
                    <p class="mb-0">Назва райвійськкомату за місцем реєстрації <b><u><?= $militaryRec['registrationDMCommissariatName'] ?></u></b></p>
                    <p class="mb-0">Назва райвійськкомату за місцем фактичного проживання <b><u><?= $militaryRec['actualDMCommissariatName'] ?></u></b></p>
                    <p class="mb-0">Перебування на спеціальному обліку <b><u><?= $militaryRec['specialAccounting'] ?></u></b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 print-second">
        <div>
            <br><h5>III. ПРОФЕСІЙНА ОСВІТА НА ВИРОБНИЦТВІ (ЗА РАХУНОК ПІДПРИЄМСТВА-РОБОТОДАВЦЯ)</h5>

            <div>
                <table class="user-table">
                    <tr>
                        <th>Дата</th>
                        <th>Назва структурного підрозділу</th>
                        <th>Період навчання</th>
                        <th>Вид навчання</th>
                        <th>Форма навчання</th>
                        <th>Назва документа, що посвідчує<br>професійну освіту, ким виданий</th>
                    </tr>
                    <?php for ($i = 0; $i < 13; $i++) : ?>
                        <tr>
                            <td><?= $professionalEducation[$i]['PEdate'] ?></td>
                            <td><?= $professionalEducation[$i]['PEstructuralDivisionName'] ?></td>
                            <td><?php if ($professionalEducation[$i]['PEstudyStart'] && $professionalEducation[$i]['PEstudyEnd'])
                                echo $professionalEducation[$i]['PEstudyStart'] . ' - ' . $professionalEducation[$i]['PEstudyEnd']  ?></td>
                            <td><?= $professionalEducation[$i]['PEstudyType'] ?></td>
                            <td><?= $professionalEducation[$i]['PEstudyForm'] ?></td>
                            <td><?php if ($professionalEducation[$i]['PElaboratoryName'] && $professionalEducation[$i]['PEissuedBy'])
                                echo $professionalEducation[$i]['PElaboratoryName'] . ', ' . $professionalEducation[$i]['PEissuedBy'] ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>

        <div>
            <br><h5>IV. ПРИЗНАЧЕННЯ І ПЕРЕВЕДЕННЯ</h5>

            <div>
                <table class="user-table">
                    <tr>
                        <th>Дата</th>
                        <th>Назва структурного підрозділу(код)</th>
                        <th>Посада</th>
                        <th>Код за КП</th>
                        <th>Розряд (оклад, ставка)</th>
                        <th>Підстава, наказ №</th>
                    </tr>
                    <?php for ($i = 0; $i < 12; $i++) : ?>
                        <tr>
                            <td><?= $transfer[$i]['transferDate'] ?></td>
                            <td><?= $transfer[$i]['transferStructuralDivisionName'] ?></td>
                            <?php foreach ($positions as $position) : ?>
                                <?php if ($position['id'] == $transfer[$i]['position_id']) echo "<td>" . $position['name'] . "</td>" ?>
                            <?php endforeach; ?>
                            <td><?= $transfer[$i]['positionCode'] ?></td>
                            <td><?= $transfer[$i]['transferSalary'] ?></td>
                            <td><?= $transfer[$i]['transferOrder'] ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>

        <div>
            *Відповідно до Класифікатора професій ДК 003-2005, затверджено наказом Держстандарту України від 26.12.2005 №375,
             з урахуванням позначки кваліфікаційного рівня (6 знаків, наприклад, код професії "муляр" - 7122.2).
        </div>

        <div>
            <br><h5>V. ВІДПУСТКИ</h5>

            <div>
                <table class="user-table">
                    <tr>
                        <th>Вид відпустки</th>
                        <th>За який період</th>
                        <th>Початок відпустки</th>
                        <th>Закінчення відпустки</th>
                        <th>Підстава, наказ №</th>
                    </tr>
                    <?php for ($i = 0; $i < 19; $i++) : ?>
                        <tr>
                            <td><?= $vacation[$i]['vacationType'] ?></td>
                            <td><?= $vacation[$i]['workedPeriodStart'] ?>
                                <?php if ($vacation[$i]['workedPeriodStart']) echo "-" ?>
                                <?= $vacation[$i]['workedPeriodEnd'] ?></td>
                            <td><?= $vacation[$i]['vacationStart'] ?></td>
                            <td><?= $vacation[$i]['vacationEnd'] ?></td>
                            <td><?= $vacation[$i]['vacationOrder'] ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>

        <div>
            <p>Додаткові відомості <b><u><?= $otherInfo['additionalInfo'] ?></u></b></p>

            <p>Дата і причина звільнення (підстава) <b><u><?= $otherInfo['firedDate'] . ' ' . $otherInfo['firedReason']?></u></b></p>

            <table style="width: 100%">
                <tr>
                    <td>Працівник кадрової служби</td>
                    <td><p class="text-center user-underline"><b><?= $enterpriseInfo['personnelServiceEmployeePosition'] ?></b></p></td>
                    <td><input type="text" class="user-underline" readonly style="background-color: #f3f3f3;" /></td>
                    <td><p class="text-center user-underline"><b><?= $enterpriseInfo['personnelServiceEmployeeFullname'] ?></b></p></td>
                </tr>
                <tr>
                    <td>Підпис працівника</td>
                    <td><p class="user-underline"></p></td>
                    <td></td>
                    <td><p class="text-center user-underline"><b><?= $enterpriseInfo['dateOfSignature'] ?></b></p></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="noPrint mt-4">
        <?php if ($files[0]['name']) : ?>
            <h3>Файли працівника</h3>

            <?php for ($i = 0; $i < count($files); $i++) : ?>
                <a class="btn btn-primary" href="/files/employee_files/<?= $files[$i]['file'] ?>" target="_blank"><?= $files[$i]['name'] ?></a>
            <?php endfor; ?>
        <?php endif; ?>
    </div>

    <div class="noPrint mt-4">
        <button class="btn btn-primary" onclick="window.print();">Роздрукувати</button>
    </div>
</div>
