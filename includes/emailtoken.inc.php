<?php
include_once 'dbh.inc.php';
require_once 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);




// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('mypetizens@gmail.com')
  ->setPassword('');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($email, $token)
{
  global $mailer;
  $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

  <html
    xmlns="http://www.w3.org/1999/xhtml"
    xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:v="urn:schemas-microsoft-com:vml"
  >
    <head>
      <!--[if gte mso 9
        ]><xml
          ><o:OfficeDocumentSettings
            ><o:AllowPNG /><o:PixelsPerInch
              >96</o:PixelsPerInch
            ></o:OfficeDocumentSettings
          ></xml
        ><!
      [endif]-->
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <meta content="width=device-width" name="viewport" />
      <meta name="color-scheme" content="light only">
      <!--[if !mso]><!-->
      <meta content="IE=edge" http-equiv="X-UA-Compatible" />
      <!--<![endif]-->
      <title></title>
      <!--[if !mso]><!-->
      <link
        href="https://fonts.googleapis.com/css?family=Oswald"
        rel="stylesheet"
        type="text/css"
      />
      <!--<![endif]-->
      <style type="text/css">
        
        body {
          margin: 0;
          padding: 0;
        }
  
        table,
        td,
        tr {
          vertical-align: top;
          border-collapse: collapse;
        }
  
        * {
          line-height: inherit;
        }
  
        a[x-apple-data-detectors="true"] {
          color: inherit !important;
          text-decoration: none !important;
        }
      </style>
      <style id="media-query" type="text/css">
        @media (max-width: 560px) {
          .block-grid,
          .col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
  
          .block-grid {
            width: 100% !important;
          }
  
          .col {
            width: 100% !important;
          }
  
          .col > div {
            margin: 0 auto;
          }
  
          img.fullwidth,
          img.fullwidthOnMobile {
            max-width: 100% !important;
          }
  
          .no-stack .col {
            min-width: 0 !important;
            display: table-cell !important;
          }
  
          .no-stack.two-up .col {
            width: 50% !important;
          }
  
          .no-stack .col.num4 {
            width: 33% !important;
          }
  
          .no-stack .col.num8 {
            width: 66% !important;
          }
  
          .no-stack .col.num4 {
            width: 33% !important;
          }
  
          .no-stack .col.num3 {
            width: 25% !important;
          }
  
          .no-stack .col.num6 {
            width: 50% !important;
          }
  
          .no-stack .col.num9 {
            width: 75% !important;
          }
  
          .video-block {
            max-width: none !important;
          }
  
          .mobile_hide {
            min-height: 0px;
            max-height: 0px;
            max-width: 0px;
            display: none;
            overflow: hidden;
            font-size: 0px;
          }
  
          .desktop_hide {
            display: block !important;
            max-height: none !important;
          }
        }
      </style>
    </head>
    <body
      class="clean-body"
      style="
        margin: 0;
        padding: 0;
        -webkit-text-size-adjust: 100%;
        background-color: transparent;
      "
    >
      <!--[if IE]><div class="ie-browser"><![endif]-->
      <table
        bgcolor="transparent"
        cellpadding="0"
        cellspacing="0"
        class="nl-container"
        role="presentation"
        style="
          table-layout: fixed;
          vertical-align: top;
          min-width: 320px;
          margin: 0 auto;
          border-spacing: 0;
          border-collapse: collapse;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          background-color: transparent;
          width: 100%;
        "
        valign="top"
        width="100%"
      >
        <tbody>
          <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top;" valign="top">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:transparent"><![endif]-->
              <div
                style="
                  background-color: #4c4c4c;
                  border-top-left-radius: 40px;
                  border-top-right-radius: 40px;
                "
              >
                <div
                  class="block-grid"
                  style="
                    margin: 0 auto;
                    min-width: 320px;
                    max-width: 540px;
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                    word-break: break-word;
                    background-color: transparent;
                  "
                >
                  <div
                    style="
                      border-collapse: collapse;
                      display: table;
                      width: 100%;
                      background-color: transparent;
                    "
                  >
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#4c4c4c;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:540px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                    <!--[if (mso)|(IE)]><td align="center" width="540" style="background-color:transparent;width:540px; border-top: 0px solid #4C4C4C; border-left: 0px solid #4C4C4C; border-bottom: 0px solid #4C4C4C; border-right: 0px solid #4C4C4C;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
                    <div
                      class="col num12"
                      style="
                        min-width: 320px;
                        max-width: 540px;
                        display: table-cell;
                        vertical-align: top;
                        width: 540px;
                      "
                    >
                      <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                          style="
                            border-top: 0px solid #4c4c4c;
                            border-left: 0px solid #4c4c4c;
                            border-bottom: 0px solid #4c4c4c;
                            border-right: 0px solid #4c4c4c;
                            padding-top: 0px;
                            padding-bottom: 0px;
                            padding-right: 0px;
                            padding-left: 0px;
                          "
                        >
                          <!--<![endif]-->
                          <table
                            border="0"
                            cellpadding="0"
                            cellspacing="0"
                            class="divider"
                            role="presentation"
                            style="
                              table-layout: fixed;
                              vertical-align: top;
                              border-spacing: 0;
                              border-collapse: collapse;
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              min-width: 100%;
                              -ms-text-size-adjust: 100%;
                              -webkit-text-size-adjust: 100%;
                            "
                            valign="top"
                            width="100%"
                          >
                            <tbody>
                              <tr style="vertical-align: top;" valign="top">
                                <td
                                  class="divider_inner"
                                  style="
                                    word-break: break-word;
                                    vertical-align: top;
                                    min-width: 100%;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                    padding-top: 10px;
                                    padding-right: 10px;
                                    padding-bottom: 10px;
                                    padding-left: 10px;
                                  "
                                  valign="top"
                                >
                                  <table
                                    align="center"
                                    border="0"
                                    cellpadding="0"
                                    cellspacing="0"
                                    class="divider_content"
                                    role="presentation"
                                    style="
                                      table-layout: fixed;
                                      vertical-align: top;
                                      border-spacing: 0;
                                      border-collapse: collapse;
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      border-top: 1px solid #bbbbbb;
                                      width: 100%;
                                    "
                                    valign="top"
                                    width="100%"
                                  >
                                    <tbody>
                                      <tr
                                        style="vertical-align: top;"
                                        valign="top"
                                      >
                                        <td
                                          style="
                                            word-break: break-word;
                                            vertical-align: top;
                                            -ms-text-size-adjust: 100%;
                                            -webkit-text-size-adjust: 100%;
                                          "
                                          valign="top"
                                        >
                                          <span></span>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                      </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <div style="background-color: #4c4c4c;">
                <div
                  class="block-grid"
                  style="
                    margin: 0 auto;
                    min-width: 320px;
                    max-width: 540px;
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                    word-break: break-word;
                    background-color: transparent;
                  "
                >
                  <div
                    style="
                      border-collapse: collapse;
                      display: table;
                      width: 100%;
                      background-color: transparent;
                    "
                  >
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#4c4c4c;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:540px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                    <!--[if (mso)|(IE)]><td align="center" width="540" style="background-color:transparent;width:540px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top:10px; padding-bottom:10px;"><![endif]-->
                    <div
                      class="col num12"
                      style="
                        min-width: 320px;
                        max-width: 540px;
                        display: table-cell;
                        vertical-align: top;
                        width: 540px;
                      "
                    >
                      <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                          style="
                            border-top: 0px solid transparent;
                            border-left: 0px solid transparent;
                            border-bottom: 0px solid transparent;
                            border-right: 0px solid transparent;
                            padding-top: 10px;
                            padding-bottom: 10px;
                            padding-right: 25px;
                            padding-left: 25px;
                          "
                        >
                          <!--<![endif]-->
                          <div
                            align="center"
                            class="img-container center autowidth"
                            style="padding-right: 0px; padding-left: 0px;"
                          >
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><!
                            [endif]--><img
                              align="center"
                              alt="Alternate text"
                              border="0"
                              class="center autowidth"
                              src="https://petizens.xyz/newsletters/images/d3cab86b-2122-453f-9196-86cecd7be193.jpg"
                              style="
                                text-decoration: none;
                                -ms-interpolation-mode: bicubic;
                                height: auto;
                                border: 0;
                                width: 100%;
                                max-width: 490px;
                                display: block;
                              "
                              title="Alternate text"
                              width="490"
                            />
                            <!--[if mso]></td></tr></table><![endif]-->
                          </div>
                          <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                      </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <div style="background-color: #4c4c4c;">
                <div
                  class="block-grid"
                  style="
                    margin: 0 auto;
                    min-width: 320px;
                    max-width: 540px;
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                    word-break: break-word;
                    background-color: transparent;
                  "
                >
                  <div
                    style="
                      border-collapse: collapse;
                      display: table;
                      width: 100%;
                      background-color: transparent;
                    "
                  >
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#4c4c4c;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:540px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                    <!--[if (mso)|(IE)]><td align="center" width="540" style="background-color:transparent;width:540px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top:0px; padding-bottom:0px;"><![endif]-->
                    <div
                      class="col num12"
                      style="
                        min-width: 320px;
                        max-width: 540px;
                        display: table-cell;
                        vertical-align: top;
                        width: 540px;
                      "
                    >
                      <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                          style="
                            border-top: 0px solid transparent;
                            border-left: 0px solid transparent;
                            border-bottom: 0px solid transparent;
                            border-right: 0px solid transparent;
                            padding-top: 0px;
                            padding-bottom: 0px;
                            padding-right: 20px;
                            padding-left: 20px;
                          "
                        >
                          <!--<![endif]-->
                          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                          <div
                            style="
                              color: #ffffff;
                              line-height: 1.2;
                              padding-top: 0px;
                              padding-right: 10px;
                              padding-bottom: 10px;
                              padding-left: 10px;
                            "
                          >
                            <div
                              style="
                                font-size: 14px;
                                line-height: 1.2;
                                color: #ffffff;
                                mso-line-height-alt: 17px;
                              "
                            >
                              <p
                                style="
                                  font-size: 58px;
                                  line-height: 1.2;
                                  text-align: center;
                                  word-break: break-word;
                                  mso-line-height-alt: 70px;
                                  margin: 0;
                                "
                              >
                                <span style="font-size: 58px;"
                                  >Thanks For Joining!</span
                                >
                              </p>
                            </div>
                          </div>
                          <!--[if mso]></td></tr></table><![endif]-->
                          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                          <div
                            style="
                              color: #ffffff;
                              font-family: Nunito, Arial, Helvetica Neue,
                                Helvetica, sans-serif;
                              line-height: 1.2;
                              padding-top: 0px;
                              padding-right: 10px;
                              padding-bottom: 10px;
                              padding-left: 10px;
                            "
                          >
                            <div
                              style="
                                font-size: 14px;
                                line-height: 1.2;
                                color: #ffffff;
                                font-family: Nunito, Arial, Helvetica Neue,
                                  Helvetica, sans-serif;
                                mso-line-height-alt: 17px;
                              "
                            >
                              <p
                                style="
                                  font-size: 22px;
                                  line-height: 1.2;
                                  word-break: break-word;
                                  text-align: center;
                                  mso-line-height-alt: 26px;
                                  margin: 0;
                                "
                              >
                                <span style="font-size: 22px;"
                                  >We Need You To Verify Your Email!</span
                                >
                              </p>
                            </div>
                          </div>
                          <!--[if mso]></td></tr></table><![endif]-->
                          <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                      </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <div
                style="background-image: url(https://petizens.xyz/newsletters/images/bg_Centrale.png);
                  background-position: center top;
                  background-repeat: no-repeat;
                  background-color: #93dbab;"
              >
                <div
                  class="block-grid"
                  style="
                    margin: 0 auto;
                    min-width: 320px;
                    max-width: 540px;
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                    word-break: break-word;
                    background-color: transparent;
                  "
                >
                  <div
                    style="
                      border-collapse: collapse;
                      display: table;
                      width: 100%;
                      background-color: transparent;
                    "
                  >
                    <div
                      class="col num12"
                      style="
                        min-width: 320px;
                        max-width: 540px;
                        display: table-cell;
                        vertical-align: top;
                        width: 540px;
                      "
                    >
                      <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                          style="
                            border-top: 0px solid transparent;
                            border-left: 0px solid transparent;
                            border-bottom: 0px solid transparent;
                            border-right: 0px solid transparent;
                            padding-top: 5px;
                            padding-bottom: 0px;
                            padding-right: 10px;
                            padding-left: 10px;
                          "
                        >
                          <!--<![endif]-->
                          <table
                            border="0"
                            cellpadding="0"
                            cellspacing="0"
                            class="divider"
                            role="presentation"
                            style="
                              table-layout: fixed;
                              vertical-align: top;
                              border-spacing: 0;
                              border-collapse: collapse;
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              min-width: 100%;
                              -ms-text-size-adjust: 100%;
                              -webkit-text-size-adjust: 100%;
                            "
                            valign="top"
                            width="100%"
                          >
                            <tbody>
                              <tr style="vertical-align: top;" valign="top">
                                <td
                                  class="divider_inner"
                                  style="
                                    word-break: break-word;
                                    vertical-align: top;
                                    min-width: 100%;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                    padding-top: 10px;
                                    padding-right: 10px;
                                    padding-bottom: 10px;
                                    padding-left: 10px;
                                  "
                                  valign="top"
                                >
                                  <table
                                    align="center"
                                    border="0"
                                    cellpadding="0"
                                    cellspacing="0"
                                    class="divider_content"
                                    role="presentation"
                                    style="
                                      table-layout: fixed;
                                      vertical-align: top;
                                      border-spacing: 0;
                                      border-collapse: collapse;
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      border-top: 3px solid #4c4c4c;
                                      width: 100%;
                                    "
                                    valign="top"
                                    width="100%"
                                  >
                                    <tbody>
                                      <tr
                                        style="vertical-align: top;"
                                        valign="top"
                                      >
                                        <td
                                          style="
                                            word-break: break-word;
                                            vertical-align: top;
                                            -ms-text-size-adjust: 100%;
                                            -webkit-text-size-adjust: 100%;
                                          "
                                          valign="top"
                                        >
                                          <span></span>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <div
                            align="center"
                            class="img-container center fixedwidth"
                            style="padding-right: 0px; padding-left: 0px;"
                          >
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><!
                            [endif]--><img
                              align="center"
                              alt="Image"
                              border="0"
                              class="center fixedwidth"
                              src="https://petizens.xyz/newsletters/images/54d95bca-72cd-4e07-924d-7e07e3eb8502.png"
                              style="
                                text-decoration: none;
                                -ms-interpolation-mode: bicubic;
                                height: auto;
                                border: 0;
                                width: 100%;
                                max-width: 182px;
                                display: block;
                              "
                              title="Image"
                              width="182"
                            />
                            <div style="font-size: 1px; line-height: 20px;"></div>
                            <!--[if mso]></td></tr></table><![endif]-->
                          </div>
                          <div
                            align="center"
                            class="button-container"
                            style="
                              padding-top: 10px;
                              padding-right: 10px;
                              padding-bottom: 10px;
                              padding-left: 10px;
                            "
                          >
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://www.petizens.xyz/verify?token=' . $token . '" style="height:34.5pt; width:294.75pt; v-text-anchor:middle;" arcsize="33%" stroke="false" fillcolor="#4c4c4c"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#93dbab; font-family:Arial, sans-serif; font-size:18px"><!
                            [endif]--><a
                              href="http://www.petizens.xyz/verify?token=' . $token . '"
                              style="
                                -webkit-text-size-adjust: none;
                                text-decoration: none;
                                display: inline-block;
                                color: #93dbab;
                                background-color: #4c4c4c;
                                border-radius: 15px;
                                -webkit-border-radius: 15px;
                                -moz-border-radius: 15px;
                                width: auto;
                                width: auto;
                                border-top: 1px solid #4c4c4c;
                                border-right: 1px solid #4c4c4c;
                                border-bottom: 1px solid #4c4c4c;
                                border-left: 1px solid #4c4c4c;
                                padding-top: 5px;
                                padding-bottom: 5px;
                                font-family: Nunito, Arial, Helvetica Neue,
                                  Helvetica, sans-serif;
                                text-align: center;
                                mso-border-alt: none;
                                word-break: keep-all;
                              "
                              target="_blank"
                              ><span
                                style="
                                  padding-left: 35px;
                                  padding-right: 35px;
                                  font-size: 18px;
                                  display: inline-block;
                                "
                                ><span
                                  style="
                                    font-size: 16px;
                                    line-height: 2;
                                    word-break: break-word;
                                    mso-line-height-alt: 32px;
                                  "
                                  ><span
                                    data-mce-style="font-size: 18px; line-height: 36px;"
                                    style="font-size: 18px; line-height: 36px;"
                                    >Click Here To Verify Your Email!</span
                                  ></span
                                ></span
                              ></a
                            >
                            <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                          </div>
                          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                          <div
                            style="
                              color: #000000;
                              font-family: Nunito, Arial, Helvetica Neue,
                                Helvetica, sans-serif;
                              line-height: 1.2;
                              padding-top: 0px;
                              padding-right: 10px;
                              padding-bottom: 10px;
                              padding-left: 10px;
                            "
                          >
                            <div
                              style="
                                font-size: 14px;
                                line-height: 1.2;
                                color: #000000;
                                font-family: Nunito, Arial, Helvetica Neue,
                                  Helvetica, sans-serif;
                                mso-line-height-alt: 17px;
                              "
                            >
                              <p
                                style="
                                  font-size: 22px;
                                  line-height: 1.2;
                                  word-break: break-word;
                                  text-align: center;
                                  mso-line-height-alt: 26px;
                                  margin: 0;
                                "
                              >
                                <span style="font-size: 22px;"
                                  >We look forward to seeing what you have to
                                  post!</span
                                >
                              </p>
                            </div>
                          </div>
                          <!--[if mso]></td></tr></table><![endif]-->
                          <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                      </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <div
                style="
                  background-image: url(https://petizens.xyz/newsletters/images/bg_Bottom.png);
                  background-position: top center;
                  background-repeat: no-repeat;
                  background-color: #93dbab;
                "
              >
                <div
                  class="block-grid"
                  style="
                    margin: 0 auto;
                    min-width: 320px;
                    max-width: 540px;
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                    word-break: break-word;
                    background-color: transparent;
                  "
                >
                  <div
                    style="
                      border-collapse: collapse;
                      display: table;
                      width: 100%;
                      background-color: transparent;
                    "
                  >
                      <div
                      class="col num12"
                      style="
                        min-width: 320px;
                        max-width: 540px;
                        display: table-cell;
                        vertical-align: top;
                        width: 540px;
                      "
                    >
                      <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                          style="
                            border-top: 0px solid transparent;
                            border-left: 0px solid transparent;
                            border-bottom: 0px solid transparent;
                            border-right: 0px solid transparent;
                            padding-top: 10px;
                            padding-bottom: 0px;
                            padding-right: 0px;
                            padding-left: 0px;
                          "
                        >
                          <!--<![endif]-->
                          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 0px; padding-bottom: 0px; font-family: Arial, sans-serif"><![endif]-->
                          <div
                            style="
                              color: #000000;
                              font-family: Nunito, Arial, Helvetica Neue,
                                Helvetica, sans-serif;
                              line-height: 1.5;
                              padding-top: 0px;
                              padding-right: 0px;
                              padding-bottom: 0px;
                              padding-left: 0px;
                            "
                          >
                            <div
                              style="
                                font-size: 14px;
                                line-height: 1.5;
                                color: #000000;
                                font-family: Nunito, Arial, Helvetica Neue,
                                  Helvetica, sans-serif;
                                mso-line-height-alt: 21px;
                              "
                            >
                              <p
                                style="
                                  font-size: 22px;
                                  line-height: 1.5;
                                  word-break: break-word;
                                  text-align: center;
                                  mso-line-height-alt: 33px;
                                  margin: 0;
                                "
                              >
                                <span style="font-size: 22px;"
                                  >Didnt Sign Up?
                                  <a
                                    href=https://petizens.xyz/contacts
                                    rel="noopener"
                                    style="
                                      text-decoration: underline;
                                      color: #0667a1;
                                    "
                                    target="_blank"
                                    >Contact Us</a
                                  >.</span
                                >
                              </p>
                            </div>
                          </div>
                          <!--[if mso]></td></tr></table><![endif]-->
                          <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                      </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <div style="background-color: #93dbab;">
                <div
                  class="block-grid"
                  style="
                    margin: 0 auto;
                    min-width: 320px;
                    max-width: 540px;
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                    word-break: break-word;
                    background-color: transparent;
                  "
                >
                  <div
                    style="
                      border-collapse: collapse;
                      display: table;
                      width: 100%;
                      background-color: transparent;
                    "
                  >
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#93dbab;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:540px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                    <!--[if (mso)|(IE)]><td align="center" width="540" style="background-color:transparent;width:540px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                    <div
                      class="col num12"
                      style="
                        min-width: 320px;
                        max-width: 540px;
                        display: table-cell;
                        vertical-align: top;
                        width: 540px;
                      "
                    >
                      <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                          style="
                            border-top: 0px solid transparent;
                            border-left: 0px solid transparent;
                            border-bottom: 0px solid transparent;
                            border-right: 0px solid transparent;
                            padding-top: 5px;
                            padding-bottom: 5px;
                            padding-right: 0px;
                            padding-left: 0px;
                          "
                        >
                          <!--<![endif]-->
                          <table
                            border="0"
                            cellpadding="0"
                            cellspacing="0"
                            class="divider"
                            role="presentation"
                            style="
                              table-layout: fixed;
                              vertical-align: top;
                              border-spacing: 0;
                              border-collapse: collapse;
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              min-width: 100%;
                              -ms-text-size-adjust: 100%;
                              -webkit-text-size-adjust: 100%;
                            "
                            valign="top"
                            width="100%"
                          >
                            <tbody>
                              <tr style="vertical-align: top;" valign="top">
                                <td
                                  class="divider_inner"
                                  style="
                                    word-break: break-word;
                                    vertical-align: top;
                                    min-width: 100%;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                    padding-top: 10px;
                                    padding-right: 10px;
                                    padding-bottom: 10px;
                                    padding-left: 10px;
                                  "
                                  valign="top"
                                >
                                  <table
                                    align="center"
                                    border="0"
                                    cellpadding="0"
                                    cellspacing="0"
                                    class="divider_content"
                                    role="presentation"
                                    style="
                                      table-layout: fixed;
                                      vertical-align: top;
                                      border-spacing: 0;
                                      border-collapse: collapse;
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      border-top: 3px solid #4c4c4c;
                                      width: 100%;
                                    "
                                    valign="top"
                                    width="100%"
                                  >
                                    <tbody>
                                      <tr
                                        style="vertical-align: top;"
                                        valign="top"
                                      >
                                        <td
                                          style="
                                            word-break: break-word;
                                            vertical-align: top;
                                            -ms-text-size-adjust: 100%;
                                            -webkit-text-size-adjust: 100%;
                                          "
                                          valign="top"
                                        >
                                          <span></span>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                      </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <div style="background-color: #4c4c4c;">
                <div
                  class="block-grid"
                  style="
                    margin: 0 auto;
                    min-width: 320px;
                    max-width: 540px;
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                    word-break: break-word;
                    background-color: transparent;
                  "
                >
                  <div
                    style="
                      border-collapse: collapse;
                      display: table;
                      width: 100%;
                      background-color: transparent;
                    "
                  >
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#4c4c4c;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:540px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                    <!--[if (mso)|(IE)]><td align="center" width="540" style="background-color:transparent;width:540px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top:10px; padding-bottom:10px;"><![endif]-->
                    <div
                      class="col num12"
                      style="
                        min-width: 320px;
                        max-width: 540px;
                        display: table-cell;
                        vertical-align: top;
                        width: 540px;
                      "
                    >
                      <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                          style="
                            border-top: 0px solid transparent;
                            border-left: 0px solid transparent;
                            border-bottom: 0px solid transparent;
                            border-right: 0px solid transparent;
                            padding-top: 10px;
                            padding-bottom: 10px;
                            padding-right: 20px;
                            padding-left: 20px;
                          "
                        >
                          <!--<![endif]-->
                          <table
                            cellpadding="0"
                            cellspacing="0"
                            class="social_icons"
                            role="presentation"
                            style="
                              table-layout: fixed;
                              vertical-align: top;
                              border-spacing: 0;
                              border-collapse: collapse;
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                            "
                            valign="top"
                            width="100%"
                          >
                            <tbody>
                              <tr style="vertical-align: top;" valign="top">
                                <td
                                  style="
                                    word-break: break-word;
                                    vertical-align: top;
                                    padding-top: 10px;
                                    padding-right: 10px;
                                    padding-bottom: 10px;
                                    padding-left: 10px;
                                  "
                                  valign="top"
                                >
                                  <table
                                    align="center"
                                    cellpadding="0"
                                    cellspacing="0"
                                    class="social_table"
                                    role="presentation"
                                    style="
                                      table-layout: fixed;
                                      vertical-align: top;
                                      border-spacing: 0;
                                      border-collapse: collapse;
                                      mso-table-tspace: 0;
                                      mso-table-rspace: 0;
                                      mso-table-bspace: 0;
                                      mso-table-lspace: 0;
                                    "
                                    valign="top"
                                  >
                                    <tbody>
                                      <tr
                                        align="center"
                                        style="
                                          vertical-align: top;
                                          display: inline-block;
                                          text-align: center;
                                        "
                                        valign="top"
                                      >
                                        <td
                                          style="
                                            word-break: break-word;
                                            vertical-align: top;
                                            padding-bottom: 0;
                                            padding-right: 4px;
                                            padding-left: 4px;
                                          "
                                          valign="top"
                                        >
                                          <a
                                            href="https://www.facebook.com/"
                                            target="_blank"
                                            ><img
                                              alt="Facebook"
                                              height="32"
                                              src="https://petizens.xyz/newsletters/images/facebook4x.png"
                                              style="
                                                text-decoration: none;
                                                -ms-interpolation-mode: bicubic;
                                                height: auto;
                                                border: 0;
                                                display: block;
                                              "
                                              title="Facebook"
                                              width="32"
                                          /></a>
                                        </td>
                                        <td
                                          style="
                                            word-break: break-word;
                                            vertical-align: top;
                                            padding-bottom: 0;
                                            padding-right: 4px;
                                            padding-left: 4px;
                                          "
                                          valign="top"
                                        >
                                          <a
                                            href="https://twitter.com/"
                                            target="_blank"
                                            ><img
                                              alt="Twitter"
                                              height="32"
                                              src="https://petizens.xyz/newsletters/images/twitter4x.png"
                                              style="
                                                text-decoration: none;
                                                -ms-interpolation-mode: bicubic;
                                                height: auto;
                                                border: 0;
                                                display: block;
                                              "
                                              title="Twitter"
                                              width="32"
                                          /></a>
                                        </td>
                                        <td
                                          style="
                                            word-break: break-word;
                                            vertical-align: top;
                                            padding-bottom: 0;
                                            padding-right: 4px;
                                            padding-left: 4px;
                                          "
                                          valign="top"
                                        >
                                          <a
                                            href="https://instagram.com/"
                                            target="_blank"
                                            ><img
                                              alt="Instagram"
                                              height="32"
                                              src="https://petizens.xyz/newsletters/images/instagram4x.png"
                                              style="
                                                text-decoration: none;
                                                -ms-interpolation-mode: bicubic;
                                                height: auto;
                                                border: 0;
                                                display: block;
                                              "
                                              title="Instagram"
                                              width="32"
                                          /></a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <div
                            align="center"
                            class="img-container center autowidth"
                            style="padding-right: 0px; padding-left: 0px;"
                          >
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
                            <div style="font-size: 1px; line-height: 15px;"></div>
                            <img
                              align="center"
                              alt="Image"
                              border="0"
                              class="center autowidth"
                              src="https://petizens.xyz/newsletters/images/divider.png"
                              style="
                                text-decoration: none;
                                -ms-interpolation-mode: bicubic;
                                height: auto;
                                border: 0;
                                width: 100%;
                                max-width: 385px;
                                display: block;
                              "
                              title="Image"
                              width="385"
                            />
                            <div style="font-size: 1px; line-height: 15px;"></div>
                            <!--[if mso]></td></tr></table><![endif]-->
                          </div>
                          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                          <div
                            style="
                              color: #93dbab;
                              font-family: Nunito, Arial, Helvetica Neue,
                                Helvetica, sans-serif;
                              line-height: 1.5;
                              padding-top: 0px;
                              padding-right: 10px;
                              padding-bottom: 10px;
                              padding-left: 10px;
                            "
                          >
                            <div
                              style="
                                font-size: 14px;
                                line-height: 1.5;
                                color: #93dbab;
                                font-family: Nunito, Arial, Helvetica Neue,
                                  Helvetica, sans-serif;
                                mso-line-height-alt: 21px;
                              "
                            >
                              <p
                                style="
                                  font-size: 16px;
                                  line-height: 1.5;
                                  word-break: break-word;
                                  text-align: center;
                                  mso-line-height-alt: 24px;
                                  margin: 0;
                                "
                              >
                                <span style="font-size: 16px;"
                                  ><strong
                                    ><span style="color: #93dbab;"
                                      >Petizens</span
                                    ></strong
                                  ></span
                                >
                              </p>
                              <p
                                style="
                                  text-align: center;
                                  line-height: 1.5;
                                  word-break: break-word;
                                  mso-line-height-alt: 21px;
                                  margin: 0;
                                "
                              >
                                © 2020 Created By Tofazzal. All Rights Reserved.
                              </p>
                              <p
                                style="
                                  text-align: center;
                                  line-height: 1.5;
                                  word-break: break-word;
                                  mso-line-height-alt: 21px;
                                  margin: 0;
                                "
                              >
                                <a
                                  href="https://petizens.xyz/privacy-policy"
                                  rel="noopener"
                                  style="
                                    text-decoration: underline;
                                    color: #0068a5;
                                  "
                                  target="_blank"
                                  >Privacy Policy</a
                                >
                                and
                                <a
                                  href="https://petizens.xyz/terms-and-conditions"
                                  rel="noopener"
                                  style="
                                    text-decoration: underline;
                                    color: #0068a5;
                                  "
                                  target="_blank"
                                  >Terms &amp; Conditions</a
                                >
                              </p>
                            </div>
                          </div>
                          <!--[if mso]></td></tr></table><![endif]-->
                          <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                      </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <div
                style="
                  background-color: #4c4c4c;
                  border-bottom-left-radius: 40px;
                  border-bottom-right-radius: 40px;
                "
              >
                <div
                  class="block-grid"
                  style="
                    margin: 0 auto;
                    min-width: 320px;
                    max-width: 540px;
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                    word-break: break-word;
                    background-color: transparent;
                  "
                >
                  <div
                    style="
                      border-collapse: collapse;
                      display: table;
                      width: 100%;
                      background-color: transparent;
                    "
                  >
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#4c4c4c;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:540px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                    <!--[if (mso)|(IE)]><td align="center" width="540" style="background-color:transparent;width:540px; border-top: 0px solid #4C4C4C; border-left: 0px solid #4C4C4C; border-bottom: 0px solid #4C4C4C; border-right: 0px solid #4C4C4C;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
                    <div
                      class="col num12"
                      style="
                        min-width: 320px;
                        max-width: 540px;
                        display: table-cell;
                        vertical-align: top;
                        width: 540px;
                      "
                    >
                      <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                          style="
                            border-top: 0px solid #4c4c4c;
                            border-left: 0px solid #4c4c4c;
                            border-bottom: 0px solid #4c4c4c;
                            border-right: 0px solid #4c4c4c;
                            padding-top: 0px;
                            padding-bottom: 0px;
                            padding-right: 0px;
                            padding-left: 0px;
                          "
                        >
                          <!--<![endif]-->
                          <table
                            border="0"
                            cellpadding="0"
                            cellspacing="0"
                            class="divider"
                            role="presentation"
                            style="
                              table-layout: fixed;
                              vertical-align: top;
                              border-spacing: 0;
                              border-collapse: collapse;
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              min-width: 100%;
                              -ms-text-size-adjust: 100%;
                              -webkit-text-size-adjust: 100%;
                            "
                            valign="top"
                            width="100%"
                          >
                            <tbody>
                              <tr style="vertical-align: top;" valign="top">
                                <td
                                  class="divider_inner"
                                  style="
                                    word-break: break-word;
                                    vertical-align: top;
                                    min-width: 100%;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                    padding-top: 10px;
                                    padding-right: 10px;
                                    padding-bottom: 10px;
                                    padding-left: 10px;
                                  "
                                  valign="top"
                                >
                                  <table
                                    align="center"
                                    border="0"
                                    cellpadding="0"
                                    cellspacing="0"
                                    class="divider_content"
                                    role="presentation"
                                    style="
                                      table-layout: fixed;
                                      vertical-align: top;
                                      border-spacing: 0;
                                      border-collapse: collapse;
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      border-top: 1px solid #bbbbbb;
                                      width: 100%;
                                    "
                                    valign="top"
                                    width="100%"
                                  >
                                    <tbody>
                                      <tr
                                        style="vertical-align: top;"
                                        valign="top"
                                      >
                                        <td
                                          style="
                                            word-break: break-word;
                                            vertical-align: top;
                                            -ms-text-size-adjust: 100%;
                                            -webkit-text-size-adjust: 100%;
                                          "
                                          valign="top"
                                        >
                                          <span></span>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                      </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
          </tr>
        </tbody>
      </table>
      <!--[if (IE)]></div><![endif]-->
    </body>
  </html>';

  // Create a message
  $message = (new Swift_Message('Petizens: Email Verification!'))
    ->setFrom(['mypetizens@gmail.com'])
    ->setTo([$email])
    ->setBody($body, 'text/html');

  // Send the message
  $result = $mailer->send($message);
}
