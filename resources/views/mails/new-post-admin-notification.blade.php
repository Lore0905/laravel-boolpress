<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Ciao, ti avviso che è stata appena inviato il form di contatto</h1>
            {{-- name --}}
            <div>
                <h4>Name:</h4> {{$new_lead->name_contacts}}
            </div>
            {{-- lastname --}}
            <div>
               <h4>Lastname: </h4> {{$new_lead->lastname_contacts}}
            </div>
            {{-- email --}}
            <div>
                <h4>Email: </h4>{{$new_lead->email_contact}}
            </div>
            {{-- message --}}
            <div>
                <h4>Message: </h4>{{$new_lead->textarea_contacts}}
            </div>

    </div>
    
</body>
</html>