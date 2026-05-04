<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $groupCode }}</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    @php
        $status = $bookings->first()->status;
        $theme = [
            'pending' => [
                'color' => '#f59e0b', // Yellow/Amber
                'bg' => '#fefce8',
                'title' => 'Tagihan Pembayaran',
                'badge' => 'MENUNGGU PEMBAYARAN',
                'desc' => 'Harap segera melakukan pembayaran sesuai instruksi di bawah untuk mengamankan seat Anda.'
            ],
            'dp_paid' => [
                'color' => '#3b82f6', // Blue
                'bg' => '#eff6ff',
                'title' => 'Kuitansi Pembayaran DP',
                'badge' => 'DP / BEROPERASI',
                'desc' => 'DP Anda telah kami terima. Sisa tagihan dapat dilunasi sesuai jadwal yang ditentukan.'
            ],
            'fully_paid' => [
                'color' => '#10b981', // Emerald
                'bg' => '#ecfdf5',
                'title' => 'Kuitansi Pelunasan',
                'badge' => 'LUNAS / TERKONFIRMASI',
                'desc' => 'Terima kasih, pembayaran Anda telah lunas. Persiapkan keberangkatan Anda dengan sebaik-baiknya.'
            ],
            'completed' => [
                'color' => '#6366f1', // Indigo
                'bg' => '#eef2ff',
                'title' => 'Invoice Keberangkatan',
                'badge' => 'PERJALANAN SELESAI',
                'desc' => 'Semoga ibadah umroh Anda mabrur. Terima kasih telah mempercayai Al-Khairat Tour & Travel.'
            ],
            'savings' => [
                'color' => '#f97316', // Orange
                'bg' => '#fff7ed',
                'title' => 'Laporan Tabungan Umrah',
                'badge' => 'PROGRAM TABUNGAN',
                'desc' => 'Status pendaftaran Anda menggunakan program tabungan. Terus tingkatkan saldo tabungan Anda.'
            ],
            'cancelled' => [
                'color' => '#ef4444', // Red
                'bg' => '#fef2f2',
                'title' => 'Invoice Dibatalkan',
                'badge' => 'DIBATALKAN',
                'desc' => 'Pesanan ini telah dibatalkan. Informasi lebih lanjut silakan hubungi customer service kami.'
            ]
        ][$status] ?? [
            'color' => '#64748b',
            'bg' => '#f8fafc',
            'title' => 'Invoice Reservasi',
            'badge' => strtoupper($status),
            'desc' => 'Dokumen resmi pendaftaran paket umroh Al-Khairat Tour & Travel.'
        ];
    @endphp
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
            border-bottom: 2px solid {{ $theme['color'] }};
            margin-bottom: 30px;
            padding-bottom: 20px;
        }
        .header table {
            width: 100%;
            border: none;
            margin-bottom: 0;
            border-spacing: 0;
        }
        .company-name {
            font-size: 20pt;
            font-weight: bold;
            color: #333;
            letter-spacing: -1px;
        }
        .company-sub {
            font-size: 8pt;
            color: {{ $theme['color'] }};
            letter-spacing: 4px;
            font-weight: bold;
        }
        .invoice-title {
            font-size: 24pt;
            color: {{ $theme['color'] }};
            text-transform: uppercase;
            letter-spacing: 4px;
            font-weight: bold;
            margin: 10px 0 30px 0;
        }
        .status-badge {
            display: inline-block;
            background-color: {{ $theme['bg'] }};
            color: {{ $theme['color'] }};
            padding: 8px 15px;
            border-radius: 10px;
            font-size: 8pt;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 20px;
            border: 1px solid {{ $theme['color'] }}33;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .data-table th {
            background-color: {{ $theme['bg'] }};
            color: {{ $theme['color'] }};
            font-size: 8pt;
            text-transform: uppercase;
            text-align: left;
            padding: 12px 10px;
            border-bottom: 2px solid {{ $theme['color'] }}22;
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
            background-color: {{ $theme['bg'] }};
        }
        .total-label {
            text-align: right;
            font-weight: bold;
            font-size: 9pt;
            color: #999;
            text-transform: uppercase;
            padding: 15px 10px;
        }
        .total-value {
            text-align: right;
            font-size: 16pt;
            font-weight: bold;
            color: {{ $theme['color'] }};
            padding: 15px 10px;
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
            border: 1px solid #eee;
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
                $logoPath = public_path('images/logo.jpg');
                if (file_exists($logoPath)) {
                    $type = pathinfo($logoPath, PATHINFO_EXTENSION);
                    $data = file_get_contents($logoPath);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                } else {
                    $base64 = "";
                }
            @endphp
            <table>
                <tr>
                    <td style="border: none; padding: 0; width: 80px;">
                        @if($base64)
                        <img src="{{ $base64 }}" style="height: 70px; width: auto; display: block;">
                        @endif
                    </td>
                    <td style="border: none; padding: 0 0 0 15px; vertical-align: middle;">
                        <div class="company-name">AL-KHAIRAT</div>
                        <div class="company-sub">TOUR & TRAVEL</div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="float: right; width: 30%; text-align: right; padding-top: 15px;">
            <div class="label">Nomor Invoice</div>
            <div style="font-family: monospace; font-size: 12pt; font-weight: bold; color: #333;">#{{ $groupCode }}</div>
        </div>
    </div>

    <div class="status-badge">{{ $theme['badge'] }}</div>
    <div class="invoice-title">{{ $theme['title'] }}</div>

    <div class="clearfix" style="margin-bottom: 40px;">
        <div style="float: left; width: 50%;">
            <div class="label">Ditujukan Kepada</div>
            <div class="value" style="font-size: 12pt;">{{ $bookings->first()->user->name }}</div>
            <div style="font-size: 9pt; color: #666; margin-top: 4px;">{{ $bookings->first()->orderer_phone ?? $bookings->first()->user->email }}</div>
            <div style="font-size: 8pt; color: #999; margin-top: 2px;">{{ $bookings->first()->address ?? '' }}</div>
        </div>
        <div style="float: right; width: 45%; text-align: right;">
            <div class="label">Tanggal Dokumen</div>
            <div class="value">{{ now()->translatedFormat('d F Y') }}</div>
            <div class="label" style="margin-top: 15px;">Paket Umrah</div>
            <div class="value uppercase" style="color: {{ $theme['color'] }};">{{ $bookings->first()->product->name }}</div>
        </div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Detail Jamaah</th>
                <th>Akomodasi</th>
                <th style="text-align: right;">Biaya</th>
            </tr>
        </thead>
        <tbody>
            @php $totalPrice = 0; @endphp
            @foreach($bookings as $booking)
            @php $totalPrice += $booking->total_price; @endphp
            <tr>
                <td>
                    <div class="value">{{ $booking->full_name }}</div>
                    <div style="font-size: 8pt; color: #999; margin-top: 2px;">ID: {{ $booking->booking_code }} | NIK: {{ $booking->nik }}</div>
                </td>
                <td style="text-transform: uppercase; font-size: 9pt; color: #666; vertical-align: middle;">{{ $booking->room_variant }}</td>
                <td style="text-align: right; vertical-align: middle;" class="value">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="2" class="total-label">Total Tagihan Paket</td>
                <td class="total-value">
                    Rp {{ number_format($totalPrice, 0, ',', '.') }}
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="payment-info">
        <table style="width: 100%; border: none; border-spacing: 0;">
            <tr>
                <td style="border: none; padding: 0; width: 55%;">
                    <div class="label">Informasi Pembayaran</div>
                    <div class="value" style="font-size: 11pt; color: {{ $theme['color'] }}; margin-bottom: 5px;">{{ $payment->payment_method ?? 'Belum Ditentukan' }}</div>
                    <div style="font-size: 8pt; color: #777;">Tercatat Tanggal: {{ isset($payment->payment_date) ? \Carbon\Carbon::parse($payment->payment_date)->translatedFormat('d M Y') : '-' }}</div>
                </td>
                <td style="border: none; padding: 0; text-align: right; vertical-align: top;">
                    <div class="label">Status Keuangan</div>
                    <div class="value" style="color: {{ $theme['color'] }}; font-size: 11pt;">{{ $theme['badge'] }}</div>
                </td>
            </tr>
        </table>
        <div style="margin-top: 15px; border-top: 1px dashed #ddd; padding-top: 15px;">
            <p style="font-size: 9pt; color: #444; margin: 0; font-weight: bold; line-height: 1.6;">
                {{ $theme['desc'] }}
            </p>
            @if($status === 'dp_paid')
                <div style="margin-top: 10px; padding: 20px; background-color: #fff; border: 1px solid {{ $theme['color'] }}44; border-radius: 12px; border-left: 5px solid {{ $theme['color'] }};">
                    <div style="font-size: 10pt; color: {{ $theme['color'] }}; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">Konfirmasi DP</div>
                    <p style="font-size: 9pt; color: #444; margin-top: 10px; line-height: 1.6;">
                        Melalui dokumen ini, kami mengonfirmasi bahwa pendaftaran Anda melalui <strong>Pembayaran Uang Muka (DP)</strong> telah berhasil divalidasi. Seat Anda telah diamankan dalam sistem kami.
                    </p>
                    <div style="margin-top: 10px; padding-top: 10px; border-top: 1px dashed {{ $theme['color'] }}22; font-size: 8pt; color: #777;">
                        Tagihan pelunasan selanjutnya akan diinformasikan oleh tim Al-Khairat sesuai dengan jadwal yang berlaku.
                    </div>
                </div>
            @elseif($status === 'pending')
                <div style="margin-top: 10px; padding: 20px; background-color: #fefce8; border: 1px solid #f59e0b44; border-radius: 12px; border-left: 5px solid #f59e0b;">
                    <div style="font-size: 10pt; color: #f59e0b; font-weight: bold; text-transform: uppercase;">Menunggu Pembayaran</div>
                    <p style="font-size: 9pt; color: #444; margin-top: 10px;">
                        Silakan lakukan pembayaran sesuai dengan nominal tagihan di atas untuk memvalidasi pendaftaran Anda.
                    </p>
                </div>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>Dokumen ini adalah bukti transaksi resmi Al-Khairat Tour & Travel yang diterbitkan oleh sistem.</p>
        <p>&copy; {{ date('Y') }} Al-Khairat Tour & Travel. Ruko Puri Anjasmoro Blok B1 No. 12, Semarang.</p>
    </div>
</body>
</html>
