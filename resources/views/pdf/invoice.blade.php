<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>INVOICE #{{ $groupCode }}</title>
    <style>
        @page {
            margin: 1.5cm 2cm;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 10pt;
            line-height: 1.4;
            color: #333;
        }
        .header {
            border-bottom: 4px solid #f97316;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
        .header table {
            width: 100%;
            border: none;
            margin-bottom: 0;
            border-spacing: 0;
        }
        .company-name {
            font-size: 24pt;
            font-weight: bold;
            color: #333;
            letter-spacing: -1px;
        }
        .company-sub {
            font-size: 10pt;
            color: #f97316;
            letter-spacing: 4px;
            font-weight: bold;
        }
        .invoice-title {
            font-size: 32pt;
            color: #f97316;
            text-transform: uppercase;
            letter-spacing: 8px;
            font-weight: bold;
            margin: 15px 0 30px 0;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .data-table th {
            background-color: #fef2f2;
            color: #666;
            font-size: 8pt;
            text-transform: uppercase;
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
            font-weight: bold;
        }
        .data-table td {
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }
        tr {
            page-break-inside: avoid;
        }
        .total-row {
            background-color: #fffaf0;
        }
        .total-label {
            text-align: right;
            font-weight: bold;
            font-size: 9pt;
            color: #999;
            text-transform: uppercase;
            padding: 20px 10px;
        }
        .total-value {
            text-align: right;
            font-size: 18pt;
            font-weight: bold;
            color: #f97316;
            padding: 20px 10px;
        }
        .label {
            font-size: 8pt;
            font-weight: bold;
            color: #999;
            text-transform: uppercase;
            margin-bottom: 3px;
        }
        .value {
            font-weight: bold;
            font-size: 10pt;
            color: #333;
        }
        .payment-info {
            background-color: #f9fafb;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
            page-break-inside: avoid;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 8pt;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    <div class="header clearfix">
        <div style="float: left; width: 65%;">
            @php
                $path = public_path('images/logo.jpg');
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            @endphp
            <table>
                <tr>
                    <td style="border: none; padding: 0; width: 110px;">
                        <img src="{{ $base64 }}" style="height: 100px; width: auto; display: block;">
                    </td>
                    <td style="border: none; padding: 0 0 0 20px; vertical-align: middle;">
                        <div class="company-name">AL-KHAIRAT</div>
                        <div class="company-sub">TOUR & TRAVEL</div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="float: right; width: 30%; text-align: right; padding-top: 25px;">
            <div class="label">Registrasi Grup</div>
            <div style="font-family: monospace; font-size: 14pt; font-weight: bold; color: #333;">#{{ $groupCode }}</div>
        </div>
    </div>

    <div class="invoice-title">Invoice</div>

    <div class="clearfix" style="margin-bottom: 30px;">
        <div style="float: left; width: 50%;">
            <div class="label">Pendaftar / Pemesan</div>
            <div class="value">{{ $bookings->first()->user->name }}</div>
            <div style="font-size: 9pt; color: #666;">{{ $bookings->first()->orderer_phone ?? $bookings->first()->user->email }}</div>
        </div>
        <div style="float: right; width: 45%; text-align: right;">
            <div class="label">Tanggal Registrasi</div>
            <div class="value">{{ $bookings->first()->created_at->translatedFormat('d F Y') }}</div>
            <div class="label" style="margin-top: 10px;">Paket Terpilih</div>
            <div class="value uppercase" style="color: #f97316;">{{ $bookings->first()->product->name }}</div>
        </div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Daftar Jamaah</th>
                <th>Varian Kamar</th>
                <th style="text-align: right;">Harga Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>
                    <div class="value">{{ $booking->full_name }}</div>
                    <div style="font-size: 8pt; color: #999;">NIK: {{ $booking->nik }}</div>
                </td>
                <td style="text-transform: uppercase; font-size: 9pt; color: #666;">{{ $booking->room_variant }}</td>
                <td style="text-align: right;" class="value">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="2" class="total-label">Total Pembayaran</td>
                <td class="total-value">
                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="payment-info">
        <table style="width: 100%; border: none;">
            <tr>
                <td style="border: none; padding: 0; width: 50%;">
                    <div class="label">Metode Pembayaran</div>
                    <div class="value" style="font-size: 11pt; color: #f97316;">{{ $payment->payment_method }}</div>
                </td>
                <td style="border: none; padding: 0; text-align: right;">
                    <div class="label">Status Konfirmasi</div>
                    @if($payment->status === 'verified')
                        <div class="value" style="color: #10b981;">PEMBAYARAN DITERIMA</div>
                    @elseif($payment->status === 'rejected')
                        <div class="value" style="color: #ef4444;">DITOLAK / GAGAL</div>
                    @else
                        <div class="value" style="color: #f59e0b;">MENUNGGU VERIFIKASI</div>
                    @endif
                </td>
            </tr>
        </table>
        <p style="font-size: 8pt; color: #777; margin-top: 15px; border-top: 1px dashed #ddd; padding-top: 10px;">
            Lacak status pendaftaran Anda secara berkala di halaman Dashboard. Tim kami akan memverifikasi pembayaran Anda maksimal 1x24 jam setelah bukti dikirimkan.
        </p>
    </div>

    <div class="footer">
        <p>Invoice ini diterbitkan oleh sistem Al-Khairat Tour & Travel secara otomatis.</p>
        <p>&copy; {{ date('Y') }} Al-Khairat Tour & Travel. Harap simpan invoice ini sebagai bukti pendaftaran awal Anda.</p>
    </div>
</body>
</html>
