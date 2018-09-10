<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<title>Vacancity</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background: #f7f7f7;">	
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="#0078d7" style="padding: 1px 0 3px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: 'Helvetica Neue',Arial,sans-serif;">	
                        </td>
                    </tr>
                    <tr>
						<td align="center" bgcolor="white" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: 'Helvetica Neue',Arial,sans-serif;">
							<!-- <img src="{{asset('img/LOGO.png')}}" alt="Vacancity" width="300" height="230" style="display: block;" /> -->
                            <h3 style="color:#0078d7" class="text-center">Vacancity</h3>
                        </td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #1536adobe43; font-family: 'Helvetica Neue',Arial,sans-serif; font-size: 20px;">
										<p>Hi {{$user->name}},</p>
									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: 'Helvetica Neue',Arial,sans-serif; font-size: 16px; line-height: 20px;">
										Thanks for getting started with Vacancity! We need a little more information to complete your registration, including confirmation of your email address.
									</td>
                                </tr>
                                <tr>
									<td style="text-align:center;padding: 20px 0 30px 0; color: #153643; font-family: 'Helvetica Neue',Arial,sans-serif; font-size: 16px; line-height: 20px;">
                                        <a style="text-align: center;padding: 10px 80px 10px 80px;color: white;background: #0078d7;border-radius: 5px;text-decoration: none;" href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}" class="btn btn-primary btn-lg">
                                            Verify Email
                                        </a>
                                    </td>
								</tr>
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: 'Helvetica Neue',Arial,sans-serif; font-size: 16px; line-height: 20px;">
										<p>Sincerely,</p>
										<p>Vacancity</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#0078d7" style="padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #ffffff; font-family: 'Helvetica Neue',Arial,sans-serif; font-size: 14px;" width="75%">
										&reg; Vacancity, QC <?php echo date('Y'); ?> <br/>
										<a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly
									</td>
									<td align="right" width="25%">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td style="font-family: 'Helvetica Neue',Arial,sans-serif; font-size: 12px; font-weight: bold;">
													<a href="http://www.facebook.com/" style="color: #ffffff;">
														<img src="https://png.icons8.com/ios/1600/facebook-circled-filled.png" alt="Facbook" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td>
												<!-- <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
												<td style="font-family: 'Helvetica Neue',Arial,sans-serif; font-size: 12px; font-weight: bold;">
													<a href="http://www.google.com/" style="color: #ffffff;">
														<img src="https://geoinnova.org/wp-content/uploads/2017/12/google_icon-icons.com_65550-1.png" alt="Google" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td> -->
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>