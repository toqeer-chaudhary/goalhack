<table border="0" cellpadding="0" cellspacing="0" style="width:500px">
    <tbody>
    <tr>
        <td align="center" colspan="5">
            <img size="100x100" src="{{ asset("assets/frontend/images/goalHack-logo.png") }}" alt="site logo" />
        </td>
    </tr>
    <tr>
        <td style="text-align:justify" colspan="5"><br>
            <span style="font-family:Tahoma,Calibri;font-size:12pt">You are registerd for <b>GoalHack</b> System</span>
            <br><br>
            <b>Your email is :</b><span>{{$user->email}}</span>
            <br><br>
            <b>Password: </b><span>{{$user->password}}</span>
            <br><br>
            <span style="font-family:Tahoma,Calibri">Dear User, you're almost there! Please click the following link to activate your account to access all the features of GoalHack.<br><br>
						<a href="{{route('sentUserEmail',["email"=>$user->email, "verify_token"=>$user->verify_token])}}">Verify Email</a><br><br>If the given link is not clickable, please copy and paste it into the address bar of your web browser.<br><br><b>Note:</b>&nbsp; You will not be able to proceed with GoalHack until you have activated it.<br><br>
					</span>
            <br><br>
            <span style="font-family:Tahoma,Calibri">Best Regards, <br>
						<strong>GoalHack Team</strong>
					</span><br></td>
    </tr>
    <tr>
        <td>&nbsp;
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    </tbody>
</table>