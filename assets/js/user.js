$(function(){
    'use strict';

    // Update User Profile Setting
    var formSetting = $('#SettingForm');
    $(formSetting).submit(function (e) {  // Form submission via ajax
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(formSetting).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false
        })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                $('#user_settingMsg').removeClass('alert alert-danger');
                $('#user_settingMsg').addClass('alert alert-success');
                $('#user_settingTrigger').trigger('click');
                // Set the message text.
                $('#user_settingMsg').text(response);

                // Clear the form.
                window.setTimeout(function() {
                    $(formSetting)[0].reset();
                }, 1000);
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $('#user_settingMsg').removeClass('alert alert-success');
                $('#user_settingMsg').addClass('alert alert-danger');
                // Set the message text.
                if (data.responseText !== '') {
                    $('#user_settingMsg').text(data.responseText);
                    $('#user_settingTrigger').trigger('click');
                } else {
                    $('#user_settingMsg').removeClass('alert alert-info').addClass('alert alert-danger').text('Oops! Record could not be saved.');
                    $('#user_settingTrigger').trigger('click');
                }
            });

    });
    //User settings message modal
    $('#user_settingTrigger').click(function () {
        $('#user_settingModal').modal('show');
        setTimeout(function() {
            $('#user_settingModal').modal('hide');
        }, 3000);
    });

// Update General Page Settings
    var PageSetting = $('#PageSettingForm');
    $(PageSetting).submit(function (e) {  // Form submission via ajax
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(PageSetting).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false
        })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                $('#msgPageSetting').removeClass('alert alert-danger');
                $('#msgPageSetting').addClass('alert alert-success');


                // Set the message text.
                $('#msgPageSetting').text(response);

                // Clear the form.
                window.setTimeout(function() {
                    $(PageSetting)[0].reset();
                }, 1000);
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $('#msgPageSetting').removeClass('alert alert-success');
                $('#msgPageSetting').addClass('alert alert-danger');
                // Set the message text.
                if (data.responseText !== '') {
                    $('#msgPageSetting').text(data.responseText);
                } else {
                    $('#msgPageSetting').removeClass('alert alert-info').addClass('alert alert-danger').text('Oops! Record could not be saved.');
                }
            });

    });

    // Add Grade Calculator Course
    var gradeCalcForm = $('#gradeCalcForm');
    $(gradeCalcForm).submit(function (e) {  // Form submission via ajax
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(gradeCalcForm).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false
        })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                $('#msgGradeCalcForm').removeClass('alert alert-danger');
                $('#msgGradeCalcForm').addClass('alert alert-success');


                // Set the message text.
                $('#msgGradeCalcForm').text(response);

                // Clear the form.
                window.setTimeout(function() {
                    $(gradeCalcForm)[0].reset();
                }, 1000);
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $('#msgGradeCalcForm').removeClass('alert alert-success');
                $('#msgGradeCalcForm').addClass('alert alert-danger');
                // Set the message text.
                if (data.responseText !== '') {
                    $('#msgGradeCalcForm').text(data.responseText);
                } else {
                    $('#msgGradeCalcForm').removeClass('alert alert-info').addClass('alert alert-danger').text('Oops! Record could not be saved.');
                }
            });

    });


     /* Complaint Form Processing
    =========================================================================================
    */
    $("#complaintSubject").keyup(function() {
        "use strict";
        var value = $(this).val();
        if (value.length > 2) {
            $(this).parent().find(".error_message").remove();
            $(this).css({
                "border": "1px solid rgba(0, 0, 0, 0.2)"
            })
        } else {
            $(this).parent().find(".error_message").remove();
            $(this).parent().append("<div class='error_message text-danger'>Subject is too short</div>");
        }
    });
    $("#complaintTextarea").keyup(function() {
        "use strict";
        var value = $(this).val();
        if (value.length > 1) {
            $(this).parent().find(".error_message").remove();
            $(this).css({
                "border": "1px solid rgba(0, 0, 0, 0.2)"
            })
        } else {
            $(this).parent().find(".error_message").remove();
            $(this).parent().append("<div class='error_message text-danger'>Message is too short</div>");
        }
    });
    $("#conEmail").keyup(function() {
        "use strict";
        var value = $(this).val();
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test(value)) {
            $(this).parent().find(".error_message").remove();
            $(this).css({
                "border": "1px solid rgba(0, 0, 0, 0.2)"
            })
        } else {
            $(this).parent().find(".error_message").remove();
            $(this).parent().append("<div class='error_message text-danger'>Please enter a valid email </div>");
        }
    });


    var compForm = $('#sendComplaintForm');
    $(compForm).submit(function(e) {
        e.preventDefault();

        var messageValue = $("#complaintTextarea").val();
        if (!messageValue.length) {
            $("#complaintTextarea").css({
                "border": "1px solid red"
            });
            $("#complaintTextarea").parent().find(".error_message").remove();
            $("#complaintTextarea").parent().append("<div class='error_message text-danger'>Message is required</div>");
            return false;
        }

        var subjectValue = $("#complaintSubject").val();
        if (!subjectValue.length) {
            $("#complaintSubject").css({
                "border": "1px solid red"
            });
            $("#complaintSubject").parent().find(".error_message").remove();
            $("#complaintSubject").parent().append("<div class='error_message text-danger'>Subject is required</div>");
            return false;
        }

        var nameValue = $("#complaintName").val();

        var emailValue = $("#conEmail").val();
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (!emailValue) {
            $("#conEmail").css({
                "border": "1px solid red"
            });
            $("#conEmail").parent().find(".error_message").remove();
            $("#conEmail").parent().append("<div class='error_message text-danger'>Email is required</div>").show();
            return false;
        }
        if (!testEmail.test(emailValue)) {
            $("#conEmail").css({
                "border": "1px solid red"
            });
            $("#conEmail").parent().find(".error_message").remove();
            $("#conEmail").parent().append("<div class='error_message text-danger'>Please enter a valid email.</div>").show();
            return false;
        }
        if (nameValue && emailValue && subjectValue && messageValue) {
            $(".feedback_box").slideDown();
            $.ajax({
                url: $(compForm).attr('action'),
                data: new FormData(this),
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                success: function(result) {
                    "use strict";
                    $(".show_result").append("<div class='result_message'>" + result + "</div>");
                    $('#complaint_trigger').trigger('click');
                    $(".result_message").slideDown();
                    $("#complaintName").val("");
                    $("#conEmail").val("");
                    $("#complaintSubject").val("");
                    $("#complaintTextarea").val("");
                }
            });
        }
        return false;
    });
    //Send complaint message modal
    $('#complaint_trigger').click(function () {
        $('#complaint_modal').modal('show');
        setTimeout(function() {
            $('#complaint_modal').modal('hide');
        }, 4000);
    });

    /* PASSWORD RESET
=========================================================================================
*/
    $("#reset_password_email").keyup(function() {
        "use strict";
        var value = $(this).val();
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test(value)) {
            $(this).parent().find(".error_message").remove();
            $(this).css({
                "border": "1px solid rgba(0, 0, 0, 0.2)"
            })
        } else {
            $(this).parent().find(".error_message").remove();
            $(this).parent().append("<div class='error_message text-danger'>Please enter a valid email </div>");
        }
    });


    var reset_pwdForm = $('#reset_password_form');
    $(reset_pwdForm).submit(function(e) {
        "use strict";
        e.preventDefault();

        var resetEmailValue = $("#reset_password_email").val();
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (!resetEmailValue) {
            $("#reset_password_email").css({
                "border": "1px solid red"
            });
            $("#reset_password_email").parent().find(".error_message").remove();
            $("#reset_password_email").parent().append("<div class='error_message text-danger'>Email is required</div>").show();
            return false;
        }
        if (!testEmail.test(resetEmailValue)) {
            $("#reset_password_email").css({
                "border": "1px solid red"
            });
            $("#reset_password_email").parent().find(".error_message").remove();
            $("#reset_password_email").parent().append("<div class='error_message text-danger'>Please enter a valid email.</div>").show();
            return false;
        }
        if (resetEmailValue) {
            $(".feedback_box").slideDown();
            $.ajax({
                url: $(reset_pwdForm).attr('action'),
                data: new FormData(this),
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                success: function(result) {
                    "use strict";
                    $(".show_result").append("<div class='result_message'>" + result + "</div>");
                    $(".result_message").slideDown();
                    $("#reset_password_email").val("");
                }
            });
        }
        return false;
    });



    /* Password Reset Process
=========================================================================================
*/
    var resetProcessForm = $('#reset_process_form');
    $(resetProcessForm).submit(function (e) {  // Form submission via ajax
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(resetProcessForm).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false
        })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                $('#reset_message').removeClass('alert alert-danger');
                $('#reset_message').addClass('alert alert-success');


                // Set the message text.
                $('#reset_message').text(response);

                // Clear the form.
                window.setTimeout(function() {
                    $(resetProcessForm)[0].reset();
                }, 1000);
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $('#reset_message').removeClass('alert alert-success');
                $('#reset_message').addClass('alert alert-danger');
                // Set the message text.
                if (data.responseText !== '') {
                    $('#reset_message').text(data.responseText);
                } else {
                    $('#reset_message').removeClass('alert alert-info').addClass('alert alert-danger').text('Oops! Record could not be saved.');
                }
            });
            });


        /* Result Upload Process
=========================================================================================
*/
    var resultProcessForm = $('#resultUploadForm');
    $(resultProcessForm).submit(function (e) {  // Form submission via ajax
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(resultProcessForm).attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false
            })
                .done(function(response) {
                    // Make sure that the formMessages div has the 'success' class.
                    $('#resultUploadMsg').removeClass('alert alert-danger');
                    $('#resultUploadMsg').addClass('alert alert-success');


                    // Set the message text.
                    $('#resultUploadMsg').text(response);
                    $('#showUploadMsg').trigger('click');

                    // Clear the form.
                    window.setTimeout(function() {
                        $(resultProcessForm)[0].reset();
                    }, 1000);
                })
                .fail(function(data) {
                    // Make sure that the formMessages div has the 'error' class.
                    $('#resultUploadMsg').removeClass('alert alert-success');
                    $('#resultUploadMsg').addClass('alert alert-danger');
                    // Set the message text.
                    if (data.responseText !== '') {
                        $('#resultUploadMsg').text(data.responseText);
                        $('#showUploadMsg').trigger('click');
                    } else {
                        $('#resultUploadMsg').removeClass('alert alert-info').addClass('alert alert-danger').text('Oops! result not uploaded.');
                        $('#showUploadMsg').trigger('click');
                    }
                });
    });

    var nd1_Notfirst_semester = $("#ND1_second_semester, #ND2_first_semester, #ND2_second_semester, #HND1_first_semester, #HND1_second_semester, #HND2_first_semester, #HND2_second_semester");
    var nd1_Notsecond_semester = $("#ND1_first_semester, #ND2_first_semester, #ND2_second_semester, #HND1_first_semester, #HND1_second_semester, #HND2_first_semester, #HND2_second_semester");
    var nd2_Notfirst_semseter = $("#ND1_second_semester, #ND1_first_semester, #ND2_second_semester, #HND1_first_semester, #HND1_second_semester, #HND2_first_semester, #HND2_second_semester");
    var nd2_Notsecond_semseter = $("#ND1_second_semester, #ND1_first_semester, #ND2_first_semester, #HND1_first_semester, #HND1_second_semester, #HND2_first_semester, #HND2_second_semester");
    var hnd1_Notfirst_semester = $("#HND1_second_semester, #ND2_first_semester, #ND2_second_semester, #ND1_first_semester, #ND1_second_semester, #HND2_first_semester, #HND2_second_semester");
    var hnd1_Notsecond_semester = $("#HND1_first_semester, #ND2_first_semester, #ND2_second_semester, #ND1_first_semester, #ND1_second_semester, #HND2_first_semester, #HND2_second_semester");
    var hnd2_Notfirst_semester = $("#ND1_second_semester, #ND2_first_semester, #ND2_second_semester, #HND1_first_semester, #HND1_second_semester, #ND1_first_semester, #HND2_second_semester");
    var hnd2_Notsecond_semester = $("#ND1_second_semester, #ND2_first_semester, #ND2_second_semester, #HND1_first_semester, #HND1_second_semester, #ND1_first_semester, #HND2_first_semester");
    $(nd1_Notfirst_semester).hide();
    $('#level_option').change(function () {
        var levelValue = $(this).children("option:selected").val();
        // ND1
        if(levelValue === 'nd1'){
            $(nd1_Notfirst_semester).hide();
            $('#ND1_first_semester').show();
            $('#semester_option').change(function () {
                $(nd1_Notfirst_semester).hide();
                $('#ND1_first_semester').show();
                var semesterValue = $(this).children("option:selected").val();
                if(semesterValue === 'fs'){
                    //show first semester courses
                    $(nd1_Notfirst_semester).hide();
                    $('#ND1_first_semester').show();
                } else if(semesterValue === 'ss'){
                    //display second semester courses
                    $(nd1_Notsecond_semester).hide();
                    $('#ND1_second_semester').show();
                }
            });
        } else if(levelValue === 'nd2'){
            $(nd2_Notfirst_semseter).hide();
            $("#ND2_first_semester").show();
            $('#semester_option').change(function () {
                var semesterValue = $(this).children("option:selected").val();
                if(semesterValue === 'fs'){
                    $(nd2_Notfirst_semseter).hide();
                    $("#ND2_first_semester").show();
                } else if(semesterValue === 'ss'){
                    $(nd2_Notsecond_semseter).hide();
                    $("#ND2_second_semester").show();
                }
            });
        } else if(levelValue === 'hnd1'){
            $(hnd1_Notfirst_semester).hide();
            $("#HND1_first_semester").show();
            $('#semester_option').change(function () {
                var semesterValue = $(this).children("option:selected").val();
                if(semesterValue === 'fs') {
                    $(hnd1_Notfirst_semester).hide();
                    $("#HND1_first_semester").show();
                } else if(semesterValue === 'ss') {
                    $(hnd1_Notsecond_semester).hide();
                    $("#HND1_second_semester").show();
                }
            });
        } else if(levelValue === 'hnd2') {
            $(hnd2_Notfirst_semester).hide();
            $("#HND2_first_semester").show();
            $('#semester_option').change(function () {
                var semesterValue = $(this).children("option:selected").val();
                if (semesterValue === 'fs') {
                    $(hnd2_Notfirst_semester).hide();
                    $("#HND2_first_semester").show();
                } else if (semesterValue === 'ss') {
                    $(hnd2_Notsecond_semester).hide();
                    $("#HND2_second_semester").show();
                }
            });
        }
    });
    $('#semester_option').change(function () {
        var semester_Value = $(this).children('option:selected').val();
        if(semester_Value === 'ss'){
            var levelValue = $('#level_option').val();
            if(levelValue === 'nd1'){
                $(nd1_Notsecond_semester).hide();
                $('#ND1_second_semester').show();
            } else if(levelValue === 'nd2'){
                $(nd2_Notsecond_semseter).hide();
                $("#ND2_second_semester").show();
            } else if(levelValue === 'hnd1'){
                $(hnd1_Notsecond_semester).hide();
                $("#HND1_second_semester").show();
            } else if(levelValue === 'hnd2'){
                $(hnd2_Notsecond_semester).hide();
                $("#HND2_second_semester").show();
            }
        } else if(semester_Value === 'fs'){
            var levelValue = $('#level_option').val();
            if(levelValue === 'nd1'){
                $(nd1_Notfirst_semester).hide();
                $('#ND1_first_semester').show();
            } else if(levelValue === 'nd2'){
                $(nd2_Notfirst_semseter).hide();
                $("#ND2_first_semester").show();
            } else if(levelValue === 'hnd1'){
                $(hnd1_Notfirst_semester).hide();
                $("#HND1_first_semester").show();
            } else if(levelValue === 'hnd2'){
                $(hnd2_Notfirst_semester).hide();
                $("#HND2_first_semester").show();
            }
        }
    });

    //Upload tips modal
    $('#overlay').modal('show');
    setTimeout(function() {
        $('#overlay').modal('hide');
    }, 10000);

    //Upload result message modal
    $('#showUploadMsg').click(function () {
        $('#uploadMsgModal').modal('show');
        setTimeout(function() {
            $('#uploadMsgModal').modal('hide');
        }, 4000);
    });

    /* Result download modal
=========================================================================================
*/
    var recent_resultBtn = $('#download_nd1ss, #download_nd2fs, #download_nd2ss, #download_hnd2fs, #download_hnd2ss');
    $(recent_resultBtn).submit(function (e) {  // Form submission via ajax
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(recent_resultBtn).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false
        })
            .done(function (response) {
                $('#recent_resultMsg').removeClass('alert alert-success');
                $('#recent_resultMsg').addClass('alert alert-danger');
                $('#recent_resultMsg').text("Result not available done");
                $('#recent_resultTrigger').trigger('click');
            })
            .fail(function (data) {
                // Make sure that the formMessages div has the 'error' class.
                $('#recent_resultMsg').removeClass('alert alert-success');
                $('#recent_resultMsg').addClass('alert alert-danger');
                // Set the message text.
                if (data.responseText !== '') {
                    $('#recent_resultMsg').text(data.responseText);
                    $('#recent_resultTrigger').trigger('click');
                } else {
                    $('#recent_resultMsg').removeClass('alert alert-info').addClass('alert alert-danger').text('Oops! result not available.');
                    $('#recent_resultTrigger').trigger('click');
                }
            });
    });
    //Recent result message modal
    $('#recent_resultTrigger').click(function () {
        $('#recent_resultModal').modal('show');
        setTimeout(function() {
            $('#recent_resultModal').modal('hide');
        }, 4000);
    });

    // Toggle all results download option
    $('#option1').click(function () {
        $('#nd1fs_result, #nd1ss_result').show();
        $('#nd2fs_result, #nd2ss_result, #hnd1fs_result, #hnd1ss_result, #hnd2fs_result, #hnd2ss_result').hide();
    });
    $('#option2').click(function () {
        $('#nd2fs_result, #nd2ss_result').show();
        $('#nd1fs_result, #nd1ss_result, #hnd1fs_result, #hnd1ss_result, #hnd2fs_result, #hnd2ss_result').hide();
    });
    $('#option3').click(function () {
        $('#hnd1fs_result, #hnd1ss_result').show();
        $('#nd2fs_result, #nd2ss_result, #nd1fs_result, #nd1ss_result, #hnd2fs_result, #hnd2ss_result').hide();
    });
    $('#option4').click(function () {
        $('#hnd2fs_result, #hnd2ss_result').show();
        $('#nd2fs_result, #nd2ss_result, #hnd1fs_result, #hnd1ss_result, #nd1fs_result, #nd1ss_result').hide();
    });

    $('#checkResultModal').modal('hide');
    $('#results_php_btn').click(function () {
        $('#checkResultModal').modal('show');
        var checkResultForm = $('#checkResultForm');
        $(checkResultForm).submit(function (event) {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(checkResultForm).attr('action'),
                data: new FormData (this),
                cache: false,
                contentType: false,
                processData: false
            }).done(function(response){
                $(checkResultForm)[0].reset();
                $(checkResultForm).modal('hide');
                window.location.href = 'results.php';
            }).fail(function (data) {
                $('#checkResultMsg').removeClass('alert alert-success').addClass('alert alert-danger');
                if(data.responseText !== ''){
                    $('#checkResultMsg').text(data.responseText);
                } else {
                    $('#checkResultMsg').text('Oops! request failed');
                }
            })
        });
    });

});