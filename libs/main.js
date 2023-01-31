$("#append-btn1").click(() => {
    let clonedBlock = $('.education-block').length;

    if (clonedBlock < 5) {
        $('.education-block:first').clone()
            // .find('label').text('').end()
            .find('input').val('').prop('checked', false).end()
            .appendTo('.parent-education-block');
    }
});

$("#remove-btn1").click(() => {
    if ($('.education-block').length > 1) {
        $('.education-block:last').remove();
    }
});

$("#append-btn2").click(() => {
    let clonedBlock = $('.family-block').length;

    if (clonedBlock < 5) {
        $('.family-block:first').clone()
            // .find('label').text('').end()
            .find('input').val('').prop('checked', false).end()
            .appendTo('.parent-family-block');
    }
});

$("#remove-btn2").click(() => {
    if ($('.family-block').length > 1) {
        $('.family-block:last').remove();
    }
});



$(".graduateSchoolCheck").hide();
$(".adjunctCheck").hide();
$(".doctorateCheck").hide();

$("#graduateSchool").click(() => {
    if ($("#graduateSchool").is(":checked")) {
        $(".graduateSchoolCheck").show();
    } else {
        $(".graduateSchoolCheck").hide();
        $(".gs-input").val('');
    }
});

$("#adjunct").click(() => {
    if ($("#adjunct").is(":checked")) {
        $(".adjunctCheck").show();
    } else {
        $(".adjunctCheck").hide();
        $(".adjunct-input").val('');
    }
});

$("#doctorate").click(() => {
    if ($("#doctorate").is(":checked")) {
        $(".doctorateCheck").show();
    } else {
        $(".doctorateCheck").hide();
        $(".doctorate-input").val('');
    }
});

