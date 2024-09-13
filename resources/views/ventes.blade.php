<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>Сату туралы есеп</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Сату туралы есеп : {{$month}}</h1>
    <table>
        <thead>
            <tr>

               
                <th> сатып алу күні</th>
                    <th>Клиент</th>
                <th>Өнім</th>
                <th>Мекенжайы</th>
                <th>Жалпы баға</th>
                <th>Саны</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventes as $vente)
                <tr>
                    <td>{{ $vente->created_at }}</td>

                    <td>{{ $vente->client }}</td>
                    <td>{{ $vente->product }}</td>
                    <td>{{ $vente->adresse }}</td>
                    <td>{{ number_format($vente->totalprix, 2) }} ₸</td>
                    <td>{{ $vente->qte }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="total">жалпы сома :</td>
                <td colspan="2" class="total">{{ number_format($totalprix, 2) }} ₸</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
