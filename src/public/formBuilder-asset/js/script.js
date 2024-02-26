

$(document).ready(function () {
    $.getScript("formBuilder-asset/js/createElement.js", function () {
        $('.tags').draggable({
            helper: 'clone',
            drag: function (event, ui) {
                ui.helper.width(100).height(50);
            }
        });
        $('#form-content').sortable()
        $('#form-content').droppable({
            drop: function (event, ui) {
                var OuterDiv = $("<div>").addClass("d-flex").css({
                    "background-color": "#f0f0f0c8",
                    "marginTop": "10px",
                    "marginBottom": "10px",
                    "width": "100%"
                });


                // console.log(ui.helper.hasClass("inputTag"));
                if (ui.helper.hasClass("inputTag")) {
                    var element = createInputField()
                } else if (ui.helper.hasClass("textArea")) {
                    var element = createTextArea()
                } else if (ui.helper.hasClass("selectfield")) {
                    var element = createSelectField()
                } else if (ui.helper.hasClass("radiofield")) {
                    var element = createRadio(OuterDiv)
                } else if (ui.helper.hasClass("chackBox")) {
                    var element = createCheckbox(OuterDiv)
                } else if (ui.helper.hasClass("fileUpload")) {
                    var element = createFileUpload()
                } else if (ui.helper.hasClass("button")) {
                    console.log('hello')
                    var element = createButton();
                }

            }
        });
    });
});






