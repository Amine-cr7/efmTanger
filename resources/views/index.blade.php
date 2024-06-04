<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-Vous Table</title>
    <style>
        body{
            padding: 20px
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .button {
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        . {
            background-color: #e74c3c;
        }
        .button-modifier {
            background-color: #3498db;
        }
    </style>
</head>
<body>
    <a href="/rendez-vous/create">create</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom De Patient</th>
                <th>Nom Et Prenom de Medecin</th>
                <th>Nom De Specialite</th>
                <th>date et Heure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rendez_vous as $rendez)
                <tr>
                    <td>{{ $rendez->patient_id }}</td>
                    <td>{{ $rendez->patient->nom }}</td>
                    <td>{{ $rendez->medecin->nom }} {{ $rendez->medecin->prenom }}</td>
                    <td>{{ $rendez->medecin->specialite->nom }}</td>
                    <td>{{ $rendez->date }} {{ $rendez->heure }}</td>
                    <td>
                        <form action="/rendez-vous/{{ $rendez->id }}" method="post">
                            @method('DELETE')
                            <button class="button-supprimer" type="submit">Supprimer</button>
                            @csrf
                        </form>
                        <a href="">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
