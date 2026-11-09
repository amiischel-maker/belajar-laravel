<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kategori Usia Bioskop</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px 15px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #1e293b;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 20px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #1d4ed8;
        }

        .hasil {
            margin-top: 25px;
            padding: 15px;
            background: #eff6ff;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #cbd5e1;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #e2e8f0;
        }

        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Aplikasi Kategori Usia Bioskop</h2>

    <form action="/proses" method="POST">
        @csrf

        <label>Nama</label>
        <input
            type="text"
            name="nama"
            placeholder="Masukkan nama"
            value="{{ old('nama') }}"
            required
        >

        @error('nama')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Tanggal Lahir</label>
        <input
            type="date"
            name="tanggalLahir"
            value="{{ old('tanggalLahir') }}"
            max="{{ date('Y-m-d') }}"
            required
        >

        @error('tanggalLahir')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Proses Data</button>
    </form>

    @if(isset($usia))
        <div class="hasil">
            <h3>Hasil Perhitungan</h3>

            <p>Nama: {{ $nama }}</p>
            <p>Tanggal Lahir: {{ $tanggalLahir->format('d-m-Y') }}</p>
            <p>Usia: {{ $usia }} tahun</p>
            <p>Keterangan: {{ $keterangan }}</p>
            <p>Status: {{ $status }}</p>
        </div>
    @endif

    <h3>Ketentuan Kategori Usia</h3>

    <table>
        <thead>
            <tr>
                <th>Usia</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>0-5</td>
                <td>Balita</td>
                <td>Tidak boleh masuk bioskop</td>
            </tr>
            <tr>
                <td>6-12</td>
                <td>Anak-anak</td>
                <td>Tidak boleh masuk bioskop</td>
            </tr>
            <tr>
                <td>13-17</td>
                <td>Remaja</td>
                <td>Tidak boleh masuk bioskop</td>
            </tr>
            <tr>
                <td>18-44</td>
                <td>Dewasa</td>
                <td>Boleh masuk bioskop</td>
            </tr>
            <tr>
                <td>45-60</td>
                <td>Orang Tua</td>
                <td>Boleh masuk bioskop</td>
            </tr>
            <tr>
                <td>&gt;60</td>
                <td>Lansia</td>
                <td>Boleh masuk bioskop</td>
            </tr>
        </tbody>
    </table>

</div>

</body>
</html>