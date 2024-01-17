<?php 
	require('config.php');

	$prefilled = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
	<link rel="icon" href="../favicon.ico">

	<title>Email Signature Generator Demo</title>

	<link href="bootstrap.min.css" rel="stylesheet">

	<link href="style.css" rel="stylesheet">

</head>

<body>


	<div class="container">

		<div class="row">
			<div class="col">
				<h1>Mail Signature Generator</h1>
				<p class="lead">Please fill out the following fields and click on "Generate".</p>
			</div>
		</div>

		<form class="form-inline row needs-validation alert alert-secondary align-items-start" action="" method="get">
			<div class="col-12 col-md">
				<h3>Name & Position</h3>
				<div class="mb-3">
					<input type="text" class="form-control" name="name" placeholder="first & last name"
						value="<?php echo $_GET['name']; ?>" required>
					<small class="form-text text-muted">Further instructions?</small>
					<div class="invalid-feedback">
						Name is required!
					</div>
				</div>
				<div class="mb-3">
					<input type="text" class="form-control" name="subtitle" placeholder="Your position"
						value="<?php echo $_GET['subtitle']; ?>">
					<small class="form-text text-muted">e.g. IT, Support,...</small>
				</div>
			</div>
			<div class=" col-12 col-md">
				<h3>Contact infos</h3>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><?php echo $phoneprefix; ?></span>
					</div>
					<input type="text" class="form-control" name="phoneextension" placeholder="Phone Extension"
						value="<?php echo $_GET['phoneextension']; ?>">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><?php echo $phoneprefix; ?></span>
					</div>
					<input type="text" class="form-control" name="faxextension" placeholder="Fax extension"
						value="<?php echo $_GET['faxextension']; ?>">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">+49 </span>
					</div>
					<input type="text" class="form-control" name="mobile" placeholder="mobilenumber"
						value="<?php echo $_GET['mobile']; ?>">
				</div>
				<small class="form-text text-muted">With spaces after area code to increase legibility.</small>
			</div>

			<?php
				$banner = $files ? array_diff(scandir($files), array('..', '.')) : false;
				$select = $_GET['banner'];
				
				if ($banner && !empty($banner)):
			?>

			<div class="col-12 col-md">
				<h3>Banner (optional)</h3>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Link</span>
					</div>
					<input type="text" class="form-control" name="link"
						value="<?php echo ($_GET['link']) ? $_GET['link'] : 'https://'; ?>">
				</div>
				<div class="input-group mb-3">
					<select class="custom-select" name="banner">
						<option <?php echo ($select == "") ? 'selected ' : ''; ?>value="">No Banner</option>
						<?php foreach ($banner as $b):?>
						<option value="<?php echo $b; ?>" <?php echo ($select == $b) ? ' selected' : ''; ?>>
							<?php echo preg_replace('/\\.[^.\\s]{3,4}$/', '', $b);; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<?php endif; ?>

			<div class="col-12 text-right">
				<button type="submit" class="btn btn-primary">Update Signatur</button>
			</div>
		</form>


		<?php if ($_GET['name'] != ""): ?>

		<div class="row mb-3">
			<div class="col-12">
				<h2>implement mail signature</h1>
			</div>
			<div class="col-12">
				<h3>Microsoft Outlook</h3>
				<p><a href="https://support.office.com/en-us/article/create-and-add-a-signature-to-messages-8ee5d4f4-68fd-464a-a1c1-0e1c80bb27f2?omkt=en-US&ui=en-US&rs=en-US&ad=US"
						target="_blank">Here</a> you will learn how to install the signature in Outlook. Check the appearance
					and details of the signature and click on "Copy signature" to copy the signature to the clipboard. Paste
					it into the <i>Edit Signature</i> field of Outlook.</p>
				<p>Attention: When replying to e-mails, it may happen that a plain text version of the e-mail is displayed
					instead of the HTML signature. In this case you have to switch to <i>Format text</i> via the tab
					<i>Format text</i>, under <i>Format</i> manually to <i>HTML</i>, instead of <i>Only text</i>. Afterwards
					the text variant can be replaced by the HTML signature via the tab <i>Message</i> and <i>Signature</i>.
				</p>
			</div>
			<div class="col-12 col-md-6">
				<h3>Thunderbird</h3>
				<p><a href="https://support.mozilla.org/en-US/kb/signatures#w_html-signatures" target="_blank">Here</a> you
					will learn how to install the signature in Thunderbird. Check the appearance and details of the signature
					and click on "Copy signature" to copy the signature to the clipboard. Select the checkbox <i>Use HTML</i>
					and paste it into the Thunderbird <i>Signature Text</i> field</p>
			</div>
			<div class="col-12 col-md-6">
				<h3>iOS</h3>
				<p>Make sure that the setting <i>iOS Settings > Assist > Shake to undo</i> is active. Open <i>iOS Settings >
						Mail > Signature </i> on your device and add the signature in the field for the relevant mailbox. Now
					shake the device once until the message <i>Undelete attributes </i> appears. Tap on <i>Cancel</i> to keep
					the original formation of the signature.<br />You can send the following link as an email to not have to
					enter everything again.</p>
			</div>
		</div>

		<div class="alert alert-secondary row mb-5">
			<div class="col-6">
				<p>Click the button <i>Copy signature</i> to copy the signature to the clipboard. Click on <i>Copy HTML</i>
					to copy the plain HTML code.</p>
				<button class="btn btn-primary copy" data-clipboard-target="#signature">Copy Signature</button>
				<button class="btn btn-primary copy-html">Copy HTML</button>
			</div>
			<div class="col-6">
				<p>You can save and send this link to save your input.</p>
				<button class="btn btn-primary copy" data-clipboard-text="<?php echo $prefilled; ?>">Copy
					Link</button><br />
				<small><a class="text-truncate" style="display: block; max-width: 100%" href="<?php echo $prefilled; ?>"
						role="button"><?php echo $prefilled; ?></a></small>
			</div>
		</div>

		<div class="wrapper mb-5">

			<div id="signature">
				<table id="main" width=650>
					<tr>
						<td width=325>
							<table width=325>
								<tr>
									<td colspan="2">
										<?php echo $_GET['name']; echo ($_GET['subtitle'] != "") ? '<br /><span>'.$_GET['subtitle'].'</span>' : ''; ?>
									</td>
								</tr>
								<?php $n = ($_GET['phoneextension'] == "") ? '0' : $_GET['phoneextension']; ?>
								<tr>
									<td width=25>Fon</td>
									<td><a href="tel:<?php echo $phonelinkprefix . $n; ?>" title="Call directly" width=300><?php echo $phoneprefix . ' ' . $n; ?></a></td>
								</tr>
								<?php if ($_GET['mobile']): ?>
								<tr>
									<td width=25>Mobile</td>
									<td><a href="tel:+49-<?php echo $_GET['mobile']; ?>" title="Call mobile" width=300>+49
											<?php echo $_GET['mobile']; ?></a></td>
								</tr>
								<?php endif; ?>
								<?php $n = ($_GET['faxextension'] == "") ? '20' : $_GET['faxextension']; ?>
								<tr>
									<td width=25>Fax</td>
									<td><a href="tel:<?php echo $phonelinkprefix . $n; ?>" title="Send Fax" width=300><?php echo $phoneprefix . ' ' . $n; ?></a></td>
								</tr>
								<tr>
									<td colspan="2"><a href="https://example.com/" title="Open website">www.example.com</a></td>
								</tr>
							</table>
						</td>
						<td width=325>
							<table>
								<tr>
									<td>
										<p>Street 12<br />12345 Some City</p>
									</td>
									<td>
										<a style="text-decoration: none;" href="https://example.com/" title="Open Website"> <img
												alt="Logo" src="https://example.com/assets/logo.jpg" width="100" height="100"></a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php if ($_GET['banner'] == ""): ?>
							Placeholder if no Banner is selected.
							<?php else: 
									$l = $_GET['link'];
									echo ($l != "https://" && $l != "") ? '<a href="'.$l.'" title="Click for more informations">' : '';
								?>
							<img src="https://example.com/directory-specified-in-config-php/<?php echo $_GET['banner']; ?>"
								alt="" width="100%" style="width:100%" />
							<?php echo ($l != "https://" && $l != "") ? '</a>' : ''; ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							Something more...
						</td>
					</tr>
					</tbody>
				</table>
			</div>

		</div>

	</div>

	<?php endif; ?>

	</div>

	<script src="clipboard.min.js"></script>

	<script type="text/javascript">
		var clipboard = new ClipboardJS('.copy');
		var clipboardhmtl = new ClipboardJS('.copy-html', {
			text: function (trigger) {
				return String(document.getElementById('signature').innerHTML)
			}
		});
	</script>

</body>

</html>