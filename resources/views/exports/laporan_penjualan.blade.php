<table>
    <thead>
        <tr>
            <th>No.Struk</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Total Penjualan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksiHarian as $transaksi)
            <tr>
                <td>{{ $transaksi->invoice_number }}</td>
                <td>
                    @foreach ($transaksi->detailTransaksi as $detail)
                        {{ $detail->produk->nama_produk ?? 'Produk tidak ditemukan' }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($transaksi->detailTransaksi as $detail)
                        {{ $detail->quantity }}<br>
                    @endforeach
                </td>
                <td>{{ $transaksi->created_at->format('d-m-Y H:i:s') }}</td>
                <td>Rp{{ number_format($transaksi->total, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
