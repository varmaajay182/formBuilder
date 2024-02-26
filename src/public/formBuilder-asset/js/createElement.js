


var inputFiledCounter = 1
var textareaCounter = 1
var selectCounter = 1
var radioCounter = 1
var checkboxCounter = 1
var fileUploadCounter = 1;
var buttonCounter = 1;



function createInputField() {
    $.getScript("formBuilder-asset/js/componentSetting/inputFieldSetting.js", function () {
        // 
        var div = $(
            "<div class='form-group' onclick=inputFieldSetting()  style='display: flex; justify-content: space-around; align-items:center; background-color:#f0f0f0c8; width: 100%; height:8%; margin-bottom: 10px; margin-top: 10px;'></div>"
        );

        var label = $("<label style='width: 20%; margin-right: 10px; font-size:20px'><b>InputField" +
            inputFiledCounter + ": </b></label>");

        var inputField = $(
            `<input type='text' class='form-control' id='idName${inputFiledCounter}' name='nameatrribute${inputFiledCounter}' placeholder='Please enter something...' style='width: 70%; height:64%; margin-top: 10px; margin-bottom: 10px'>`
        );

        inputField.on('input', function () {
            label.html("<b>" + $(this).val() + "</b>");
        });


        $(div).append(label).append(inputField);
        inputFiledCounter++;
        $('#form-content').append(div);
    });
}


function createTextArea() {
    $.getScript("formBuilder-asset/js/componentSetting/textAreaFieldSetting.js", function () {
        // return console.log(div);

        var label = $("<label style='width: 20%; margin-left: 36px; font-size:20px'><b>TextArea" +
            textareaCounter + ": </b></label>")
        var textArea = $(
            "<textarea type='text' id='textAreaId" + textareaCounter + "' class='form-control' placeholder='TextArea " + textareaCounter +
            "' style='width: 70%; height:64%; margin-top: 10px; margin-bottom: 10px'>"
        );

        var newDiv = $("<div>")
            .addClass("form-element")
            .append(label)
            .append(textArea);

        newDiv.click(function () {
            textAreaSetting()
        });

        textArea.on('input', function () {
            label.html("<b>" + $(this).val() + "</b>");
        });


        textareaCounter++
        $('#form-content').append(newDiv)
    });
}

function createSelectField() {
    $.getScript("formBuilder-asset/js/componentSetting/selectFieldSetting.js", function () {

        var select = $("<select>")
            .attr("name", "select" + selectCounter)
            .attr("id", "selectId" + selectCounter)
            .addClass("custom-select")
            .css({
                "width": "70%",
                "marginTop": "10px",
                "marginBottom": "10px",
                "height": "40%"
            });

        var label = $("<label>")
            .addClass("custom-label")
            .css({
                "width": "20%",
                "fontSize": "20px",
                "marginLeft": "36px"
            })
            .html("<b> Select " + selectCounter + " : </b> ");

        var option1 = $("<option>").text("Option 1");
        var option2 = $("<option>").text("Option 2");



        select.append(option1).append(option2);

        var containerDiv = $("<div>")
            .addClass("custom-container")
            .css({
                "background-color": "#f0f0f0",
                // "padding": "10px",
                "width": "100%",
                "height": "11%",
                "marginBottom": "10px",
                "marginTop": "10px"
            })
            .append(label)
            .append(select);

        containerDiv.click(function () {
            selectFieldSetting()
        });


        selectCounter++;
        return $("#form-content").append(containerDiv);
    });

}

function createRadio(optionField) {
    $.getScript("formBuilder-asset/js/componentSetting/radioSetting.js", function () {
        var radioGroup = $("<div>").addClass("radioGroup gap-3");

        var outerDiv = $("<div>").css({
            "width": "100%",
            "height": "10%",
            "marginTop": "10px",
            "display": "flex",
            "align-items": "center",
            "background-color": "#f0f0f0c8"
        }).addClass("outer-div");

        outerDiv.on("click", function () {
            radioSetting();
        });

        for (var i = 1; i <= 3; i++) {
            var innerDiv = $("<div>").addClass("inner-div d-flex align-items-center radiogrouplabel");
            var radio = $("<input>").attr({
                "type": "radio",
                "name": "radioGroup" + radioCounter,
                "id": "radio" + radioCounter + "option" + i,
                "value": " Option " + i
            }).css("margin-right", "5px");

            var label = $("<label>").attr("for", "radio" + radioCounter + "option" + i).html(" Option " + i);

            innerDiv.append(radio).append(label);
            radioGroup.append(innerDiv);
        }

        var labelGropName = $("<div>").addClass('labelGroupName').css({
            "margin-left": "36px",
            "width": "20%",
        })

        var labelGroup = $("<label>").html("<b>Radio Group " + radioCounter + " : </b>").css({
            "font-size": "20px"
        });

        labelGropName.append(labelGroup)

        outerDiv.append(labelGropName).append(radioGroup);
        radioCounter++;
        $("#form-content").append(outerDiv);


    });
}


function createCheckbox(outerDiv) {

    var checkboxGroup = $("<div>").addClass("custom-checkbox-group");


    var labelGroup = document.createElement("label");
    labelGroup.innerHTML = "<b>Check Box " + checkboxCounter + " : </b>";
    labelGroup.style.marginLeft = "36px";
    labelGroup.style.width = "20%";
    labelGroup.style.fontSize = "20px";

    for (var i = 1; i <= 3; i++) {
        var checkboxDiv = $("<div>").addClass("custom-checkbox");

        var checkbox = $("<input>")
            .attr({
                type: "checkbox",
                name: "checkboxGroup" + checkboxCounter,
                value: "checkBox" + i,
            })
            .addClass("custom-checkbox-input");

        var label = $("<label>")
            .css({
                "fontSize": "16px",
                "marginLeft": "5px"
            })
            .html("checkBox" + i,);

        checkboxDiv.append(checkbox).append(label);
        checkboxGroup.append(checkboxDiv);

    }

    outerDiv.append(labelGroup).append(checkboxGroup)
    checkboxCounter++;

    $("#form-content").append(outerDiv);
}

function createFileUpload() {
    var fileUpload = $("<input>")
        .attr({
            type: "file",
            name: "fileUpload" + fileUploadCounter,
        })
        .addClass("custom-file-upload");

    var label = $("<label>")
        .css({
            "width": "20%",
            "fontSize": "20px",
            "marginLeft": "36px"
        })
        .html("<b>File Upload " + fileUploadCounter + " : </b>");

    var containerDiv = $("<div>")
        .addClass("custom-container")
        .css({
            "background-color": "#f0f0f0",
            "padding": "10px",
            "marginBottom": "10px",
            "marginTop": "10px"
        })
        .append(label)
        .append(fileUpload);

    fileUploadCounter++;
    $("#form-content").append(containerDiv);
}

function createButton() {
    var button = $("<button>")
        .attr({
            type: "button",
            name: "button" + buttonCounter,
        })
        .addClass("btn btn-primary")
        .html("Button " + buttonCounter);

    var containerDiv = $("<div>")
        .addClass("custom-container")
        .css({

            "padding": "10px",
            "marginBottom": "10px",
            "marginTop": "10px"
        })
        .append(button);

    buttonCounter++;
    $("#form-content").append(containerDiv);
}

