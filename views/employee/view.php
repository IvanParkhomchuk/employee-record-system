<div>
    <div class="d-flex justify-content-between">
        <div>
            <p><u><?= $employee['enterpriseName'] ?></u>
                <br>Найменування підприємства(установки, організації)
                <br>Код ЄДРПОУ <u><?= $employee['EDRPOUcode'] ?></u></p>
        </div>
        <div>
            <p>Затверджено<br>Наказ Держкомстату<br>та Міністерства оборони України<br>25.12.2009 №495/656</p>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div>
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Дата заповнення</th>
                        <th>Табельний номер</th>
                        <th>Індивідуальний ідентифікаційний номер</th>
                        <th>Стать (чоловіча, жіноча)</th>
                        <th>Вид роботи (основна, за сумісництвом)</th>
                    </tr>
                    <tr>
                        <td><?= $employee['completionDate'] ?></td>
                        <td><?= $employee['personnelNumber'] ?></td>
                        <td><?= $employee['identificationNumber'] ?></td>
                        <td><?= $employee['gender'] ?></td>
                        <td><?= $employee['workType'] ?></td>
                    </tr>
                </table>
            </div>
            <div>
                <h1 class="text-center">Особова картка працівника</h1>
            </div>
        </div>
        <div>
            <?php $filePath = 'files/employee/' . $employee['photo']; ?>

            <?php if (is_file($filePath)) : ?>
                <img src="/<?= $filePath ?>" class="img-thumbnail" alt="">
            <?php else : ?>
                <img src="/static/images/no-image.jpg" class="img-thumbnail" alt="">

            <?php endif; ?>
        </div>
    </div>

    <div>
        <h5>I. Загальні відомості</h5>
        <p class="mb-0"><b>1. </b>Прізвище <u><?= $employee['lastname'] ?></u> Ім'я <u><?= $employee['firstname'] ?></u> По батькові <u><?= $employee['midname'] ?></u></p>
        <p class="mb-0"><b>2. </b>Дата народження «<u><?= $employee['birthdate'] ?></u>»    <b>3.</b> Громадянство <u><?= $employee['citizenship'] ?></u></p>
        <p class="mb-0"><b>4. </b>Освіта (базова загальна середня, повна загальна середня, професійно-технічна, неповна вища, базова вища, повна вища)<br><u><?= $employee['education'] ?></u></p>
        <br>
    </div>

    <div>
        <?php
            $institutionsArray = explode('/', $employee['institutionName']);
            $diplomaCertificatesArray = explode('/', $employee['diplomaСertificate']);
            $diplomaSeriesArray = explode('/', $employee['diplomaSeries']);
            $diplomaNumbersArray = explode('/', $employee['diplomaNumber']);
            $graduationYearsArray = explode('/', $employee['graduationYear']);

            $diplomaSpecialtiesArray = explode('/', $employee['diplomaSpecialty']);
            $diplomaQualificationsArray = explode('/', $employee['diplomaQualification']);
            $educationFormsArray = explode('/', $employee['educationForm']);
        ?>

        <table class="table table-bordered">
            <tr>
                <th>Назва освітнього закладу</th>
                <th>Диплом (свідоцтво, серія, номер)</th>
                <th>Рік закінчення</th>
            </tr>
            <?php for ($i = 0; $i < count($institutionsArray); $i++) : ?>
                <tr>
                    <td><?= $institutionsArray[$i] ?></td>
                    <td><?= $diplomaCertificatesArray[$i] . ' ' . $diplomaSeriesArray[$i] . ' ' . $diplomaNumbersArray[$i] ?></td>
                    <td><?= $graduationYearsArray[$i] ?></td>
                </tr>
            <?php endfor; ?>
            <tr>
                <th>Спеціальність (професія) за дипломом (свідоцтвом)</th>
                <th>Кваліфікація за дипломом (свідоцтвом)</th>
                <th>Форма навчанняя (денна, вечірня, заочна)</th>
            </tr>
            <?php for ($i = 0; $i < count($diplomaSpecialtiesArray); $i++) : ?>
                <tr>
                    <td><?= $diplomaSpecialtiesArray[$i] ?></td>
                    <td><?= $diplomaQualificationsArray[$i] ?></td>
                    <td><?= $educationFormsArray[$i] ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>

    <div>
        <p><b>5. </b> Післядипломна професійна підготовка: навчання в
        <label><input type="checkbox" disabled <?php if($employee['graduateSchool']) echo 'checked' ?>> аспірантурі</label>
        <label><input type="checkbox" disabled <?php if($employee['adjunct']) echo 'checked' ?>> ад'юнктурі</label>
        <label><input type="checkbox" disabled <?php if($employee['doctorate']) echo 'checked' ?>> докторантурі</label>
         </p>
    </div>

    <div>
        <?php
            $scientificInstitutionNamesArray = explode('/', $employee['scientificInstitutionName']);
            $diplomasArray = explode('/', $employee['diploma']);
            $diplomaNumbers2Array = explode('/', $employee['diplomaNumber2']);
            $diplomaIssueDatesArray = explode('/', $employee['diplomaIssueDate']);
            $graduationYears2Array = explode('/', $employee['graduationYear2']);
            $scientificDegreesArray = explode('/', $employee['scientificDegree']);
            $academicStatusesArray = explode('/', $employee['academicStatus']);
        ?>

        <table class="table table-bordered">
            <tr>
                <th>Назва освітнього, наукового закладу</th>
                <th>Диплом, номер, дата видачі</th>
                <th>Рік закінчення</th>
                <th>Науковий ступінь, учене звання</th>
            </tr>
            <?php for ($i = 0; $i < count($scientificInstitutionNamesArray); $i++) : ?>
                <tr>
                    <td><?= $scientificInstitutionNamesArray[$i] ?></td>
                    <td><?= $diplomasArray[$i] . ' ' . $diplomaNumbers2Array[$i] . ' ' . $diplomaIssueDatesArray[$i] ?></td>
                    <td><?= $graduationYears2Array[$i] ?></td>
                    <td><?= $scientificDegreesArray[$i] . ' ' . $academicStatusesArray[$i] ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>

    <div>
        <p><b>6. </b>Останнє місце роботи <u><?= $employee['lastWorkPlace'] ?></u> посада(професія) <u><?= $position['name'] ?></u></p>

        <div class="d-flex justify-content-between">
            <?php
                $currentDate = date_create(date('Y-m-d'));
                $acceptanceDate = date_create($employee['acceptanceDate']);

                $experienceDays = date_diff($currentDate, $acceptanceDate)->d;
                $experienceMonths = date_diff($currentDate, $acceptanceDate)->m;
                $experienceYears = date_diff($currentDate, $acceptanceDate)->y;
            ?>

            <div>
                <p><b>7. </b>Стаж роботи станом на «<?= $employee['acceptanceDate'] ?>»</p>
            </div>
            <div>
                <p>Загальний <u><?= $experienceDays ?></u> днів <u><?= $experienceMonths ?></u> місяців <u><?= $experienceYears ?></u> років</p>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <p>що дає право на надбавку за вислугу років <u><?= $employee['serviceDays'] ?></u> днів <u><?= $employee['serviceMonths'] ?></u> місяців <u><?= $employee['serviceYears'] ?></u> років</p>
        </div>

        <div>
            <p class="mb-0"><b>8. </b>Дата та причина звільнення (скорочення штатів; за власним бажанням, за прогул та інші порушення, невідповідність займаній посаді тощо)</p>
            <p class="mb-0"><u><?= $employee['dismissedDate'] ?></u> <u><?= $employee['dismissedReason'] ?></u></p>
            <p class="mb-0"><b>9. </b>Відомості про отримання пенсії (у разі наявності вказати вид пенсійних виплат згідно з чинним законодавством)</p>
            <p class="mb-0"><u><?= $employee['pensionInformation'] ?></u></p>
            <p><b>10. </b>Родинний стан <u><?= $employee['familyStatus'] ?></u></p>
        </div>
    </div>

    <div>
        <?php
            $familyMembersArray = explode('/', $employee['familyMembers']);
            $familyFullnamesArray = explode('/', $employee['familyFullname']);
            $familyBirthsDatesArray = explode('/', $employee['familyBirthdate']);
        ?>

        <table class="table table-bordered">
            <tr>
                <th>Ступінь родинного зв'язку (склад сім'ї)</th>
                <th>ПІБ</th>
                <th>Рік народження</th>
            </tr>
            <?php for ($i = 0; $i < count($familyMembersArray); $i++) : ?>
                <tr>
                    <td><?= $familyMembersArray[$i] ?></td>
                    <td><?= $familyFullnamesArray[$i] ?></td>
                    <td><?= $familyBirthsDatesArray[$i] ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>

    <div>
        <p class="mb-0"><b>11. </b>Місце фактичного проживання (область, місто, район, вулиця, № будинку, квартири, номер контактного телефону, поштовий індекс)
            <u><?= $employee['region'] ?> <?= $employee['city'] ?> <?= $employee['district'] ?> <?= $employee['street'] ?> <?= $employee['houseNumber'] ?>
                <?= $employee['apartmentNumber'] ?> <?= $employee['phoneNumber'] ?> <?= $employee['email'] ?> <?= $employee['postIndex'] ?></u></p>
        <p class="mb-0"><b>12. </b> Місце проживання за державною реєстрацією
            <u><?= $employee['regionStateRegistration'] ?> <?= $employee['cityStateRegistration'] ?> <?= $employee['districtStateRegistration'] ?> <?= $employee['streetStateRegistration'] ?>
                <?= $employee['houseStateRegistration'] ?> <?= $employee['apartmentStateRegistration'] ?> <?= $employee['postIndexStateRegistration'] ?></u></p>
        <p>Паспорт: серія <u><?= $employee['passportSeries'] ?></u> № <u><?= $employee['passportNumber'] ?></u>
            , ким виданий <u><?= $employee['passportIssued'] ?></u>, дата видачі <u><?= $employee['passportIssueDate'] ?></u></p>
    </div>

    <div>
        <h5>II. ВІДОМОСТІ ПРО ВІЙСЬКОВИЙ ОБЛІК</h5>

        <div class="d-flex justify-content-between">
            <div>
                <p class="mb-0">Група обліку <u><?= $employee['accountingGroup'] ?></u></p>
                <p class="mb-0">Категорія обліку <u><?= $employee['accountingCategory'] ?></u></p>
                <p class="mb-0">Склад <u><?= $employee['staff'] ?></u></p>
                <p class="mb-0">Військове звання <u><?= $employee['militaryRank'] ?></u></p>
                <p class="mb-0">Військово-облікова спеціальність № <u><?= $employee['militaryAccountingSpecialtyNumber'] ?></u></p>
            </div>
            <div>
                <p class="mb-0">Придатність до військової служби <u><?= $employee['militaryServiceSuitability'] ?></u></p>
                <p class="mb-0">Назва райвійськкомату за місцем реєстрації <u><?= $employee['registrationDMCommissariatName'] ?></u></p>
                <p class="mb-0">Назва райвійськкомату за місцем фактичного проживання <u><?= $employee['actualDMCommissariatName'] ?></u></p>
                <p class="mb-0">Перебування на спеціальному обліку <u><?= $employee['specialAccounting'] ?></u></p>
            </div>
        </div>
    </div>
</div>
