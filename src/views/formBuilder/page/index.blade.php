@extends('formBuilder::formBuilder.layout.app')
@section('content')
    <div class="container">
        <div class="row mt-2 w-100">
            <span class="col-12 text-center w-100 d-flex align-items-center justify-content-center mx-auto">

                <h3 class="ml-3">📑Drag&Drop Form Builder</h3>
            </span>
        </div>
    </div>
    <div id="messageContainer"></div>

    <div class="d-flex justify-content-around" style=" width:100%; height:94%">
        <div class="components border border-dark" style="width:15%; height:99% ; ">
            <div class="d-flex justify-content-center align-items-center"
                style="width:100%; height:6%; background-color:#3c4211; color:#f0f0f0">
                <h3>Components</h3>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; height:94%;">
                <div class="" style="width:80%; height:90%">
                    <div class="box">
                        <div class="tags border border-dark inputTag d-flex justify-content-center align-items-center"
                            style="width: 45%; height:60%; cursor: pointer">
                            <div class="w-75 h-75">
                                <img src="{{ asset('formBuilder-asset/img/input.png') }}" class="img-fluid"
                                    style="width: 50%; height: 50%;" alt="">
                                <p>Input</p>
                            </div>
                        </div>
                        <div class="tags border border-dark textArea d-flex justify-content-center align-items-center"
                            style="width: 45%;  height:60%; cursor: pointer">
                            <div class="w-75 h-75">
                                <img src="{{ asset('formBuilder-asset/img/textarea.png') }}" class="img-fluid"
                                    style="width: 50%; height: 50%;" alt="">
                                <p>TextArea</p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="tags border border-dark selectfield d-flex justify-content-center align-items-center"
                            style="width: 45%;  height:60%; cursor: pointer">
                            <div class="w-75 h-75">
                                <img src="{{ asset('formBuilder-asset/img/select.png') }}" class="img-fluid"
                                    style="width: 50%; height: 50%;" alt="">
                                <p>Select</p>
                            </div>
                        </div>
                        <div class="tags border border-dark radiofield d-flex justify-content-center align-items-center"
                            style="width: 45%;  height:60%; cursor: pointer">
                            <div class="w-75 h-75"><img src="{{ asset('formBuilder-asset/img/radio.png') }}"
                                    class="img-fluid" style="width: 50%; height: 50%;" alt="">
                                <p>Radio</p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="tags border border-dark chackBox d-flex justify-content-center align-items-center"
                            style="width: 45%;  height:60%; cursor: pointer">
                            <div class="w-75 h-75"> <img src="{{ asset('formBuilder-asset/img/check-box.png') }}"
                                    class="img-fluid" style="width: 50%; height: 50%;" alt="">
                                <p>CheckBox</p>
                            </div>
                        </div>
                        <div class="tags border border-dark fileUpload d-flex justify-content-center align-items-center"
                            style="width: 45%;  height:60%; cursor: pointer">
                            <div class="w-75 h-75"> <img src="{{ asset('formBuilder-asset/img/file.png') }}"
                                    class="img-fluid" style="width: 50%; height: 50%;" alt="">
                                <p>FileUpload</p>
                            </div>
                        </div>
                    </div>
                    <div class="box ">
                        <div class="tags border border-dark button d-flex justify-content-center align-items-center"
                            style="width: 45%;  height:60%; cursor: pointer">
                            <div class="w-75 h-75"> <img src="{{ asset('formBuilder-asset/img/button.png') }}"
                                    class="img-fluid" style="width: 50%; height: 50%;" alt="">
                                <p>Button</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="content " style="width:50%; height:100%">
            <form action="" method="post" style="width: 100%; height:100%" id="submitform">
                @csrf

                <div class="d-flex align-items-center justify-content-between"
                    style="width:100%; height:6%; background-color:#3c4211">
                    <label for="formName" style="font-size:18px; width:20%; color:white; margin-right: 1em;"><b>Form
                            Name:</b></label>
                    <input type="text" name="formName" class="form-control" id="formName" placeholder="Enter Form Name"
                        style="width: 30%; margin-right: 1em;">

                    <label for="url" style="font-size:18px; width:15%; color:white; margin-right: 1em;"><b>Form
                            Url:</b></label>
                    <input type="text" name="url" class="form-control" id="url"
                        placeholder="Enter Form url to save your data" style="width: 30%; margin-right: 1em;">

                    <label for="formId" style="font-size:18px; width:15%; color:white; margin-right: 1em;"><b>Form
                            Id:</b></label>
                    <input type="text" name="formId" class="form-control" id="formId" placeholder="Enter Form ID"
                        style="width: 30%; margin-right: 1em;">

                    <button class="btn btn-primary" type="submit">Save</button>
                </div>

                <div id="form-content" class="border border-secondary" style="width:100%; height:93%; overflow: auto;">
                </div>
            </form>
        </div>

        <div class="componentSetting" style="width: 33%; height:100%">
            <div class="d-flex justify-content-center align-items-center"
                style="width:100%; height:6%; background-color:#3c4211">
                <h3 style="color: white">ComponentsSetting</h3>
            </div>
            <div id="element-setting" class="border border-secondary d-flex justify-content-center align-items-center"
                style="width:100%; height:93%; overflow: auto;  "></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#submitform").on('submit', function(event) {

                event.preventDefault();

                var targetBackgroundColor = 'rgb(150, 227, 178)';
                $('#form-content').find('div').each(function() {

                    if ($(this).css('background-color') === targetBackgroundColor) {
                        $(this).css('background-color', '');
                        $(this).css('border', '')
                    }
                });

                var formDataString = $(this).serialize();
                var formData = new URLSearchParams(formDataString);
                var formName = formData.get("formName");
                // console.log(formName)
                var formUrl = formData.get("url");
                var formId = formData.get("formId");

                if (formName == 'register' || formName == 'login' || formName == 'Register' || formName ==
                    'Login') {
// console.log('if')
                    var formContent = $('#form-content').clone().children().removeAttr("style").end()
                        .html();
                    var modifiedHTML = formContent;

                } else {
                    // console.log('else')
                    var formContent = $('#form-content').clone().removeAttr('style');
                    formContent.find('*').removeAttr('style');
                    formContent.find('.inputbox button.btn.btn-link.cancel').remove();
                    var modifiedHTML = formContent.prop('outerHTML');
                    // console.log(modifiedHTML)
                }

                // console.log(formContent)

                $.ajax({
                    url: "{{ route('form-design') }}",
                    type: "post",
                    data: {
                        'formName': formName,
                        'formUrl': formUrl,
                        'formId': formId,
                        'formContent': modifiedHTML
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        var formTag = response.view;
                        // var formHtml = $(formTag).html();

                        $.ajax({
                            url: "{{ route('save-form') }}",
                            type: "post",
                            data: {
                                'formHtml': formTag,
                                'formName': formName,
                                'formUrl': formUrl,
                                'formId': formId
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            success: function(response) {
                                // Handle success
                                var messageContainer = $('#messageContainer');
                                if (response.success) {
                                    messageContainer.html(
                                        '<div class="alert alert-success">' +
                                        response.success + '</div>');
                                } else {
                                    messageContainer.html(
                                        '<div class="alert alert-danger">' +
                                        response.error + '</div>');
                                }
                                setTimeout(function() {
                                    messageContainer.html('');
                                }, 3000);
                            },
                            error: function(response) {
                                // Handle error
                                var messageContainer = $('#messageContainer');
                                messageContainer.html(
                                    '<div class="alert alert-danger">' +
                                    response.responseText + '</div>');
                                setTimeout(function() {
                                    messageContainer.html('');
                                }, 3000);
                            }
                        });
                    },
                    error: function(response) {
                        // Handle error
                        var messageContainer = $('#messageContainer');
                        messageContainer.html('<div class="alert alert-danger">' + response
                            .responseText + '</div>');
                        // setTimeout(function() {
                        //     messageContainer.html('');
                        // }, 3000);
                    }
                });
            })
        });
    </script>
@endsection
