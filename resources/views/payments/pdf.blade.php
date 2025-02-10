<!DOCTYPE html>
<html>
<head>
    <title>Détails du Paiement</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>Détails du Paiement</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $payment->id }}</td>
        </tr>
        <tr>
            <th>Référence</th>
            <td>{{ $payment->reference }}</td>
        </tr>
        <tr>
            <th>Employé</th>
            <td>{{ $payment->employer->nom ?? 'N/A' }} {{ $payment->employer->prenom ?? '' }}</td>
        </tr>
        <tr>
            <th>Montant</th>
            <td>{{ $payment->amount }}</td>
        </tr>
        <tr>
            <th>Date de lancement</th>
            <td>{{ $payment->launch_date }}</td>
        </tr>
        <tr>
            <th>Statut</th>
            <td>{{ $payment->status }}</td>
        </tr>
        <tr>
            <th>Mois</th>
            <td>{{ $payment->month }}</td>
        </tr>
        <tr>
            <th>Année</th>
            <td>{{ $payment->year }}</td>
        </tr>
    </table>
</body>
</html>