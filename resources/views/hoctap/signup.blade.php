<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login page</title>
    <link rel="stylesheet" href="{{ asset('/css/styles.css')}}">
</head>

<body>

    <div class="container-fluid mt-3 text-center">
        <h3>Register info</h3>
        <p>Vui long nhap thong tin dang ky</p>
    </div>
    <section>
        <form action="{{ url('process') }}" method="post">
            @csrf
            <div class="container">
                <label for="fullname"><b>Full Name</b></label>
                <input type="text" placeholder="Enter Full Name" name="fullname" required>

                <label for="phonenumber"><b>Username</b></label>
                <input type="text" placeholder="Enter phonenumber" name="phonenumber" required>

                <label for="dateofbirth"><b>Date of birth</b></label>
                <input type="date" name="dateofbirth" required><br>

                <fieldset>
                    <legend>Gender</legend>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender1">
                        <label class="form-check-label" for="gender1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender1">
                        <label class="form-check-label" for="gender1">
                            Female
                        </label>
                    </div>
                </fieldset>

                <button type="submit">Register</button>
            </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>