<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Move On Coffe & Space</title>
</head>

<body>

    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h2>Reset Password</h2>
            </div>
            <div class="card-body">
                <p>Hi Sir,</p>
                <p>We received a request to change your Move On Coffe & Space account password. To reset your password,
                    click the "Reset
                    Password" button below within 24 hour.</p>
                <a href="{{ route('reset.password.get', $token) }}" class="btn btn-primary mb-2">RESET PASSWORD</a>
                <p>If the button has expired, you can request it again at the Login page.</p>
            </div>
        </div>
    </div>
</body>

</html>
