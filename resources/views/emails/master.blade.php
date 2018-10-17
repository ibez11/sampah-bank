<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title')</title>

  </head>
  <body class="" style="background-color: #f6f6f6;font-family: sans-serif;-webkit-font-smoothing: antialiased;font-size: 14px;line-height: 1.4;margin: 0;padding: 0;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;display: block;max-width: 580px;padding: 0 !important;width: 100% !important;margin: 0 auto !important;">
          <div class="content" style="box-sizing: border-box;display: block;margin: 0 auto;max-width: 580px;padding: 0 !important;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent;display: none;height: 0;max-height: 0;max-width: 0;opacity: 0;overflow: hidden;mso-hide: all;visibility: hidden;width: 0;font-size: 16px !important;">@yield('title')</span>
            <table class="main" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;background: #ffffff;border-radius: 0 !important;border-left-width: 0 !important;border-right-width: 0 !important;">
              <!-- HEADER -->
              <tr class="header" style="background: transparent; border-bottom: 1px solid #333;">
                <td style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;"><img src="http://tdbangarna.com/img/tdb.png" style="border: none;-ms-interpolation-mode: bicubic;max-width: 100%;height: 50px;padding: 10px; "></td>
              </tr>
              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;box-sizing: border-box;padding: 10px !important;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;">
                        @yield('content')

                        <!-- footer -->
                          <br/>
                        <p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Regards,</p>
                        <br/><br/>
                          <p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Tuan Di Bangarna Bank</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both;margin-top: 10px;text-align: center;width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;padding-bottom: 10px;padding-top: 10px;color: #999999;text-align: center;">
                    <span class="apple-link" style="color: #999999;font-size: 16px !important;text-align: center;">Tuan Di Bangarna Bank</span>
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
