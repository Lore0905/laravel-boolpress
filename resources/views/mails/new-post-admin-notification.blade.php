<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacs</title>
</head>
<body>
    <div>
        <h1>Ciao, ti avviso che {{$new_lead->name_contacts}} {{$new_lead->lastname_contacts}} è stata appena inviato il form di contatto</h1>

        {{-- name --}}
        <div>
            <h4>Name: {{$new_lead->name_contacts}}</h4> 
        </div>
        {{-- lastname --}}
        <div>
            <h4>Lastname: {{$new_lead->lastname_contacts}}</h4> 
        </div>
        {{-- email --}}
        <div>
            <h4>Email: {{$new_lead->email_contact}}</h4>
        </div>
        {{-- message --}}
        <div>
            <h4>Message: {{$new_lead->textarea_contacts}}</h4>
        </div>
        
    </div>
    
</body>
</html>