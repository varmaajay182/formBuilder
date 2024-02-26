var labelOption;
var currentIdName;
var currentRadioNameAttribute;
var labelGroupName;
var optionInput



$('#form-content').on('click', ' .outer-div', function () {
    labelGroupName = $(this).find('.labelGroupName').find('label');
    currentRadioNameAttribute = $(this).find('input[type="radio"]');

    labelOption = $(this).find('.radioGroup label');
    optionInput = $(this).find('.radioGroup input');

    radioSetting()

});

function radioSetting() {
    var outerBox = createOuterBox();

    var labelInnerBox = createInnerBox();
    appendLabelName(labelInnerBox);
    outerBox.append(labelInnerBox);



    var nameAttributeInnerBox = createInnerBox();
    appendNameAttribute(nameAttributeInnerBox);
    outerBox.append(nameAttributeInnerBox);


    var radioOptionInnerBox = createInnerBoxForOption();
    appendRadioOption(radioOptionInnerBox);
    outerBox.append(radioOptionInnerBox);


    $('#element-setting').empty();
    $('#element-setting').append(outerBox);
}

function createOuterBox() {
    return $('<div>').css({
        "width": "90%",
        "height": "94%",
        // "overflow": "auto" 
        // Add this line to enable scrolling
        // "backgroundColor": "red"
    });
}

function createInnerBox() {
    return $('<div>').css({
        "width": "100%",
        "height": "17%",
        "margin-bottom": "10px",
        "border": "1px solid #ccc",
        "padding": "10px"
    });
}

function createInnerBoxForOption() {
    return $('<div>').css({
        "width": "100%",
        "height": "auto",
        "margin-bottom": "10px",
        "border": "1px solid #ccc",
        "padding": "10px"
    });
}

function appendLabelName(innerBox) {
    var LabelName = $("<label>").css({
        "fontSize": "17px",
        'marginBottom': '5px',
        "display": "block"
    }).html('<b>Radio Group Label:</b>');
    // labelGropName = $('.labelGroupName').find('label'); 
    var labelInput = $('<input>').addClass('form-control').attr('placeholder', 'Change the label')
    labelInput.on('input', function () {
        labelGroupName.html("<b>" + $(this).val() + "</b>");
    });

    innerBox.append(LabelName).append(labelInput);
}

function appendNameAttribute(innerBox) {
    var radioNameAttributeLabel = $("<label>").css({
        "fontSize": "17px",
        'marginBottom': '5px',
        "display": "block"
    }).html('<b>Name:</b>');

    // currentRadioNameAttribute = $('.outer-div').find('input');

    var radioNameAttributeInput = $('<input>').addClass('form-control').attr('placeholder', 'Change the nameAttribute');


    radioNameAttributeInput.on('input', function () {
        var nameAttribute = $(this).val();

        updateNameAttribute(currentRadioNameAttribute, nameAttribute)
    });


    innerBox.append(radioNameAttributeLabel).append(radioNameAttributeInput);
}

function appendRadioOption(innerBox) {
    var OptionLabel = $("<label>").css({
        "fontSize": "17px",

    }).html('<b>Option Setting:</b>');

    var optionSettingDiv = $('<div>').css({
        'marginBottom': '5px',
        "display": "flex",
        "justifyContent": "space-between"
    })

    var table = $("<table>").addClass("table table-bordered");
    var thead = $("<thead>").appendTo(table);
    var tbody = $("<tbody>").appendTo(table);

    var headerRow = $("<tr>").appendTo(thead);
    $("<th>").text("Change Option Label").appendTo(headerRow);
    $("<th>").text("Value").appendTo(headerRow);
    $("<th>").text("Id Name").appendTo(headerRow);

    for (var i = 0; i < labelOption.length; i++) {
        appendOptionRow(tbody, i);
    }
   
    var addButton = $("<button>").addClass("btn btn-primary").css({
        "height": "40px"
    }).text("Add Option").on('click', function () {
        addNewOption();
    });

    optionSettingDiv.append(OptionLabel, addButton)

    innerBox.append(optionSettingDiv, table);
}

function appendOptionRow(tbody, i) {
    var row = $("<tr>").appendTo(tbody);

    var inputField = $("<input>").addClass("form-control").attr("placeholder", "New Name").val(labelOption.eq(i).text());
    inputField.on('input', (function (index) {
        return function () {
            var newValue = $(this).val();
            labelOption.eq(index).text(" " + newValue);
        };
    })(i));
    $("<td>").append(inputField).appendTo(row);

    var valueField = $("<input>").addClass("form-control newValue").attr("placeholder", "New Value").attr('value', optionInput.eq(i).attr('value')).val(optionInput.eq(i).attr('value'));
    valueField.on('input', (function (index) {
        return function () {
            optionInput.eq(index).attr('value', $(this).val().toLowerCase())

        };
    })(i));
    $("<td>").append(valueField).appendTo(row);

    var IdinputField = $("<input>").addClass("form-control").attr("placeholder", "New Name").attr('id', optionInput.eq(i).attr('id')).val(optionInput.eq(i).attr('id'));
    IdinputField.on('input', (function (index) {
        return function () {
            var newValue = $(this).val();
            optionInput.eq(index).attr('id', newValue);
        }
    })(i));
    $("<td>").append(IdinputField).appendTo(row);
}


function addNewOption(tbody) {
    var newOption = 4
    var innerDivNew = $("<div>").addClass("inner-div d-flex align-items-center radiogrouplabel");
    var radio1 = $("<input>").attr({
        "type": "radio",
        "name": "radioGroup" + newOption,
        "id": "radiooption" + newOption,
        "value": " Option "
    }).css("margin-right", "5px");

    var labels = $("<label>").attr("for", "radio" + newOption).html(" Option " + newOption);

    innerDivNew.append(radio1).append(labels);
    $('.radioGroup').append(innerDivNew);

    appendOptionRow(tbody, newOption - 1);

    newOption++
  
}
function updateIdName(currentIdName, newIdName) {
    currentIdName.attr('id', newIdName);
}

function updateNameAttribute(currentRadioNameAttribute, nameAttribute) {
    currentRadioNameAttribute.attr('name', nameAttribute)
}