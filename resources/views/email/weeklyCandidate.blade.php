<div id="email" style="width:600px;margin: auto;background:white;">
    <table role="presentation" border="0" align="right" cellspacing="0">
        <tr>
            <td>
                <a href="#"
                   style="font-size: 9px; text-transform:uppercase; letter-spacing: 1px; color: #99ACC2;  font-family:Arial;">View
                    in Browser</a>
            </td>
        </tr>
    </table>

    <!-- Header -->
    <table role="presentation" border="0" width="100%" cellspacing="0">
        <tr>
            <td bgcolor="#00A4BD" align="center" style="color: white;">
                <img alt="Flower"
                     src="https://hs-8886753.f.hubspotemail.net/hs/hsstatic/TemplateAssets/static-1.60/img/hs_default_template_images/email_dnd_template_images/ThankYou-Flower.png"
                     width="400px">
                <h1 style="font-size: 52px; margin:0 0 20px 0; font-family:Arial;"> Welcome finding job!</h1>
        </tr>
        </td>
    </table>
    <!-- Body 2-->
    @foreach($posts as $post)
        <table role="presentation" border="0" width="100%" cellspacing="0">
            <tr>
                <td style="vertical-align: top;padding: 30px 10px 30px 60px;">
{{--                    <img src="http://itjob.vn/Images/image-1.jpg">--}}
{{--                    <img src="http://itjob.vn/Images/image-1.jpg" width="200px" align="center">--}}
                    <h2 style="font-size: 28px; margin:0 0 20px 0; font-family:Arial;">{{ $post }}</h2>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial">{{ $post->description }}</p>
                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial;">
                        <a href="#" style="color:#FF7A59;text-decoration:underline;">Đọc thêm</a></p>
                </td>
            </tr>
        </table>
    @endforeach

    <!-- Footer -->
    <table role="presentation" border="0" width="100%" cellspacing="0">
        <tr>
            <td bgcolor="#F5F8FA" style="padding: 30px 30px;">
                <p style="margin:0 0 12px 0; font-size:16px; line-height:24px; color: #99ACC2; font-family:Arial"> Made
                    with &hearts; at HubSpot HQ </p>
                <a href="#"
                   style="font-size: 9px; text-transform:uppercase; letter-spacing: 1px; color: #99ACC2;  font-family:Arial;">
                    Unsubscribe </a>
            </td>
        </tr>
    </table>
</div>
