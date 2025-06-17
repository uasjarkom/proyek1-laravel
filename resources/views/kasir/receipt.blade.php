<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 300px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .header, .footer {
            text-align: center;
        }
        .footer {
            font-size: 12px;
            margin-top: 20px;
        }
        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .total {
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            text-align: center;
            display: inline-block;
            font-size: 14px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn:hover {
            background-color: #45a049;
        }
        @media print {
            .btn, .footer {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h2>Berliana FC dan ATK</h2> <!-- Nama Toko -->
        <h4>Struk Pembelian</h4>
        <p>NO.Struk : {{ $transaksi->invoice_number }}</p>
        <p>{{ date('d-m-Y H:i:s') }}</p>
    </div>

    <!-- Tabel Produk -->
    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $id => $item)
                <tr>
                    <td>{{ $item['nama_produk'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total dan Pembayaran -->
    <div class="total">
        <p>Total: Rp{{ number_format($transaksi->total, 0, ',', '.') }}</p>
        <p>Pembayaran: Rp{{ number_format($transaksi->payment, 0, ',', '.') }}</p>
        <p>Kembalian: Rp{{ number_format($transaksi->change, 0, ',', '.') }}</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Terima Kasih telah berbelanja di toko kami!</p>
        <p>Jangan lupa datang lagi!</p>
    </div>

    <!-- Button Print dan Kembali -->
    <div style="text-align: center;">
        <button class="btn" onclick="window.print()">Cetak Struk</button>
        <a href="{{ route('kasir.index') }}" class="btn btn-danger">Kembali ke Kasir</a>
    </div>

</body>
</html>
