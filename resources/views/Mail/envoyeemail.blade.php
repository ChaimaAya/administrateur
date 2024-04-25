<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations de connexion</title>
</head>
<body>
    <div style="background-color: #f4f4f4; padding: 20px;">
        <h2 style="color: #333;">Bonjour,</h2>
        <p style="color: #333;">Voici vos informations de connexion :</p>
        <ul>
            <li><strong>Identifiant (Email):</strong> {{ $email }}</li>
            <li><strong>Mot de passe:</strong> {{ $motDePasse }}</li>
        </ul>
        <p style="color: #333;">Veuillez conserver ces informations en lieu sûr. Si vous avez des questions ou des problèmes, n'hésitez pas à nous contacter.</p>
        <p style="color: #333;">Cordialement,</p>
        <p style="color: #333;">Votre équipe {{ config('app.name') }}</p>
    </div>
</body>
</html>
