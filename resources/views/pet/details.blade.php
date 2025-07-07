<h2>Dane zwierzaka</h2>

@if(isset($pet))
    <ul>
        <li><strong>ID:</strong> {{ $pet['id'] }}</li>
        <li><strong>Imię:</strong> {{ $pet['name'] }}</li>
        <li><strong>Status:</strong> {{ $pet['status'] }}</li>
        <li><strong>Zdjęcia:</strong> {{ implode(', ', $pet['photoUrls'] ?? []) }}</li>
    </ul>
    <a href="/">⟵ Wróć</a>
@else
    <p>Nie znaleziono danych.</p>
@endif

@if(isset($pet['photoUrls']) && count($pet['photoUrls']) > 0 && !empty($pet['photoUrls'][0]))
    <img src="{{ $pet['photoUrls'][0] }}" alt="Zdjęcie zwierzaka" width="200">
@else
    <p><em>Brak zdjęcia</em></p>
@endif