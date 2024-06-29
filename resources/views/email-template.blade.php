<!DOCTYPE html>
<html>
<head>
    <title >Email Template</title>
</head>

<body style="background: #0179a5; diplay: flex; justify-content:center; align-items:center">
    <div style="background: #02aeec; padding: 20px; border-radius: 10px; height: 80vh">
        <h2 style="color: white; display:flex; justify-content: center; margin-top: 0px">Docteur24.com</h2>
        <p><label style="font-weight: bold; color: white" for="">Nom: </label><span style="color: #2e2e25">{{ $name }}</span></p>
        <p><label style="font-weight: bold; color: white" for="">Email: </label><span style="color: #2e2e25">{{ $email }}</span></p>
        <p><label style="font-weight: bold; color: white" for="">Telephone: </label><span style="color: #2e2e25">{{ $phone }}</span></p>
        <p><label style="font-weight: bold; color: white" for="">Services: </label><span style="color: #2e2e25">{{ $services }}</span></p>
        <p><label style="font-weight: bold; color: white" for="">Message : </label><span style="color: #2e2e25">{{ $subject }}</span></p>
    </div>
</body>
</html>
