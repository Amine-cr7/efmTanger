<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Rendez-Vous</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Create Rendez-Vous</h2>
        <form action="{{ route('enregistrer') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="patient_id">Patient</label>
                <select name="patient_id" id="patient_id" >
                    <option value="" disabled selected>Select a patient</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="medecin_id">Médecin</label>
                <select name="medecin_id" id="medecin_id" >
                    <option value="" disabled selected>Select a médecin</option>
                    @foreach($medecins as $medecin)
                        <option value="{{ $medecin->id }}">{{ $medecin->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" >
                <span>{{ $errors->first('date') }}</span>
            </div>

            <div class="form-group">
                <label for="heure">Heure</label>
                <input type="time" name="heure" id="heure" >
                <span>{{ $errors->first('heure') }}</span>
            </div>
            <button type="submit">Valider</button>
        </form>
    </div>

</body>
</html>
