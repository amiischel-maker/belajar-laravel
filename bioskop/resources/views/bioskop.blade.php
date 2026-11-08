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
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
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
            border-radius: 7px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #1d4ed8;
        }

        .hasil {
            margin-top: 25px;
            padding: 18px;
            background: #eff6ff;
            border-radius: 8px;
        }

        .error {
            color: red;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #cbd5e1;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #e2e8f0;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Aplikasi Kategori Usia Bioskop</h2>

    <form action="{{ route('bioskop.proses') }}" method="POST">
        @csrf

        <label>Nama</label>
        <input
            type="text"
            name="nama"
            placeholder="Masukkan nama"
            value="{{ old('nama') }}"
            required
        >

        <label>Tanggal Lahir</label>
        <input
            type="date"
            name="tanggal_lahir"
            value="{{ old('tanggal_lahir') }}"
            max="{{ date('Y-m-d') }}"
            required
        >

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <button type="submit">Proses Data</button>
    </form>

    @isset($usia)

    <div class="hasil">
        <h3>Hasil Output</h3>

        <p><strong>Nama:</strong> {{ $nama }}</p>

        <p>
            <strong>Tanggal Lahir:</strong>
            {{ $tanggalLahir->format('d-m-Y') }}
        </p>

        <p><strong>Usia:</strong> {{ $usia }} Tahun</p>

        <p><strong>Keterangan:</strong> {{ $keterangan }}</p>

        <p><strong>Status:</strong> {{ $status }}</p>
    </div>

    @endisset

    <h3>Ketentuan Kategori Usia</h3>

    <table>
        <tr>
            <th>Usia</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>

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
            <td>>60</td>
            <td>Lansia</td>
            <td>Boleh masuk bioskop</td>
        </tr>
    </table>

</div>

</body>
</html>