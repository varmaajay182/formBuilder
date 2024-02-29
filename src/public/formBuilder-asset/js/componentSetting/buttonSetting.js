var buttonLabelName;

$('#form-content').on('click', ' .custom-container', function () {

    buttonLabelName = $(this).find('button:first');
    // console.log(buttonLabelName)
    fileInput = $(this).find('input');

    buttonSetting()
});


function buttonSetting(){
    var outerBox = createOuterBox();

    var buttonlabelInnerbox = createInnerBox();
    appendLabelNameForButton(buttonlabelInnerbox);
    outerBox.append(buttonlabelInnerbox);

    
    $('#element-setting').empty();
    $('#element-setting').append(outerBox);

}

function createOuterBox() {
    return $('<div>').css({
        "width": "95%",
        "height": "94%",
    });
}

function createInnerBox() {
    return $('<div>').css({
        "width": "100%",
        "height": "15%",
        "margin-bottom": "10px",
        "border": "1px solid #ccc",
        "padding": "10px"
    });
}

function appendLabelNameForButton(innerBox){
    var LabelName = $("<label>").css({
        "fontSize": "17px",
        'marginBottom': '5px',
        "display": "block"
    }).html('<b>Button Label Name:</b>');
 
    var labelInput = $('<input>').addClass('form-control').attr('placeholder', 'Change the label').val(buttonLabelName.text())
    labelInput.on('input', function () {
        buttonLabelName.html("<b>" + $(this).val() + "</b>");
    });

    innerBox.append(LabelName).append(labelInput);
}