<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="width:85%;margin: 0 auto;font-family: Arial, Helvetica, sans-serif;border: 1px solid #ede9e9;">
    <header style="width:100%;background-color: #ede9e9;text-align: center;padding: 12px 0;">
        <img src="https://pakistangate.s3.amazonaws.com/logo.png" style="width:40%;" alt="pakGate">
    </header>
    <main style="width: 75%; margin: 0 auto;">
        <section style="margin: 0 16px 16px;">
            @yield('notification_section')

            <span style="font-size: 15px;margin-bottom:6px;">
                {{ trans('messages.thanks') }},<br>
                PG Innovation
            </span>
        </section>
    </main>
    <footer style="width:100%;background-color: #ede9e9;text-align: center;padding: 12px 0;">
        <div style="width:85%;margin:0 auto;">
            <div style="width:100%;text-align: center;display:flex;justify-content:center;">
                <img loading="lazy"  style="width: 20px;height: 20px;"
                src="{{asset('images/link.png')}}" alt="link"
                title="link">
                {{-- <i class="fa fa-link" aria-hidden="true"></i>  --}}
                <a href="#" style="color:#000;text-decoration:none;margin-left:4px;text-align: left;">{{ get_sender_name() }}</a>
            </div>
            <div style="width:100%;text-align: center;display:flex;justify-content:center;padding:10px 0;">
                <img loading="lazy"  style="width: 20px;height: 15px;"
                src="{{asset('images/email.png')}}" alt="email"
                title="email">
                {{-- <i class="fa fa-envelope" aria-hidden="true"></i>  --}}
                <a style="color:#000;text-decoration:none;margin-left:4px;text-align: center;" href="mailto:{{ get_sender_email() }}" target="_blank">{{ get_sender_email() }}</a>
            </div>
            <div style="width:100%;text-align: center;display:flex;justify-content:center;">
                <img loading="lazy"  style="width: 20px;height: 20px;"
                src="{{asset('images/phone.png')}}" alt="phone"
                title="phone">
                {{-- <i class="fa fa-phone" aria-hidden="true"></i>  --}}
                <a style="color:#000;text-decoration:none;margin-left:4px;text-align: right;" href="tel:+923479882222">+92-347-9882222</a>
            </div>
        </div>
    </footer>
</body>
</html>
