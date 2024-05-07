<!DOCTYPE html>
<html>
<head>
    <title>Contactformulier ingevuld door {{ $name ?: 'Onbekend'}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #35ABE2;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: white;
            text-align: center;
        }
        table {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-collapse: collapse;
        }
        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        table tr:first-child {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
  <h1>Contactformulier Tienskip.nl</h1>
  <table>
    <tr>
      <td>Naam</td>
      <td>{{ $name ?: 'Niets ingevuld' }}</td>
    </tr>
    <tr>
      <td>Bedrijfsnaam</td>
      <td>{{ $company ?: 'Niets ingevuld' }}</td>
    </tr>
    <tr>
      <td>Telefoon</td>
      <td>{{ $phone ?: 'Niets ingevuld' }}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>{{ $email ?: 'Niets ingevuld' }}</td>
    </tr>
    <tr>
      <td>Bericht</td>
      <td>{{ $body ?: 'Niets ingevuld' }}</td>
    </tr>
  </table>
</body>
</html>
