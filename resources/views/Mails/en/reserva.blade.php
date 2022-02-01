<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservas Prueba</title>
    <style type="text/css">
        @media(prefers-color-scheme:dark) {
            body {
                background-color: #312c32;
                color: white;
            }
        }

        @media(prefers-color-scheme:light) {
            body {
                background-color: #ffffff;
                color: rgb(0, 0, 0);
            }
        }

    </style>
</head>

<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">
        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                                class="container590">
                                <tr>
                                    <td align="center" height="70" style="height:70px;">
                                        <a href=""
                                            style="display: block; border-style: none !important; border: 0 !important;"><img
                                                width="300" border="0" style="display: block; width: 100px;"
                                                src="https://www.adharacancun.com/img/logos/adhara_logo.png"
                                                alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table width="360 " border="0" cellpadding="0" cellspacing="0"
                                            style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                            class="container590 hide">
                                            <tr>
                                                <td width="120" align="center"
                                                    style="font-size: 18px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                                    <a href="" style="color: #312c32; text-decoration: none;">Page
                                                        web</a>
                                                </td>
                                                <td width="120" align="center"
                                                    style="font-size: 18px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                                    <a href=""
                                                        style="color: #312c32; text-decoration: none;">Whatsapp</a>
                                                </td>
                                                <td width="120" align="center"
                                                    style="font-size: 18px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                                    <a href=""
                                                        style="color: #312c32; text-decoration: none;">Facebook</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>
                </table>

                <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

                    <tr>
                        <td align="center">
                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                                class="container590">
                                <tr>
                                    <td align="center"
                                        style="color: #343434; font-size: 28px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                                        class="main-header">


                                        <div style="line-height: 35px">

                                            Your reservation has been <span style="color: #5caad2;">confirmed</span>

                                        </div>
                                    </td>
                                </tr>
                                <tr>

                                    <td align="center" class="section-img">
                                        <a href=""
                                            style=" border-style: none !important; display: block; border: 0 !important;"><img
                                                src="https://www.adharacancun.com/img/places/room.png"
                                                style="display: block; width: 590px;" width="590" border="0"
                                                alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="center">
                                        <table border="0" width="40" align="center" cellpadding="0" cellspacing="0"
                                            bgcolor="eeeeee">
                                            <tr>
                                                <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="center"
                                        style="color: #5caad2; font-size: 30px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <div style="line-height: 24px">
                                            Folio number <br>
                                            {{ $reserva->folio }}
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center">
                                        <table border="0" width="400" align="center" cellpadding="0" cellspacing="0"
                                            class="container590">
                                            <tr>
                                                <td align="center"
                                                    style="color: #363636; font-size: 20px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                                    <div style="line-height: 24px">
                                                        Check In <br>
                                                        {{ $reserva->checkIn }}
                                                    </div>
                                                </td>
                                                <td align="center"
                                                    style="color: #363636; font-size: 20px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">

                                                    <div style="line-height: 24px">
                                                        Check Out <br>
                                                        {{ $reserva->checkOut }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="center">
                                        <table border="0" align="center" width="160" cellpadding="0" cellspacing="0"
                                            bgcolor="5caad2" style="">

                                            <tr>
                                                <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td align="center"
                                                    style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">


                                                    <div style="line-height: 26px;">
                                                        <a href=""
                                                            style="color: #ffffff; text-decoration: none;">VISIT WEB</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>


                            </table>

                        </td>
                    </tr>

                    <tr class="hide">
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
                    </tr>

                </table>

                <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">
                    <tr>
                        <td align="center">
                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                                class="container590">

                                <tr>
                                    <td>
                                        <table border="0" align="left" cellpadding="0" cellspacing="0"
                                            style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                            class="container590">


                                            <tr>
                                                <td align="center">
                                                    <a href=""
                                                        style=" border-style: none !important; border: 0 !important;"><img
                                                            src="https://www.adharacancun.com/img/places/pool_20211.png"
                                                            style="display: block; width: 280px;" width="280" border="0"
                                                            alt="" /></a>
                                                </td>
                                            </tr>
                                        </table>

                                        <table border="0" width="5" align="left" cellpadding="0" cellspacing="0"
                                            style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                            class="container590">
                                            <tr>
                                                <td width="5" height="20" style="font-size: 20px; line-height: 20px;">
                                                    &nbsp;</td>
                                            </tr>
                                        </table>

                                        <table border="0" width="260" align="right" cellpadding="0" cellspacing="0"
                                            style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                            class="container590">
                                            <tr>
                                                <td align="left"
                                                    style="color: #3d3d3d; font-size: 22px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                                                    class="align-center main-header">


                                                    <div style="line-height: 35px">

                                                        Direction

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="15" style="font-size: 12px; line-height: 12px;">&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td align="left">
                                                    <table border="0" align="left" cellpadding="0" cellspacing="0"
                                                        class="container590">
                                                        <tr>
                                                            <td align="center">
                                                                <table align="center" width="40" border="0"
                                                                    cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                                                    <tr>
                                                                        <td height="2"
                                                                            style="font-size: 2px; line-height: 2px;">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="15" style="font-size: 12px; line-height: 12px;">&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td align="left"
                                                    style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;"
                                                    class="align-center">


                                                    <div style="line-height: 24px">

                                                        Av. Carlos Nader 1,2,3 SM.1,MZ.2 <br>
                                                        Cancún Quintana Roo, México <br>
                                                        CP: 77500

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                            </tr>


                                        </table>

                                    </td>
                                </tr>

                                <tr>
                                    <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
                                </tr>

                            </table>
                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                                class="container590">

                                <tr>
                                    <td>
                                        <table border="0" align="left" cellpadding="0" cellspacing="0"
                                            style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                            class="container590">


                                            <tr>
                                                <td align="center">
                                                    <a href=""
                                                        style=" border-style: none !important; border: 0 !important;"><img
                                                            src="https://www.adharacancun.com/img/places/adhara_van_desk_2021.png"
                                                            style="display: block; width: 280px;" width="280" border="0"
                                                            alt="" /></a>
                                                </td>
                                            </tr>
                                        </table>

                                        <table border="0" width="5" align="left" cellpadding="0" cellspacing="0"
                                            style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                            class="container590">
                                            <tr>
                                                <td width="5" height="20" style="font-size: 20px; line-height: 20px;">
                                                    &nbsp;</td>
                                            </tr>
                                        </table>

                                        <table border="0" width="260" align="right" cellpadding="0" cellspacing="0"
                                            style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                            class="container590">
                                            <tr>
                                                <td align="left"
                                                    style="color: #3d3d3d; font-size: 22px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                                                    class="align-center main-header">


                                                    <div style="line-height: 35px">

                                                        Contact

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="15" style="font-size: 12px; line-height: 12px;">&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td align="left">
                                                    <table border="0" align="left" cellpadding="0" cellspacing="0"
                                                        class="container590">
                                                        <tr>
                                                            <td align="center">
                                                                <table align="center" width="40" border="0"
                                                                    cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                                                    <tr>
                                                                        <td height="2"
                                                                            style="font-size: 2px; line-height: 2px;">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="15" style="font-size: 12px; line-height: 12px;">&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td align="left"
                                                    style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;"
                                                    class="align-center">


                                                    <div style="line-height: 24px">

                                                        Calling toll free at: 01 800 711-15-31 (México). <br>
                                                        Phone Number: +52 (998) 881 65 00 <br>
                                                        Fax: +52 (998) 884 83 76 <br>
                                                        Email 1: reservaciones@gphoteles.com <br>
                                                        Email 2: grupos@gphoteles.com <br>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                            </tr>


                                        </table>

                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>
