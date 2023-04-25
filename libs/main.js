$(document).ready(function() {
    jQuery.extend(jQuery.validator.messages, {
        required: "Обов'язкове поле.",
        email: "Будь ласка, введіть дійсну адресу електронної пошти.",
    });

    let current_fs, next_fs, previous_fs;

    let form = $("#msform");
    form.validate({
        rules: {
            email: { required: false, email: true },
        },
    });

    $(".next").click(function(){
        current_fs = $(this).parent().parent();
        next_fs = $(this).parent().parent().next();

        if (form.valid()) {
            next_fs.show();
            current_fs.hide();
        }
    });

    $(".previous").click(function(){
        current_fs = $(this).parent().parent();
        previous_fs = $(this).parent().parent().prev();

        previous_fs.show();
        current_fs.hide();
    });




    function addAppendBtnListener(btnQuery, blockQuery, parentBlockQuery, maxAmount) {
        $(btnQuery).click(() => {
            let clonedBlock = $(blockQuery).length;

            if (clonedBlock < maxAmount) {
                $(`${blockQuery}:first`).clone()
                    .find('input').val('').prop('checked', false).end()
                    .appendTo(parentBlockQuery);
            }
        });
    }

    function addRemoveBtnListener(btnQuery, blockQuery) {
        $(btnQuery).click(() => {
            if ($(blockQuery).length > 1) {
                $(`${blockQuery}:last`).remove();
            }
        });
    }

    addAppendBtnListener("#append-education-btn", '.education-block', '.parent-education-block', 4);
    addAppendBtnListener("#append-family-btn", '.family-block', '.parent-family-block', 4);
    addAppendBtnListener("#append-profEducation-btn", '.professional-education-block', '.professional-education-family-block', 13);
    addAppendBtnListener("#append-transfer-btn", '.transfer-block', '.transfer-family-block', 12);
    addAppendBtnListener("#append-vacation-btn", '.vacation-block', '.vacation-family-block', 19);

    addRemoveBtnListener("#remove-education-btn", '.education-block');
    addRemoveBtnListener("#remove-family-btn", '.family-block');
    addRemoveBtnListener("#remove-profEducation-btn", '.professional-education-block');
    addRemoveBtnListener("#remove-transfer-btn", '.transfer-block');
    addRemoveBtnListener("#remove-vacation-btn", '.vacation-block');

    if (!($("#graduateSchool").is(":checked"))) {
        $(".gs-input").prop('disabled', true);
    }

    if (!($("#postgraduateSchool").is(":checked"))) {
        $(".ps-input").prop('disabled', true);
    }

    if (!($("#doctorate").is(":checked"))) {
        $(".doc-input").prop('disabled', true);
    }

    function addInputListener(elQuery, checkQuery, inputQuery) {
        $(elQuery).click(() => {
            if ($(elQuery).is(":checked")) {
                $(inputQuery).prop('disabled', false);
            } else {
                $(inputQuery).val('').prop('disabled', true);
            }
        });
    }

    addInputListener("#graduateSchool", ".graduateSchoolCheck", ".gs-input");
    addInputListener("#postgraduateSchool", ".psCheck", ".ps-input");
    addInputListener("#doctorate", ".doctorateCheck", ".doc-input");
});