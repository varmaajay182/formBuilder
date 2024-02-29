<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Form Listing</title>
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-4">Generated Form List with SortCode</h2>
            <a href="/form-builder" class="btn btn-primary" style="height: 0%">Back</a>
        </div>
        @if (isset($successMessage))
            <div class="alert alert-success">
                {{ $successMessage }}
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var successMessage = document.getElementById('successMessage');
                    
                    if (successMessage) {
                        setTimeout(function() {
                            successMessage.style.display = 'none'; 
                        }, 3000); 
                    }
                });
            </script>
        @endif

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Form Name</th>
                    <th>Button Url</th>
                    <th>ShortCode</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $i => $form)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $form->formName }}</td>
                        <td>{{ $form->url }}</td>
                        <td>{{ $form->short_code }}</td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
