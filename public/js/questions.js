filterQuestionsBySubject(1);

$(document).on("change", "#subject", function(e) {
    filterQuestionsBySubject($(this).val());
});

function filterQuestionsBySubject(subjectId) {
    $("#question option").hide();
    var options = $("#question option[data-subject="+ subjectId +"]");
    options.show();
    $("#question").val($(options[0]).val());
}