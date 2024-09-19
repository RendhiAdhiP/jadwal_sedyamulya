<!-- resources/views/tabel.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Sedya Mulya</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        td {
            text-align: left;
            max-width: 150px;
        }

        thead th {
            position: sticky;
            top: 0;
            background: yellow;
            z-index: 1;
        }

        .number-column {
            position: sticky;
            left: 0;
            background: #f0f0f0;
            z-index: 2;
        }

        .combined-data {
            /* white-space: pre-wrap; */
        }

        tbody tr:nth-child(odd) {
            background-color: #dcdddc;
            /* Warna baris ganjil */
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
            /* Warna baris genap */
        }

        .table-container {
            overflow-x: auto;
            width: 100%;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th class="number-column">#</th> <!-- Kolom Penomoran -->
                @foreach ($buses as $bus)
                    <th>{{ $bus }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @for ($row = 1; $row <= 31; $row++)
                <tr>
                    <td class="number-column">{{ $row }}</td> <!-- Nomor Baris -->
                    @foreach ($buses as $bus)
                        <td class="combined-data">
                            @php
                                // Ambil tanggal yang sesuai untuk baris ini dalam format d-m-Y
                                $date = date('d-m-Y', mktime(0, 0, 0, date('m'), $row, date('Y'))); // Gunakan $row untuk tanggal

                                // Temukan jadwal yang sesuai dengan tanggal dan nama bus
                                $jadwal = $jadwals->firstWhere('tanggal', $date);

                                // Cek apakah nama bus sesuai dengan bus yang ada di jadwal
                                if ($jadwal && $jadwal->bus === $bus) {
                                    $data = 'Tanggal : ' . e($jadwal->tanggal) . "\n";
                                    $data .= 'Penjemputan : ' . e($jadwal->start) . "\n";
                                    $data .= 'Tujuan : ' . e($jadwal->finish) . "\n";
                                    $data .=
                                        'Driver : ' . (isset($jadwal->crew1) ? e($jadwal->crew1->nama) : 'N/A') . "\n";
                                    $data .=
                                        'Co Driver : ' .
                                        (isset($jadwal->crew2) ? e($jadwal->crew2->nama) : 'N/A') .
                                        "\n";
                                    $data .= 'Keterangan : ' . e($jadwal->keterangan);
                                    echo nl2br($data); // Untuk memastikan format teks tetap dengan baris baru
                                } else {
                                    echo ''; // Kosongkan sel jika tidak ada data
                                }
                            @endphp
                        </td>
                    @endforeach
                </tr>
            @endfor
        </tbody>
    </table>
</body>

</html>
