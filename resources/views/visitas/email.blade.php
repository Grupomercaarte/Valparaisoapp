{{-- <img alt="image" src="{{ asset('img/logo.png') }}">
<h3>Buen dia estimado socio {{ $name }} le hacemos entrega del reglamento.</h3>
<h3>Cualquier duda o aclaracion, favor de comunicarse con el encargado.</h3> --}}
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');

        /*
CONFIG STYLES
Please do not delete and edit CSS styles below
*/
        /* IMPORTANT THIS STYLES MUST BE ON FINAL EMAIL */
        #outlook a {
            padding: 0;
        }

        .ExternalClass {
            width: 100%;
        }

        .product-description {
            font-size: 15pt;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        .es-button {
            mso-style-priority: 100 !important;
            text-decoration: none !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
            mso-hide: all;
        }

        /*
END OF IMPORTANT
*/
        s {
            text-decoration: line-through;
        }

        body {
            width: 100%;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            font-family: 'Montserrat', sans-serif;
        }

        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse;
            border-spacing: 0px;
        }

        table td,
        html,
        body,
        .es-wrapper {
            padding: 0;
            Margin: 0;
        }

        .es-content,
        .es-header,
        .es-footer {
            table-layout: fixed !important;
            width: 100%;
        }

        img {
            display: block;
            border: 0;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        table tr {
            border-collapse: collapse;
        }

        p,
        hr {
            Margin: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            Margin: 0;
            line-height: 120%;
            mso-line-height-rule: exactly;
            font-family: 'Montserrat', sans-serif;
        }

        p,
        ul li,
        ol li,
        a {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            mso-line-height-rule: exactly;
        }

        .es-left {
            float: left;
        }

        .es-right {
            float: right;
        }

        .es-p5 {
            padding: 5px;
        }

        .es-p5t {
            padding-top: 5px;
        }

        .es-p5b {
            padding-bottom: 5px;
        }

        .es-p5l {
            padding-left: 5px;
        }

        .es-p5r {
            padding-right: 5px;
        }

        .es-p10 {
            padding: 10px;
        }

        .es-p10t {
            padding-top: 10px;
        }

        .es-p10b {
            padding-bottom: 10px;
        }

        .es-p10l {
            padding-left: 10px;
        }

        .es-p10r {
            padding-right: 10px;
        }

        .es-p15 {
            padding: 15px;
        }

        .es-p15t {
            padding-top: 15px;
        }

        .es-p15b {
            padding-bottom: 15px;
        }

        .es-p15l {
            padding-left: 15px;
        }

        .es-p15r {
            padding-right: 15px;
        }

        .es-p20 {
            padding: 20px;
        }

        .es-p20t {
            padding-top: 20px;
        }

        .es-p20b {
            padding-bottom: 20px;
        }

        .es-p20l {
            padding-left: 20px;
        }

        .es-p20r {
            padding-right: 20px;
        }

        .es-p25 {
            padding: 25px;
        }

        .es-p25t {
            padding-top: 25px;
        }

        .es-p25b {
            padding-bottom: 25px;
        }

        .es-p25l {
            padding-left: 25px;
        }

        .es-p25r {
            padding-right: 25px;
        }

        .es-p30 {
            padding: 30px;
        }

        .es-p30t {
            padding-top: 30px;
        }

        .es-p30b {
            padding-bottom: 30px;
        }

        .es-p30l {
            padding-left: 30px;
        }

        .es-p30r {
            padding-right: 30px;
        }

        .es-p35 {
            padding: 35px;
        }

        .es-p35t {
            padding-top: 35px;
        }

        .es-p35b {
            padding-bottom: 35px;
        }

        .es-p35l {
            padding-left: 35px;
        }

        .es-p35r {
            padding-right: 35px;
        }

        .es-p40 {
            padding: 40px;
        }

        .es-p40t {
            padding-top: 40px;
        }

        .es-p40b {
            padding-bottom: 40px;
        }

        .es-p40l {
            padding-left: 40px;
        }

        .es-p40r {
            padding-right: 40px;
        }

        .es-menu td {
            border: 0;
        }

        .es-menu td a img {
            display: inline-block !important;
        }

        /*
END CONFIG STYLES
*/
        a {
            text-decoration: underline;
        }

        p,
        ul li,
        ol li {
            font-family: 'Montserrat', sans-serif;
            line-height: 150%;
        }

        ul li,
        ol li {
            Margin-bottom: 15px;
            margin-left: 0;
        }

        .es-menu td a {
            text-decoration: none;
            display: block;
            font-family: 'Montserrat', sans-serif;
        }

        .es-wrapper {
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center top;
            background-image: url('https://aguacalientevalparaiso.com/img/bg-email2.jpg');
        }

        .es-wrapper-color,
        .es-wrapper {
            background-color: #223748;
        }

        .es-header {
            background-color: transparent;
            background-repeat: repeat;
            background-position: center top;
        }

        .es-header-body {
            background-color: transparent;
        }

        .es-header-body p,
        .es-header-body ul li,
        .es-header-body ol li {
            color: #ffffff;
            font-size: 14px;
        }

        .es-header-body a {
            color: #ffffff;
            font-size: 14px;
        }

        .es-content-body {
            background-color: #ffffff;
        }

        .es-content-body p,
        .es-content-body ul li,
        .es-content-body ol li {
            color: #666666;
            font-size: 16px;
        }

        .es-content-body a {
            color: #999999;
            font-size: 16px;
        }

        .es-footer {
            background-color: transparent;
            background-repeat: repeat;
            background-position: center top;
        }

        .es-footer-body {
            background-color: transparent;
        }

        .es-footer-body p,
        .es-footer-body ul li,
        .es-footer-body ol li {
            color: #efefef;
            font-size: 14px;
        }

        .es-footer-body a {
            color: #efefef;
            font-size: 14px;
        }

        .es-infoblock,
        .es-infoblock p,
        .es-infoblock ul li,
        .es-infoblock ol li {
            line-height: 120%;
            font-size: 12px;
            color: #ffffff;
        }

        .es-infoblock a {
            font-size: 12px;
            color: #ffffff;
        }

        h1 {
            font-size: 30px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
        }

        h2 {
            font-size: 24px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
        }

        h3 {
            font-size: 20px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
        }

        .es-header-body h1 a,
        .es-content-body h1 a,
        .es-footer-body h1 a {
            font-size: 30px;
        }

        .es-header-body h2 a,
        .es-content-body h2 a,
        .es-footer-body h2 a {
            font-size: 24px;
        }

        .es-header-body h3 a,
        .es-content-body h3 a,
        .es-footer-body h3 a {
            font-size: 20px;
        }

        a.es-button,
        button.es-button {
            display: inline-block;
            background: #333333;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif;
            font-weight: normal;
            font-style: normal;
            line-height: 120%;
            color: #ffffff;
            text-decoration: none;
            width: auto;
            text-align: center;
            padding: 8px 30px 8px 30px;
            mso-padding-alt: 0;
            mso-border-alt: 10px solid #333333;
        }

        .es-button-border {
            border-style: solid solid solid solid;
            border-color: #333333 #333333 #333333 #333333;
            background: #333333;
            border-width: 0px 0px 0px 0px;
            display: inline-block;
            border-radius: 5px;
            width: auto;
        }

        /*
RESPONSIVE STYLES
Please do not delete and edit CSS styles below.

If you don't need responsive layout, please delete this section.
*/
        @media only screen and (max-width: 600px) {

            p,
            ul li,
            ol li,
            a {
                line-height: 150% !important;
            }

            h1,
            h2,
            h3,
            h1 a,
            h2 a,
            h3 a {
                line-height: 120% !important;
            }

            h1 {
                font-size: 38px !important;
                text-align: center;
            }

            h2 {
                font-size: 30px !important;
                text-align: center;
            }

            h3 {
                font-size: 20px !important;
                text-align: center;
            }

            .es-header-body h1 a,
            .es-content-body h1 a,
            .es-footer-body h1 a {
                font-size: 38px !important;
            }

            .es-header-body h2 a,
            .es-content-body h2 a,
            .es-footer-body h2 a {
                font-size: 30px !important;
            }

            .es-header-body h3 a,
            .es-content-body h3 a,
            .es-footer-body h3 a {
                font-size: 20px !important;
            }

            .es-menu td a {
                font-size: 14px !important;
            }

            .es-header-body p,
            .es-header-body ul li,
            .es-header-body ol li,
            .es-header-body a {
                font-size: 14px !important;
            }

            .es-content-body p,
            .es-content-body ul li,
            .es-content-body ol li,
            .es-content-body a {
                font-size: 14px !important;
            }

            .es-footer-body p,
            .es-footer-body ul li,
            .es-footer-body ol li,
            .es-footer-body a {
                font-size: 14px !important;
            }

            .es-infoblock p,
            .es-infoblock ul li,
            .es-infoblock ol li,
            .es-infoblock a {
                font-size: 12px !important;
            }

            *[class="gmail-fix"] {
                display: none !important;
            }

            .es-m-txt-c,
            .es-m-txt-c h1,
            .es-m-txt-c h2,
            .es-m-txt-c h3 {
                text-align: center !important;
            }

            .es-m-txt-r,
            .es-m-txt-r h1,
            .es-m-txt-r h2,
            .es-m-txt-r h3 {
                text-align: right !important;
            }

            .es-m-txt-l,
            .es-m-txt-l h1,
            .es-m-txt-l h2,
            .es-m-txt-l h3 {
                text-align: left !important;
            }

            .es-m-txt-r img,
            .es-m-txt-c img,
            .es-m-txt-l img {
                display: inline !important;
            }

            .es-button-border {
                display: block !important;
            }

            a.es-button,
            button.es-button {
                font-size: 18px !important;
                display: block !important;
                border-left-width: 0px !important;
                border-right-width: 0px !important;
            }

            .es-btn-fw {
                border-width: 10px 0px !important;
                text-align: center !important;
            }

            .es-adaptive table,
            .es-btn-fw,
            .es-btn-fw-brdr,
            .es-left,
            .es-right {
                width: 100% !important;
            }

            .es-content table,
            .es-header table,
            .es-footer table,
            .es-content,
            .es-footer,
            .es-header {
                width: 100% !important;
                max-width: 600px !important;
            }

            .es-adapt-td {
                display: block !important;
                width: 100% !important;
            }

            .adapt-img {
                width: 100% !important;
                height: auto !important;
            }

            .es-m-p0 {
                padding: 0px !important;
            }

            .es-m-p0r {
                padding-right: 0px !important;
            }

            .es-m-p0l {
                padding-left: 0px !important;
            }

            .es-m-p0t {
                padding-top: 0px !important;
            }

            .es-m-p0b {
                padding-bottom: 0 !important;
            }

            .es-m-p20b {
                padding-bottom: 20px !important;
            }

            .es-mobile-hidden,
            .es-hidden {
                display: none !important;
            }

            tr.es-desk-hidden,
            td.es-desk-hidden,
            table.es-desk-hidden {
                width: auto !important;
                overflow: visible !important;
                float: none !important;
                max-height: inherit !important;
                line-height: inherit !important;
            }

            tr.es-desk-hidden {
                display: table-row !important;
            }

            table.es-desk-hidden {
                display: table !important;
            }

            td.es-desk-menu-hidden {
                display: table-cell !important;
            }

            .es-menu td {
                width: 1% !important;
            }

            table.es-table-not-adapt,
            .esd-block-html table {
                width: auto !important;
            }

            table.es-social {
                display: inline-block !important;
            }

            table.es-social td {
                display: inline-block !important;
            }

            .es-desk-hidden {
                display: table-row !important;
                width: auto !important;
                overflow: visible !important;
                max-height: inherit !important;
            }
        }

        /*
END RESPONSIVE STYLES
*/
        .es-p-default {
            padding-top: 20px;
            padding-right: 40px;
            padding-bottom: 0px;
            padding-left: 40px;
        }

        .es-p-all-default {
            padding: 0px;
        }
    </style>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
   <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
    <v:fill type="tile" src="https://aguacalientevalparaiso.com/img/bg-email.jpg" color="#223748" origin="0.5, 0" position="0.5, 0"></v:fill>
   </v:background>
  <![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
            background="https://aguacalientevalparaiso.com/img/bg-email2.jpg"
            style="background-position: center top;">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table class="es-header esd-header-popover" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-header-body" style="background-color: transparent;"
                                            width="600" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p40b es-p20r es-p20l"
                                                        align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560"
                                                                        valign="top" align="center">
                                                                        <table width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p30t es-p5b"
                                                                                        align="center">
                                                                                        <h2
                                                                                            style="color: #ffffff; font-size: 57px; font-family: georgia, times, 'times new roman', serif; line-height: 100%;">
                                                                                            Bienvenido a</h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        class="esd-block-image"
                                                                                        style="font-size:0"><a
                                                                                            target="_blank">
                                                                                            <img class="adapt-img esdev-empty-img"
                                                                                                src="https://aguacalientevalparaiso.com/img/logo_val-n.png?v2"
                                                                                                alt width="300px">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p25b"
                                                                                        align="center">
                                                                                        <p
                                                                                            style="color: #ffffff; font-size: 16px;">
                                                                                            <br>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-content-body" style="border-radius: 20px; margin-bottom:20px;"
                                            width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                                            align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p30t es-p40r es-p40l"
                                                        style="background-repeat: no-repeat;" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="520"
                                                                        valign="top" align="center">
                                                                        <table width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-m-txt-l"
                                                                                        align="left">
                                                                                        <h2
                                                                                            style="font-size: 28px; margin:25px;">
                                                                                            Hola {{ $name }}!
                                                                                        </h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-image es-m-txt-l"
                                                                                        align="left"
                                                                                        style="font-size:0 ">
                                                                                        <a target="_blank"
                                                                                            href="https://esputnik.com/viewInBrowser"><img
                                                                                                src="https://tlr.stripocdn.email/content/guids/CABINET_6ebdc9f620b6c98ec92e579217982603/images/99301524564595313.png"
                                                                                                alt
                                                                                                style="display: block; margin-left:25px;"
                                                                                                width="75"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15t"
                                                                                        align="left">
                                                                                        <p
                                                                                            style="line-height: 150%; font-size: 13pt; margin-left:25px;margin-right:25px;">
                                                                                            <span
                                                                                                class="product-description">Ahora
                                                                                                formas parte de
                                                                                                valparaiso spa,
                                                                                                queremos&nbsp;agradecer&nbsp;tu
                                                                                                valiosa preferencia,
                                                                                                esperando que tengas una
                                                                                                experiencia
                                                                                                inolvidable.</span>
                                                                                        </p>
                                                                                        <p
                                                                                            style="line-height: 150%; font-size: 13pt; margin-left:25px;margin-right:25px;">
                                                                                            Cuenta con nosotros para
                                                                                            cualquier duda o aclaración.
                                                                                        </p>
                                                                                        <p
                                                                                            style="line-height: 150%; font-size: 13pt; margin-left:25px;margin-right:25px;margin-bottom:25px;">
                                                                                            <span
                                                                                                class="product-description">A
                                                                                                continuación verás
                                                                                                adjunto
                                                                                                nuestro&nbsp;reglamento
                                                                                                y el aviso de
                                                                                                privacidad.&nbsp;</span>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p40b es-p40r es-p40l"
                                                        align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="520"
                                                                        valign="top" align="center">
                                                                        <table width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-button es-p5t"
                                                                                        align="left"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="9101" align="center">
                                        <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0"
                                            align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p10r es-p10l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580"
                                                                        valign="top" align="center">
                                                                        <table width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-social es-p10b es-m-txt-c"
                                                                                        align="center"
                                                                                        style="font-size:0 margin-top:20px;">
                                                                                        <table
                                                                                            class="es-table-not-adapt es-social"
                                                                                            cellspacing="0"
                                                                                            cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="es-p10r"
                                                                                                        valign="top"
                                                                                                        align="center">
                                                                                                        <a target="_blank"
                                                                                                            href="https://www.instagram.com/valparaisodayspa/"><img
                                                                                                                title="Instagram"
                                                                                                                src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-white-bordered/instagram-rounded-white-bordered.png"
                                                                                                                alt="Inst"
                                                                                                                width="32"></a>
                                                                                                    </td>
                                                                                                    <td valign="top"
                                                                                                        align="center">
                                                                                                        <a target="_blank"
                                                                                                            href="https://www.facebook.com/profile.php?id=100081355723582"><img
                                                                                                                title="Facebook"
                                                                                                                src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-white-bordered/facebook-rounded-white-bordered.png"
                                                                                                                alt="Fb"
                                                                                                                width="32"></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10t es-m-txt-c"
                                                                                        align="center">
                                                                                        <p style="color: #ffffff">
                                                                                            Correo Informativo,
                                                                                            sin necesidad
                                                                                            de retorno.</p>
                                                                                        <p style="color: #ffffff">©2023
                                                                                            Spa Val Paraiso | Av.
                                                                                            De, La Paz 16420, Mineral de
                                                                                            Santa Fe, 22416 Tijuana,
                                                                                            B.C.</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
