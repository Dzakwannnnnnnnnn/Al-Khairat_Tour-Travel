<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balasan Ulasan - Al-Khairat Tour & Travel</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f7f9fc; color: #333; line-height: 1.6; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); margin-top: 40px; margin-bottom: 40px; }
        .header { background: linear-gradient(135deg, #E07856 0%, #F39C12 100%); padding: 30px 20px; text-align: center; color: white; }
        .header h1 { margin: 0; font-size: 24px; letter-spacing: 1px; font-weight: bold; }
        .content { padding: 30px; }
        .greeting { font-size: 18px; font-weight: 600; color: #2C2416; margin-bottom: 15px; }
        .review-box { background-color: #FBF8F3; border-left: 4px solid #F39C12; padding: 15px; border-radius: 4px; margin-bottom: 25px; font-style: italic; color: #555; }
        .reply-box { margin-bottom: 30px; }
        .reply-text { white-space: pre-wrap; font-size: 16px; color: #2C2416; background-color: #fff; border: 1px solid #ebebeb; padding: 20px; border-radius: 8px; }
        .footer { background-color: #2C2416; padding: 20px; text-align: center; font-size: 12px; color: #aaa; }
        .footer a { color: #F39C12; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Al-Khairat Tour & Travel</h1>
        </div>
        
        <div class="content">
            <div class="greeting">Assalamu'alaikum Wr. Wb., Bapak/Ibu {{ $testimonial->name }},</div>
            
            <p>Terima kasih atas kepercayaan dan ulasan yang Anda berikan mengenai layanan kami:</p>
            
            <div class="review-box">
                "{{ $testimonial->message }}"
            </div>
            
            <p>Berikut adalah balasan dari tim manajemen Al-Khairat:</p>
            
            <div class="reply-box">
                <div class="reply-text">{{ $replyMessage }}</div>
            </div>
            
            <p>Semoga Allah senantiasa melimpahkan berkah dan memberikan kesempatan untuk kembali menjalankan ibadah ke Tanah Suci bersama kami.</p>
            
            <br>
            <p>Wassalamu'alaikum Wr. Wb.,<br><strong>Manajemen Al-Khairat Tour & Travel</strong></p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Al-Khairat Tour & Travel. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</body>
</html>
