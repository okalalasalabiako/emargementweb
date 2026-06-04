<!DOCTYPE html>
<html>
<head>
    <title>2FA</title>
</head>
<body>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('2fa.verify') }}">
    @csrf

    <label>Code reçu par email :</label>
    <input type="text" name="code" required>

    <button type="submit">Valider</button>
</form>

</body>
</html>