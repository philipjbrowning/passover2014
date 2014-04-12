// JavaScript Document

// VARIABLES -----------------------------------------------------------------------------------------------------------

// Days in month
var daysInMonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

// Get required nodes
var BIRmm = document.getElementById('BIRmm');
var BIRdd = document.getElementById('BIRdd');
var BIRyy = document.getElementById('BIRyy');
var church = document.getElementById('church');
var branch1 = document.getElementById('branch1');
var branch2 = document.getElementById('branch2');
var comment = document.getElementById('comment');
var firstName = document.getElementById('first_name');
var middleName = document.getElementById('middle_name');
var lastName = document.getElementById('last_name');
var life_no_1 = document.getElementById('life_no_1');
var life_no_2 = document.getElementById('life_no_2');
var life_no_3 = document.getElementById('life_no_3');
var phone1 = document.getElementById('phone_1');
var phone2 = document.getElementById('phone_2');
var phone3 = document.getElementById('phone_3');


var validationText = $('#validationText');

// EVENT LISTENERS -----------------------------------------------------------------------------------------------------

BIRmm.addEventListener('keyup', function() {
    validateLength($(this), 2);
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
    /*
    validateMonth($(this));
    validateDay(this);
    console.log("validateMonth - "+$(this));
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
    */
});
BIRdd.addEventListener('keyup', function() {
    validateLength($(this), 2);
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
    /*
    validateDay($(this));
    console.log("validateDay - "+$(this));
    console.log("validateDay - "+$('#BIRdd').val());
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
    */
});
BIRyy.addEventListener('keyup', function() {
    validateLength($(this), 2);
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
    /*
    validateYear($(this));
    console.log("validateYear - "+$(this));
    console.log("here");
    if (this.value.length == this.maxLength) {
        console.log("really here");
        $('#female-gender').focus();
    }
    */
});
branch1.addEventListener('keyup', function() {
	validateLength($(this), 1);
});
branch2.addEventListener('keyup', function() {
	optionalValidateLength($(this), 5);
});
church.addEventListener('keyup', function() {
    validateLength($(this), 3);
});
/*
comment.addEventListener('keyup', function() {
    optionalValidateLength($(this), 3);
});
*/
firstName.addEventListener('keyup', function() {
	validateLength($(this), 2);
});
lastName.addEventListener('keyup', function() {
	validateLength($(this), 2);
});

life_no_1.addEventListener('keyup', function() {
    /*
    var myRe = /[a-z,A-Z]{1}[0-9]{2}$/g;
    if (myRe.test($(this).val())) {
        $(this).addClass("validInput");
        console.log("validInput");
    } else {
        $(this).removeClass("validInput");
        console.log("invalidInput");
    }
    */
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
});
life_no_2.addEventListener('keyup', function() {
    // validatePhone($(this), 6);
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
});
/*
life_no_3.addEventListener('keyup', function() {
    console.log("life_no_3");
    var number = parseInt($(this).val());
    console.log(number);
    if ((number > 0) && ($(this).val().length > 0)) {
        $(this).addClass("validInput");
        console.log("validInput");
    } else {
        $(this).removeClass("validInput");
        console.log("invalidInput");
    }
});
middleName.addEventListener('keyup', function() {
    optionalValidateLength($(this), 2);
});
*/
phone1.addEventListener('keyup', function() {
    validatePhone($(this), 3);
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
});
phone2.addEventListener('keyup', function() {
    validatePhone($(this), 3);
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
});
phone3.addEventListener('keyup', function() {
    validatePhone($(this), 4);
    if (this.value.length == this.maxLength) {
        $(this).next('#card input').focus();
    }
});

// FORM INPUT TO MYSQL DATABASE ----------------------------------------------------------------------------------------

$("#add-member").click(function(e) {
    validationText.html("Processing...");
    e.preventDefault();
    var validation = formIsValid();
    if (validation['result']) {
        addOrRegisterMember("add-member");
    } else {
        validationText.addClass("redText").removeClass("greenText").html(validation['message']);
        console.log("invalidForm - "+validation['message']);
        // Display error message
    }
});

$("#add-register-member").click(function(e) {
    validationText.html("Processing...");
	e.preventDefault();
    var validation = formIsValid();
    if (validation['result']) {
        addOrRegisterMember("add-register-member");
    } else {
        validationText.addClass("redText").removeClass("greenText").html(validation['message']);
        console.log("invalidForm - "+validation['message']);
        // Display error message
    }
});
/*
$("#reset").click(function(e) {
    document.getElementById("add-member-form").reset();
});
*/
$(".zion").change(function () {
    if ($('.zion:checked').val() == 'other') {
        $('#church').prop('disabled',false);
    } else {
        $('#church').val('');
        $('#church').prop('disabled',true);
    }
});

function addOrRegisterMember(task) {
    if (!duplicateMemberExists()) {
        console.log(task);
        console.log('late_registration = '+$('#late_registration').is(':checked'));
        var late_registration = "false";
        if ($('#late_registration').is(':checked')) {
            late_registration = "true";
        }
        var response = $.ajax({
            type: "POST",
            data: {
                "BIRmm"             : BIRmm.value,
                "BIRdd"             : BIRdd.value,
                "BIRyy"             : BIRyy.value,
                "branch1"           : branch1.value,
                "branch2"           : branch2.value,
                "comments"          : comment.value,
                "first_name"        : firstName.value,
                "gender"            : $('.gender:checked').val(),
                "middle_name"       : middleName.value,
                "last_name"         : lastName.value,
                "late_registration" : late_registration,
                "life_no_1"         : life_no_1.value,
                "life_no_2"         : life_no_2.value,
                "life_no_3"         : life_no_3.value,
                "phone1"            : phone1.value,
                "phone2"            : phone2.value,
                "phone3"            : phone3.value,
                "task"              : task,
                "registerer_id"     : $('#registerer_id').val(),
                "zion_id"           : $('.zion:checked').val(),
                "zion_name"         : church.value
            },
            url: "includes/add-register-member.php"
        }).done(function(data) {
                console.log(data);
                if (data != 'false') {
                    updateNewsFeed(toTitleCase(firstName.value)+' '+toTitleCase(lastName.value)+' added');
                    updateCounter();
                    if (task == 'add-register-member') {
                        updateNewsFeed(toTitleCase(firstName.value)+' '+toTitleCase(lastName.value)+' registered');
                        loadPageTemplate('register-member');
                    }
                    if (task == 'add-member') {
                        $('#validationText').html('SUCCESS!');
                        document.getElementById("add-member-form").reset();
                        $('#zion-1').focus();
                    }
                } else {
                    $('#validationText').addClass("redText").removeClass("greenText").html('FAILED: Try again!');
                    console.log('addOrRegisterMember('+task+') - FAILED to add in MySQL');
                }
        }).fail(function() {
                $('#validationText').addClass("redText").removeClass("greenText").html('AJAX Failure');
                console.log("addOrRegisterMember('+task+') - AJAX FAILURE");
                console.log(data['result']);
        });
    } else {
        $('#validationText').addClass("redText").removeClass("greenText").html('FAILED: This member exists');
        console.log('addOrRegisterMember('+task+') - FAILED. Duplicate member.');
    }

}


// INDIVIDUAL FIELD VALIDATION -----------------------------------------------------------------------------------------

function duplicateMemberExists() {
    /*
    var response = $.ajax({
        type: "POST",
        data: {
            "BIRmm"             : BIRmm.value,
            "BIRdd"             : BIRdd.value,
            "BIRyy"             : BIRyy.value,
            "first_name"        : firstName.value,
            "middle_name"       : middleName.value,
            "last_name"         : lastName.value,
            "life_no_1"         : life_no_1.value,
            "life_no_2"         : life_no_2.value,
            "life_no_3"         : life_no_3.value
        },
        url: "includes/duplicate-member-check.php"
    }).done(function(data) {
        if (result == 'true') {
            return true;
        } else {
            return false;
        }
    }).fail(function() {
        console.log("duplicateMemberExists() - AJAX FAILURE");
        return false;
    });
    */
    return false;
}

function formIsValid() {
    validationText.removeClass("redText").addClass("greenText");
    if (!$('.zion').is(':checked')) {
        return { 'result':false, 'message':'Select zion.' };
    } else {
        if (($('.zion:checked').val() == 'other') && ($("#church").val().length < 3)) {
            console.log($('#church').val());
            console.log($('#church').val().length);

            return { 'result':false, 'message':'Enter valid other zion name.' };
        }
    }
    if (!$('#first_name').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid first name' }; }
    if (!$('#middle_name').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid middle name' }; }
    if (!$('#last_name').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid last name' }; }
    if (!$('#BIRmm').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid birth month' }; }
    if (!$('#BIRdd').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid birth day' }; }
    if (!$('#BIRyy').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid birth year' }; }
    if (!$('.gender').is(':checked')) { return { 'result':false, 'message':'Select gender.' }; }
    if (!$('#life_no_1').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid life number' }; }
    if (!$('#life_no_2').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid life number' }; }
    if (!$('#life_no_3').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid life number' }; }
    if (!$('#phone_1').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid phone number' }; }
    if (!$('#phone_2').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid phone number' }; }
    if (!$('#phone_3').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid phone number' }; }
    if (!$('#branch1').hasClass('validInput')) { return { 'result':false, 'message':'Enter valid branch name' }; }
    // Gender (radio button) just needs to have a value
    // zion (radio button) just needs to have a value, if "other" selected, input church must have value >= 3
    return { 'result':true };
}

function validateDay(input) {
    var month = parseInt(BIRmm.value);
    console.log("month = "+month);
    console.log("daysInMonth = "+daysInMonth[month-1]);
    if ((month > 0) && (month <= 12)) {
        var day = parseInt(input.val());
        if ((day > 0) && (day <= parseInt(daysInMonth[month-1]))) {
            console.log ("0 < "+day+" < "+daysInMonth[month-1]);
            validateLength(input, 2);
        } else {
            input.removeClass("validInput");
        }
    } else {
        input.removeClass("validInput");
        console.log("invalidInput");
    }
}

function validateLength(input, lengthRequired) {
    if ((input.val().length >= lengthRequired) && !input.hasClass("validInput")) {
        input.addClass("validInput");
        console.log("validInput");
    } else if ((input.val().length < lengthRequired) && input.hasClass("validInput")) {
        input.removeClass("validInput");
        console.log("invalidInput");
    }
}

function optionalValidateLength(input, lengthRequired) {
    if ((input.val().length >= lengthRequired) && !input.hasClass("validInput")) {
        input.addClass("validInput");
        console.log("validInput");
    } else if ((input.val().length <= 0) && !input.hasClass("validInput")) {
        input.addClass("validInput");
        console.log("validInput");
    } else if ((input.val().length > 0) && (input.val().length < lengthRequired) && input.hasClass("validInput")) {
        input.removeClass("validInput");
        console.log("invalidInput");
    } else {
        console.log(input.hasClass("validInput"));
    }
}

function validateMonth(input) {
    var month = parseInt(input.val());
    if ((month > 0) && (month <= 12)) {
        validateLength(input, 2);
    } else {
        input.removeClass("validInput");
        console.log("invalidInput");
    }
}

function validatePhone(input, lengthRequired) {
    var digits = parseInt(input.val());
    if ((digits >= 0) && (digits <= Math.pow(10,lengthRequired)-1)) {
        validateLength(input, lengthRequired);
    } else {
        input.removeClass("validInput");
        console.log("invalidInput");
    }
}

function validateYear(input) {
    if ((parseInt(input.val()) >= 0) && (parseInt(input.val()) <= 99)) {
        validateLength(input, 2);
    } else {
        input.removeClass("validInput");
        console.log("invalidInput");
    }
}