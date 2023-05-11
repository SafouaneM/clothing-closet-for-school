<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleding kast app</title>
</head>
<body>
<h1 id="title">Mijn kledingkast</h1>
<p>Welkom bij de kledingkast app, navigeer met de tab toetsen naar de volgende invul velden. </p>
<form action="{{ route('closet.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Naam hier opschrijven:</label>
    <input type="text" id="name" name="name" aria-labelledby="name">
    <label for="category">Categorie hier opscrhijven:</label>
    <select name="category" id="category" aria-labelledby="category">
        <option value="shirts">Shirts en Hoodies</option>
        <option value="broeken">Broeken</option>
        <option value="onderbroeken">Onderbroeken</option>
        <option value="jurken">Jurken</option>
        <option value="sokken">Sokken</option>
    </select>
    <br>
    <label for="image">Foto uploaden:</label>
    <input type="file" name="image" id="image" aria-labelledby="image">
    <br>
    <button type="submit">Voeg kledingstuk toe</button>
</form>

<hr>

<h2 id="kledingstukken">Jouw kledingstukken:</h2>
<ul>
    @foreach ($clothingItems as $item)
        <li tabindex="0" aria-labelledby="kledingstukken">De categorie is {{ ucfirst($item->category) }}</li>
        <li tabindex="0" aria-labelledby="kledingstukken">De naam van dit item is {{ ucfirst($item->name) }}</li>
        <li tabindex="0" aria-labelledby="kledingstukken">Dit is de foto die we kunnen laten zien aan onze vrienden</li>
        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" style="border: 2px solid black; max-width: 300px; height: auto;">
    @endforeach
</ul>
</body>
</html>
