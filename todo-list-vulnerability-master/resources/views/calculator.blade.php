<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator</title>
</head>

<body>
    <h1>Kalkulator Sederhana</h1>

    <form method="POST" action="/calculator">
        @csrf
        <input type="number" name="a" placeholder="Angka pertama" value="{{ old('a', $a ?? '') }}" required>
        <input type="number" name="b" placeholder="Angka kedua" value="{{ old('b', $b ?? '') }}" required>

        <select name="operation">
            <option value="add" {{ old('operation', $operation ?? '') == 'add' ? 'selected' : '' }}>Tambah</option>
            <option value="subtract" {{ old('operation', $operation ?? '') == 'subtract' ? 'selected' : '' }}>Kurang
            </option>
        </select>

        <button type="submit">Hitung</button>
    </form>

    @if (isset($result))
        <h2>Hasil: {{ $result }}</h2>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif
</body>

</html>
