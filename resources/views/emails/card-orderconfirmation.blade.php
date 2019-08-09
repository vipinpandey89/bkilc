<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Mail Confirmation</title>

  <style type="text/css">
    
    /* Outlines the grids, remove when sending */
    /*table td { border: 1px solid cyan; }*/

    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Arial, Helvetica, sans-serif;}
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }

    /* MEDIA QUERIES */
    @media all and (max-width:639px){ 
      .wrapper{ width:320px!important; padding: 0 !important; }
      .container{ width:300px!important;  padding: 0 !important; }
      .mobile{ width:300px!important; display:block!important; padding: 0 !important; }
      .img{ width:100% !important; height:auto !important; }
      *[class="mobileOff"] { width: 0px !important; display: none !important; }
      *[class*="mobileOn"] { display: block !important; max-height:none !important; }
    }
      
    p{font-size: 18px;}
      .qr_code ,.card-box{
          height: 200px;
          border:1px solid #000;
          padding: 15px;
      }
      .name-field{
          border-bottom: 1px solid;
          height: 36px;
          line-height:36px;
      }
      
  </style>    
</head>
<body style="margin:0; padding:0; background-color:#F2F2F2;">
  
  <span style="display: block; width: 640px !important; max-width: 640px; height: 1px" class="mobileOff"></span>
  
  <center>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
      <tr>
        <td align="center" valign="top">
            
            <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">

                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                    <td align="center" valign="top">
                      <h3 style="color: green">Thank you for your order</h3>
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
          </table>
            
            <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">

                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                    <td align="left" valign="top">
                      <table width="100%">
                        <thead>
                            <tr>
                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">TXN ID</th>
                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">Articolo</th>
                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">Descrizione</th>
                               
                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">Qty</th>
                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">Totale</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">#{{$orderDetail->txn_id}}</td>
                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">{{$orderDetail->product_name}}</td>
                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">
                                Sottoscrizione 1 mese</td>
                                
                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">1</td>
                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">{{$orderDetail->product_price}}</td>
                            </tr>
                              
                              <tr>
                                <td align="right" height="32px" style="border-top: 2px solid #f1f1f1; border-bottom: 2px solid #f1f1f1; padding: 10px 15px; font-size: 20px; font-weight: bold" bgcolor="#fff" colspan="5">TOTAL</td>
                                <td align="left" height="32px" style="border-top: 2px solid #f1f1f1; border-bottom: 2px solid #f1f1f1; padding: 10px 15px; font-size: 20px; font-weight: bold" bgcolor="#fff">{{$orderDetail->paidAmount}}</td>
                            </tr>
                          </tbody>
                        </table>
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
          </table>
            
          <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">

                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                    <td align="center" valign="top">
                      <img src="http://localhost/bklic/public/images/header.jpg'">
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
          </table>

          <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">

                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                    <td align="left" valign="top">
                      <p><!--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.--></p>
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
          </table>

          <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
             <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">

                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                      <td width="200" class="mobile" align="center" valign="top" style="padding: 0 10px 0 0">
                        <div class="qr_code">
                         <img src="http://localhost/bklic/public/images/footer.jpg">
                        </div>
                      </td>
                      <td width="400" class="mobile" align="center" valign="top" style="padding: 0 0px 0 10px;">
                        <div class="card-box">
                          <table width="100%">
                            <tr>
                                <td>Nome</td>
                                <td><div class="name-field">{{$user->name}}</div></td>
                              </tr>
                              <tr>
                                <td>Cognome</td>
                                <td><div class="name-field">{{$user->userName}}</div></td>
                              </tr>
                              <tr>
                                <td>N Tesserino</td>
                                <td><div class="name-field">Name Title</div></td>
                              </tr>
                              <tr>
                                <td>Anno</td>
                                <td><div class="name-field">2019</div></td>
                              </tr>
                             <!--  <tr>
                                <td>Bklic ID</td>
                                <td><div class="name-field">{{$user->id}}</div></td>
                              </tr> -->
                            </table>
                        </div>
                      </td>
                  </tr>
                </table>

              </td>
            </tr>
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
          </table>
            
            <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">

                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                    <td align="center" valign="top">
                      <img src="http://localhost/bklic/public/images/footer.jpg">
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
          </table>

        </td>
      </tr>
    </table>
  </center>
</body>
</html>
