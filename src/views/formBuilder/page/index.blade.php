@extends('formBuilder::formBuilder.layout.app')
@section('content')
    <div class="d-flex justify-content-around" style=" width:90%; height:90%">
        <div id="messageContainer"></div>
        <div class="components border border-dark" style="width:20%; height:100% ; background-color:#656b6c">
            <div class="d-flex justify-content-center align-items-center"
                style="width:100%; height:6%; background-color:#5b5c59; color:#f0f0f0">
                <h3>Components</h3>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="width:100%; height:94%">
                <div class="" style="width:80%; height:90%">
                    <div class="box">
                        <div class="tags border inputTag">
                            <img src="{{ asset('formBuilder-asset/img/input.png') }}" class="img-fluid"
                                style="width: 50%; height: 50%;" alt="">
                            <p>Input</p>
                        </div>
                        <div class="tags border textArea">
                            <img src="{{ asset('formBuilder-asset/img/textarea.png') }}" class="img-fluid"
                                style="width: 50%; height: 50%;" alt="">
                            <p>TextArea</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="tags border selectfield"> <img src="{{ asset('formBuilder-asset/img/select.png') }}"
                                class="img-fluid" style="width: 50%; height: 50%;" alt="">
                            <p>Select</p>
                        </div>
                        <div class="tags border radiofield"> <img src="{{ asset('formBuilder-asset/img/radio.png') }}"
                                class="img-fluid" style="width: 50%; height: 50%;" alt="">
                            <p>Radio</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="tags border chackBox"> <img src="{{ asset('formBuilder-asset/img/check-box.png') }}"
                                class="img-fluid" style="width: 50%; height: 50%;" alt="">
                            <p>CheckBox</p>
                        </div>
                        <div class="tags border fileUpload"> <img src="{{ asset('formBuilder-asset/img/file.png') }}"
                                class="img-fluid" style="width: 50%; height: 50%;" alt="">
                            <p>FileUpload</p>
                        </div>
                    </div>
                    <div class="box ">
                        <div class="tags border button"> <img src="{{ asset('formBuilder-asset/img/button.png') }}"
                                class="img-fluid" style="width: 50%; height: 50%;" alt="">
                            <p>Button</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="content " style="width:50%; height:100%">
            <form action="" method="post" style="width: 100%; height:100%" id="submitform">

                <div class="d-flex align-items-center justify-content-between"
                    style="width:100%; height:10%; background-color:#5b5c59">
                    <div style="width:65%">
                        <div class="d-flex " style="width: 100%">
                            <label for="formName" style="font-size:25px; width:50%; color:white"><b>Form Name: </b></label>
                            <input type="text" name="formName" class="form-control" id="formName"
                                placeholder="Enter Form Name">
                        </div>
                        <div class="d-flex " style="width: 65%">
                            <label for="url" style="font-size:25px; width:50%; color:white"><b>Form Url: </b></label>
                            <input type="text" name="url" class="form-control" id="url"
                                placeholder="Enter Form url to save your data">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>

                </div>
                <div id="form-content" class="border border-secondary" style="width:100%; height:94%"></div>
            </form>
        </div>

        <div class="componentSetting" style="width: 20%; height:100%">
            <div class="d-flex justify-content-center align-items-center"
                style="width:100%; height:6%; background-color:#5b5c59">
                <h3 style="color: white">ComponentsSetting</h3>
            </div>
            <div id="element-setting" class="border border-secondary d-flex justify-content-center align-items-center"
                style="width:100%; height:94%; overflow: auto;  "></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#submitform").on('submit', function(event) {

                event.preventDefault();

                var formDataString = $(this).serialize();
                var formData = new URLSearchParams(formDataString);


                var formName = formData.get("formName");
                var formUrl = formData.get("url");
                var fullFrom = $('#submitform')
                var formTag = '<form action="/' + formUrl + '" method="post">' +
                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                    fullFrom.html() +
                    '</form>';


                $.ajax({
                    url: "{{ route('save-form') }}",
                    type: "post",
                    data: {
                        'fullform': formTag,
                        'formName': formName
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var messageContainer = $('#messageContainer');

                        if (response.success) {
                            messageContainer.html('<div class="alert alert-success">' + response
                                .success + '</div>');
                        } else {
                            messageContainer.html('<div class="alert alert-danger">' + response
                                .error + '</div>')
                        }

                        setTimeout(function() {
                            messageContainer.html('');
                        }, 3000);

                    },
                    error: function(response) {
                        console.error('Error fetching fullform:', response.responseText);
                    }
                })


            })

        })
    </script>
@endsection
