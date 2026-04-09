<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #FDFBF8;
            color: #2D3436;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #E5E7EB;
        }
        .header {
            background: linear-gradient(135deg, #F39547 0%, #F39C12 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 1px;
        }
        .content {
            padding: 40px;
        }
        .info-group {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #F1F2F6;
        }
        .label {
            font-weight: bold;
            color: #F39547;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 5px;
        }
        .value {
            font-size: 16px;
            color: #2D3436;
        }
        .message-box {
            background: #FDFBF8;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #F39547;
            font-style: italic;
        }
        .footer {
            background: #F1F2F6;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #636E72;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Al-Khairat Tour & Travel</h1>
            <p style="margin: 5px 0 0; opacity: 0.9;">Pesan Kontak Baru</p>
        </div>
        
        <div class="content">
            <div class="info-group">
                <span class="label">Nama Pengirim</span>
                <span class="value">{{ $name }}</span>
            </div>
            
            <div class="info-group">
                <span class="label">Email Pengirim</span>
                <span class="value">{{ $email }}</span>
            </div>
            
            <div class="info-group">
                <span class="label">Subjek</span>
                <span class="value">{{ $subject }}</span>
            </div>
            
            <div class="info-group">
                <span class="label">Pesan</span>
                <div class="message-box">
                    "{!! nl2br(e($user_message)) !!}"
                </div>
            </div>
        </div>
        
        <div class="footer">
            &copy; {{ date('Y') }} Al-Khairat Tour & Travel. Semua Hak Dilindungi.
        </div>
    </div>
</body>
</html>
