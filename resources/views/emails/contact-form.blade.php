<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Anfrage {{ $data['form-name'] }}</title>
    <style>
        .selected-value {
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <h1 style="color: #FE3312;">Lead-Anfrage</h1>
    <h2>Allgemeine Daten</h2>
    <p><b>Name:</b> {{ $data['form-name'] }}</p>
    <p><b>E-Mail:</b> {{ $data['form-mail'] }}</p>
    <p><b>Unternehmen:</b> {{ $data['form-company'] }}</p>
    <p><b>Telefon:</b> {{ $data['form-tel'] }}</p>
    <p><b>Beschreibung:</b> {{ $data['form-comment'] }}</p>

    <h2>Budget</h2>
    <ul>
        @foreach ($data['items'] as $item)
          <li>
              {{ $item['label'] }}: 
              <span class="{{ $item['selected']['name'] === 'Auswahl' ? 'selected-value' : '' }}">
                  {{ $item['selected']['name'] }}
              </span>
          </li>
        @endforeach
    </ul>

    <h2>Budget</h2>
    <ul>
        @foreach ($data['items2'] as $item)
          <li>
              {{ $item['label'] }}: 
              <span class="{{ $item['selected']['name'] === 'Auswahl' ? 'selected-value' : '' }}">
                  {{ $item['selected']['name'] }}
              </span>
          </li>
        @endforeach
    </ul>

    <h2>Leistungen</h2>
    <ul>
      @foreach ($data['services'][0]['selected'] as $selectedService)
          <li>
              {{ $selectedService }}
          </li>
      @endforeach
    </ul>
</body>
</html>