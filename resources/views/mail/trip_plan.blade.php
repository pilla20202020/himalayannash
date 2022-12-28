<style>
    body,
    table,
    td,
    a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    table,
    td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        -ms-interpolation-mode: bicubic;
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
    }

    table {
        border-collapse: collapse !important;
    }

    body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    a[x-apple-input-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    div[style*="margin: 16px 0;"] {
        margin: 0 !important;
    }
</style>

<body style="background-color: #f7f5fa; margin: 0 !important; padding: 0 !important;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#426899" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="480">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                            <img src="{{asset('assets/images/brand/logo-new.png')}}" alt="" height="100" width="100" style="background-color: #fff;">
                            <div style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 35px;"
                                border="0">Himalayan Nash</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#426899" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="480">
                    <tr>
                        <td bgcolor="#ffffff" align="left" valign="top"
                            style="color: #111111; font-family: Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                            <h6 style="font-size: 24px; font-weight: 400; margin: 0;">Hello,</h6>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="480">
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td colspan="2"
                                        style="padding-left:30px;padding-right:15px;padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                        <p>We have received a new trip plan from {{$input['email']}} with the following details. Please reply soon.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th align="left" valign="top"
                                        style="padding-left:30px;padding-right:15px;padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                        E-Mail</th>
                                    <td align="left" valign="top"
                                        style="padding-left:15px;padding-right:30px;padding-bottom:10px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                        {{$input['email']}}</td>
                                </tr>
                                <tr>
                                    <th align="left" valign="top"
                                        style="padding-left:30px;padding-right:15px;padding-bottom:30px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                        Phone No.</th>
                                    <td align="left" valign="top"
                                        style="padding-left:15px;padding-right:30px;padding-bottom:30px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                        {{$input['contact_no']}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        style="padding-left:30px;padding-right:15px;padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                        <p>Please follow the link <a href="{{route('customer-trip-plan.index')}}">{{route('customer-trip-plan.index')}}</a> for more details.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="480">
                    <tr>
                        <td bgcolor="#f4f4f4" align="left"
                            style="padding: 30px 30px 30px 30px; color: #666666; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 0;">Diese E-Mail kommt von "<a href="https://accessword.net" target="_blank"
                                    style="color: #111111; font-weight: 700;">AWT<a>".</p>
                        </td>
                    </tr>
            </td>
        </tr>
    </table>

</body>
