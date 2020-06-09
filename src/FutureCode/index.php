<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-04-01
 */

$apiUrl = "https://gx.opera-api.com/api/v1/games?country=br&language=pt";
require 'SendGmail.php';
$send = new \SendEmail\SendGmail();

$content = array();

$operaGX = file_get_contents($apiUrl);
$operaGX = json_decode($operaGX, true);
$operaGX = $operaGX['sections'];

$count = 1;

foreach ($operaGX as $row) {
    if ($row['id'] == 'free_games') {
        foreach ($row['items'] as $games) {

            if ($count == 1) {

                $game .= '
                     <tr style="border-collapse:collapse;"> 
                          <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;"> 
                           <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                             <tr style="border-collapse:collapse;"> 
                              <td class="es-m-p20b" width="174" align="left" style="padding:0;Margin:0;"> 
                               <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                                    <tr style="border-collapse:collapse;">  
                                        <td align="center" style="padding:0;Margin:0;"><a target="_blank" href="' . $games['url_store'] . '" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:14px;text-decoration:underline;color:#DBDBDB;"><img class="adapt-img" src="' . $games['thumbnail_file'] . '" width="173" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
                                    </tr> 
                                    <tr style="border-collapse:collapse;"> 
                                      <td align="left" style="padding:0;Margin:0;padding-bottom:5px;padding-top:10px;"><h3 style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#DBDBDB;">' . $games['title'] . '</h3></td> 
                                     </tr> 
                                     <tr style="border-collapse:collapse;"> 
                                      <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#A2A2A2;"><span class="product-description">' . strtoupper($games['publisher_id']) . '</span></p></td> 
                                     </tr> 
                                     <tr style="border-collapse:collapse;"> 
                                      <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;padding-top:5px;"><h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;color:#DBDBDB;"><span class="price">FREE</span></h4></td> 
                                     </tr>
                                     <tr style="border-collapse:collapse;"> 
                                      <td align="left" style="padding:0;Margin:0;padding-top:15px;"><span class="es-button-border" style="border-style:solid;border-color:#5ae757;background:#2B2C2C none repeat scroll 0% 0%;border-width:1px;display:inline-block;border-radius:7px;width:auto;"><a href="' . $games['url_store'] . '" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:16px;color:#5ae757;border-style:solid;border-color:#2B2C2C;border-width:5px 15px 5px 15px;display:inline-block;background:#2B2C2C none repeat scroll 0% 0%;border-radius:7px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center;">Veja Mais</a></span></td>  
                                     </tr>  
                                </table>
                               </td> 
                             </tr> 
                        </table> 
                   </td>
                ';

                $count++;
            } else if ($count == 2) {

                $game .= ' 
                    <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;"> 
                           <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                             <tr style="border-collapse:collapse;"> 
                              <td class="es-m-p20b" width="174" align="left" style="padding:0;Margin:0;"> 
                               <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                                    <tr style="border-collapse:collapse;">  
                                        <td align="center" style="padding:0;Margin:0;"><a target="_blank" href="' . $games['url_store'] . '" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:14px;text-decoration:underline;color:#DBDBDB;"><img class="adapt-img" src="' . $games['thumbnail_file'] . '" width="173" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
                                    </tr> 
                                    <tr style="border-collapse:collapse;"> 
                                      <td align="left" style="padding:0;Margin:0;padding-bottom:5px;padding-top:10px;"><h3 style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#DBDBDB;">' . $games['title'] . '</h3></td> 
                                     </tr> 
                                     <tr style="border-collapse:collapse;"> 
                                      <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#A2A2A2;"><span class="product-description">' . strtoupper($games['publisher_id']) . '</span></p></td> 
                                     </tr> 
                                     <tr style="border-collapse:collapse;"> 
                                      <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;padding-top:5px;"><h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;color:#DBDBDB;"><span class="price">FREE</span></h4></td>  
                                     </tr>
                                     <tr style="border-collapse:collapse;"> 
                                      <td align="left" style="padding:0;Margin:0;padding-top:15px;"><span class="es-button-border" style="border-style:solid;border-color:#5ae757;background:#2B2C2C none repeat scroll 0% 0%;border-width:1px;display:inline-block;border-radius:7px;width:auto;"><a href="' . $games['url_store'] . '" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:16px;color:#5ae757;border-style:solid;border-color:#2B2C2C;border-width:5px 15px 5px 15px;display:inline-block;background:#2B2C2C none repeat scroll 0% 0%;border-radius:7px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center;">Veja Mais</a></span></td>   
                                     </tr>  
                                </table>
                               </td> 
                             </tr> 
                        </table> 
                   </td>
                ';

                $count++;
            } else if ($count == 3) {

                $game .= '   
                    <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;"> 
                           <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                             <tr style="border-collapse:collapse;"> 
                              <td class="es-m-p20b" width="174" align="left" style="padding:0;Margin:0;"> 
                               <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                                    <tr style="border-collapse:collapse;">  
                                        <td align="center" style="padding:0;Margin:0;"><a target="_blank" href="' . $games['url_store'] . '" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:14px;text-decoration:underline;color:#DBDBDB;"><img class="adapt-img" src="' . $games['thumbnail_file'] . '" width="173" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
                                    </tr> 
                                    <tr style="border-collapse:collapse;"> 
                                      <td align="left" style="padding:0;Margin:0;padding-bottom:5px;padding-top:10px;"><h3 style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#DBDBDB;">' . $games['title'] . '</h3></td> 
                                     </tr> 
                                     <tr style="border-collapse:collapse;"> 
                                      <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#A2A2A2;"><span class="product-description">' . strtoupper($games['publisher_id']) . '</span></p></td> 
                                     </tr> 
                                     <tr style="border-collapse:collapse;"> 
                                      <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;padding-top:5px;"><h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;color:#DBDBDB;"><span class="price">FREE</span></h4></td>  
                                     </tr>
                                     <tr style="border-collapse:collapse;"> 
                                      <td align="left" style="padding:0;Margin:0;padding-top:15px;"><span class="es-button-border" style="border-style:solid;border-color:#5ae757;background:#2B2C2C none repeat scroll 0% 0%;border-width:1px;display:inline-block;border-radius:7px;width:auto;"><a href="' . $games['url_store'] . '" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:16px;color:#5ae757;border-style:solid;border-color:#2B2C2C;border-width:5px 15px 5px 15px;display:inline-block;background:#2B2C2C none repeat scroll 0% 0%;border-radius:7px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center;">Veja Mais</a></span></td>
                                     </tr>  
                                </table>
                               </td> 
                             </tr> 
                        </table> 
                   </td>
                ';

                $count = 1;
            }
        }
    } else {
        continue;
    }
}


if ($count != 1) {
    $game = $game . '</tr>';
}

$msg = '
      <body style="width:100%;font-family:arial, \'helvetica neue\', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;"> 
            <div class="es-wrapper-color" style="background-color:#333333;"> 
               <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td valign="top" style="padding:0;Margin:0;"> 
                    <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#2B2C2C;" width="600" cellspacing="0" cellpadding="0" bgcolor="#2b2c2c" align="center"> 
            
                    <tr style="border-collapse:collapse;">  
                      <td align="center" style="padding:0;Margin:0;"> 
                       <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#2B2C2C;" width="600" cellspacing="0" cellpadding="0" bgcolor="#2b2c2c" align="center"> 
                            <tr style="border-collapse:collapse;"> 
                                  <td class="es-m-txt-c" align="center" style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;"><h1 style="Margin:0;line-height:66px;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:55px;font-style:normal;font-weight:normal;color:#5AE757;">Free Games</h1></td> 
                             <tr style="border-collapse:collapse;"> 
                              <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#CCCCCC;"><br></p></td> 
                             </tr>
                             <tr style="border-collapse:collapse;"> 
                              <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#CCCCCC;"><br></p></td> 
                             </tr>
                             <tr style="border-collapse:collapse;"> 
                              <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#CCCCCC;"><br></p></td> 
                             </tr>  
                                                                     
                                    ' . $game . ' 
                                     </table> 
               </td> 
             </tr> 
           </table></td> 
         </tr> 
       </table></td> 
     </tr> 
   </table> 
  </div>  
 </body>
';

echo $msg;

$sendoEmail = $send->send('Games Grátis', $msg);
