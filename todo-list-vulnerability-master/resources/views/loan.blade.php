<!DOCTYPE html>
<html>

<head>
    <title>Simulasi Cicilan Pinjaman</title>
</head>

<body>
    <h1>Simulasi Cicilan Pinjaman</h1>

    <form method="POST" action="/loan">
        @csrf
        <label>Jumlah Pinjaman (Rp):</label>
        <input type="number" name="principal" value="{{ old('principal', $principal ?? '') }}" required><br>

        <label>Bunga per Tahun (%):</label>
        <input type="number" step="0.01" name="interest" value="{{ old('interest', $interest ?? '') }}" required><br>

        <label>Lama Pinjaman (tahun):</label>
        <input type="number" name="years" value="{{ old('years', $years ?? '') }}" required><br>

        <button type="submit">Hitung</button>
    </form>

    @if (isset($installment))
        <h2>Hasil Simulasi:</h2>
        <ul>
            <li>Cicilan per Bulan: Rp{{ number_format($installment, 2, ',', '.') }}</li>
            <li>Total Bunga: Rp{{ number_format($totalInterest, 2, ',', '.') }}</li>
            <li>Total Pembayaran: Rp{{ number_format($totalPayment, 2, ',', '.') }}</li>
        </ul>
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
