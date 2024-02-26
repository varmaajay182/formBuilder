var label;
var currentPlaceholderInput;
var currentIdName;

function textAreaSetting() {
    var outerBox = createOuterBox();

    var labelInnerBox = createInnerBox();
    appendLabelName(labelInnerBox);
    outerBox.append(labelInnerBox);

    var placeholderInnerBox = createInnerBox();
    appendPlaceHolder(placeholderInnerBox);
    outerBox.append(placeholderInnerBox);

    var textAreaFieldIdInnerBox = createInnerBox();
    appendIdName(textAreaFieldIdInnerBox)
    outerBox.append(textAreaFieldIdInnerBox)

    $('#element-setting').empty();
    $('#element-setting').append(outerBox);
}

function createOuterBox() {
    return $('<div>').css({
        "width": "90%",
        "height": "94%",
        // "backgroundColor": "red"
    });
}

function createInnerBox() {
    return $('<div>').css({
        "width": "100%",
        "height": "12%"
    });
}

function appendLabelName(innerBox) {
    var LabelName = $("<label>").css({
        "fontSize": "17px",
        'marginBottom': '5px'
    }).html('<b>Label:</b>');

    var labelInput = $('<input>').addClass('form-control').attr('placeholder', 'Change the label')
    labelInput.on('input', function () {
        label.html("<b>" + $(this).val() + "</b>");
    });
    return innerBox.append(LabelName).append(labelInput);
}

function appendPlaceHolder(innerBox) {
    var placeHolderLabel = $("<label>").css({
        "fontSize": "17px",
        'marginBottom': '5px'
    }).html('<b>Placeholder:</b>');

    var placeholderInput = $('<input>').addClass('form-control').attr('placeholder', 'Change placeholder content')

    placeholderInput.on('input', function () {
        var newPlaceholder = $(this).val();
        // console.log(currentPlaceholderInput.attr('placeholder'))
        updatePlaceholder(currentPlaceholderInput, newPlaceholder);
    });

    return innerBox.append(placeHolderLabel).append(placeholderInput);
}

function appendIdName(innerBox){
    var IdNameLabel = $("<label>").css({
        "fontSize": "17px",
        'marginBottom': '5px'
    }).html('<b>Id Name:</b>');

    var IdNameInput  = $('<input>').addClass('form-control').attr('placeholder', 'Change the id')

    IdNameInput.on('input', function () {
        var newIdName = $(this).val();
        updateIdName(currentIdName,newIdName)
    });

    return innerBox.append(IdNameLabel).append(IdNameInput);
}

function updatePlaceholder(currentPlaceholderInput, newPlaceholder) {
     currentPlaceholderInput.attr('placeholder', newPlaceholder);
}

function updateIdName(currentIdName,newIdName){
    currentIdName.attr('id',newIdName)
}

$('#form-content').on('click', '.form-element', function () {
    label = $(this).find('label');
    currentPlaceholderInput = $(this).find('textarea');
    currentIdName= $(this).find('textarea');
});
