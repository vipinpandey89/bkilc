<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Bklic Card</title>

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
          width:85px;
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
          
            
                       
          <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">

                <table width="400" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                    <td align="center" valign="top">
                      <img src="http://bklic.komete.it/public/images/footer.jpg">
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

                <table width="500" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                    <td align="left" valign="top">
                      <p><!--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book--></p>
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

                <table width="400" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                      <td width="100" class="mobile" align="center" valign="top" style="padding: 0 10px 0 0">
                        <div class="qr_code" style=" height: 200px; width: 199px; border:1px solid #000;padding: 15px;">
                            <?php if(!empty($data->profileimage)){?>
                               <img style="width: 209px;height: 196px;" src="{{url('images/profile_images/'.$data->profileimage)}}">
                               <?php }else{?>
                                <img style="width: 209px;height: 196px;" src="{{url('front/assets/img/find_user.png')}}">
                               <?php }?> 
                          </div>
                      </td>
                      <td width="300" class="mobile" align="center" valign="top" style="padding: 0 0px 0 10px;">
                        <div class="card-box">
                          <table width="100%">
                            <tr>
                                <td>Nome</td>
                                <td><div class="name-field">{{$data->name}}</div></td>
                              </tr>
                              <tr>
                                <td>Cognome</td>
                                <td><div class="name-field">{{$data->userName}}</div></td>
                              </tr>
                              <tr>
                                <td>Data di nascita</td>
                                <td><div class="name-field">{{date('d-m-Y',strtotime($data->dob))}}</div></td>
                              </tr>
                             
                             <!--  <tr>
                                <td>Bklic Id</td>
                                <td><div class="name-field">#{{$data->id}}</div></td>
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

                <table width="400" cellpadding="0" cellspacing="0" border="0" class="container">
                  <tr>
                    <td align="center" valign="top">
                      <img src="http://bklic.komete.it/public/images/header.jpg">
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
