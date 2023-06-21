<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
        </style>
    </head>
    <body>
       
    
<table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
    <tbody>
        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
            <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                valign="top">
                <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;"
                        bgcolor="#fff">
                        <tbody>
                            @if($user->organization->emailVerificationSetting)
                            @if($user->organization->emailVerificationSetting->logo)
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                               

                                <td class="" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #1e2859; margin: 0; padding: 20px;"
                                    align="center" bgcolor="#71b6f9" valign="top">         
                                                                       <img src="{{$general->website_url}}organization/emailVerifySettings/{{$user->organization->emailVerificationSetting->logo}}" style="width:320px;height:81px;" alt="system logo">                                                                        
                                </td>
                               
                            </tr>

                            @endif
                            @endif
                           
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: red; margin: 0; padding: 10px;"
                                    align="center" bgcolor="#71b6f9" valign="top">
                                    <a href="#" style="font-size:30px;background-color: red;color:#fff;"> Event Registration</a>
                                </td>
                            </tr>
                            
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <tbody>
                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    hi, <strong style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    {{$admin->first_name}} {{$admin->last_name}}</strong>,
                                                </td>
                                            </tr>
                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                     <strong style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                   You have event approvals. please see below table
                                                    </strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                       
                    <div class="row">
                        <div  style="width:125px;float:left;">
                            <strong>{{ "Member" }}</strong>
                        </div>
                        <div style="width:125px;float:left;">                  
                        <strong>{{ "Organization" }}</strong>
                        </div>
                        <div style="width:125px;float:left;">                  
                            <strong>{{ "League" }}</strong>
                            </div>
                            <div style="width:125px;float:left;">                  
                                <strong>{{ "Events" }}</strong>
                                </div>
                    </div>
                                              
                                             </tr>
                                             <tr>
                                                <div  style="width:125px;float:left;">
                                                    {{$user->first_name}} - {{$user->last_name}}
                                                  </div>
                                                  <div  style="width:125px;float:left;">
                                                    {{$reg->organization->name}}
                                                  </div>
                                                  <div  style="width:125px;float:left;">
                                                    {{$reg->league->name}}
                                                  </div>    
                                                    

                                                    <div  style="width:125px;float:left;">
                                                        @foreach($regs as $eg)
                                                      {{$eg->mainEvent->name}}
                                                      <br>
                                                      @endforeach

                                                    </div>
                                                    
                                                                          
                                                                         </tr>
                 
                                             




                                           
                                            @if($user->organization->emailVerificationSetting)
                                            @if($user->organization->emailVerificationSetting->footer)
                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    {!! html_entity_decode($user->organization->emailVerificationSetting->footer ) !!}
                                                </td>
                                            </tr>
                                            @endif 
                                            @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>