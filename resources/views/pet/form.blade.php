<h1>REST API - PetStore</h1>

<h2>Dodaj informacje o zwierzęciu</h2>
<form method="POST" action="/pet/create" >
    @csrf
    <input type="number" name="id" placeholder="ID" required>
    <input name="name" placeholder="Imię" required>
    <input name="photo_url" placeholder="Adres URL zdjęcia">
    <select name="status">
        <option value="available">available</option>
        <option value="pending">pending</option>
        <option value="sold">sold</option>
    </select>
    <button type="submit">Dodaj</button>
</form>

<h2>Pobierz informacje o zwierzęciu</h2>
<form method="GET" action="/pet/show">
    <input type="number" name="id" placeholder="ID" required>
    <button type="submit">Pobierz</button>
</form>

<h2>Aktualizuj informacje o zwierzęciu</h2>
<form method="POST" action="/pet/update">
    @csrf
    <input type="number" name="id" placeholder="ID" required>
    <input name="name" placeholder="Nowe imię">
    <input name="photo_url" placeholder="Nowy URL zdjęcia">
    <select name="status">
        <option value="available">available</option>
        <option value="pending">pending</option>
        <option value="sold">sold</option>
    </select>
    <button type="submit">Aktualizuj</button>
</form>

<h2>Usuń informacje o zwierzęciu</h2>
<form method="POST" action="/pet/delete">
    @csrf
    <input name="id" placeholder="ID" required>
    <button type="submit">Usuń</button>
</form>

@if(session('response'))
    <pre>{{ print_r(session('response'), true) }}</pre>
@endif

@if(session('deleted'))
    <p>{{ session('deleted') }}</p>
@endif

@if($errors->any())
    <ul>
        @foreach($errors->all() as $err)
            <li style="color: rgb(121, 4, 4);">{{ $err }}</li>
        @endforeach
    </ul>
@endif

