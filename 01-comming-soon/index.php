<?php
include 'config.php';

$servername = "localhost";
$username = "azrt_opl_legalai";
$password = "Ksc83KwF.Q";
$dbname = "azrt_opl_legalai";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn = new mysqli($servername, $username, $password, $dbname); 


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $name = $conn->real_escape_string($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $company = $conn->real_escape_string($_POST['company']);
    $agreep = isset($_POST['agreep']) ? 1 : 0; 

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit();
    }

    
    $sql = "INSERT INTO waitinglist (name, email, company, agreep) VALUES (?, ?, ?, ?)"; 
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("sssi", $name, $email, $company, $agreep);

    
    if ($stmt->execute() === TRUE) {
        echo "Form submitted successfully!";
    } else {
        
        error_log("Error: " . $stmt->error);
        echo "There was an error submitting your form. Please try again later.";
    }

    
    $stmt->close();
    $conn->close();

    
    exit();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>LegalAI by OPL</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/png" href="./favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="images/png" href="./favicon-16x16.png" sizes="16x16">
    <meta charset="UTF-8">
    <script src="https://www.google.com/recaptcha/api.js?render=6LeI7J0pAAAAAFOT3qtCUc3rQhew_ZnJPCPwA6No" async defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Stylesheets -->
    <link href="common-css/bootstrap.css" rel="stylesheet">
    <link href="common-css/ionicons.css" rel="stylesheet">
    <link rel="stylesheet" href="common-css/jquery.classycountdown.css" />
    <link href="style/css/styles.css" rel="stylesheet">
    <link href="style/css/responsive.css" rel="stylesheet">
</head>
<body>
<div class="main-area">
    <div class="container full-height position-static">
        <section class="left-section full-height">
            <a class="logo" href="#"><img src="images/logo.png" alt="Logo"></a>
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="main-content">
                        <h1 class="title"><b>Join our waitlist</b></h1>
                        <p>Welcome to NeLa, the Neuron Lawyer! If you sign up, we will notify you on the launch date and other developments related to NeLa.</p>
                        <div class="alert" id="form-alert" style="display: none;"></div>
						<div class="email-input-area">
						<form id="subscribe-form" class="subscribe-form" action="process_form.php" method="post">
						<input type="text" id="name" name="name" placeholder="Your Name" required>
						<input type="email" name="email" placeholder="Your Email Address" required>
						<input type="text" name="company" placeholder="Company Name" required>
						<label class="checkbox-label" for="agreep">
    <input type="checkbox" id="agreep" name="agreep" required>
    <span class="checkbox-text" data-toggle="modal" data-target="#privacyModal">I have read the privacy policy and I consent to the data processing described in it.</span>
</label>
						<!-- Add reCAPTCHA -->
						<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
						<button type="submit">Subscribe</button>
						</form>
                        </div>
						

                    </div>
                </div>
            </div>
            <ul class="footer-icons">
                <li>Stay in touch : </li>
                <li><a href="https://www.facebook.com/OPLgunnercooke" target="_blank"><i class="ion-social-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/company/opl-attorneys" target="_blank"><i class="ion-social-linkedin"></i></a></li>
            </ul>
        </section>
        <section class="right-section" style="background-image: url(images/bg.webp)">
            <div class="display-table center-text" style="
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgb(135 208 238 / 50%); /* Blue color with 50% opacity */
            ">
                <div class="display-table-cell">
                </div>
            </div>
            <div class="display-table-cell">
            </div>
        </section><!-- right-section -->
    </div><!-- container -->
</div><!-- main-area -->
<!-- Modal -->
<div class="modal fade " id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="privacyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="privacyModalLabel">Privacy Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
  <p>Privacy notice – waitlist for NeLa, the Neuron Lawyer <br>
  March 2024</p>
  <p>EXPLICO Zrt. (registered seat: H-1036 Budapest, Perc utca 6., company registration number: 01-10-047104, tax number: 23422827-2-41, “EXPLICO” or “Controller” or “us”) is developing a large language model based solution to assist legal work (“NeLa”), and it is now collecting contacts that are interested in receiving news about NeLa, its launch date, future updates on NeLa, and news and direct emails on the use of AI in the legal work, legal technology, AI regulation, and law&technology in general. This privacy notice (the “Privacy Notice”) covers all data processing activities related to advertising NeLa and EXPLICO’s other products. <br>
  EXPLICO undertakes to act in accordance with the terms of the Privacy Notice.</p>
  <p>Data subjects: persons subscribing to the waitlist to access NeLa (the “Data Subjects”). <br>
  Data controller: EXPLICO</p>
  <p>Purpose of the data processing: to collect contact details of persons interested in trying out, purchasing or receiving information about a legal LLM-based product. <br>
  Description of the data processing: EXPLICO collects contact details on its webpage and organises such contacts into a database hosted on its servers. EXPLICO’s personnel and partners may send emails to the contact email provided by the Data Subject on NeLa, legal AI, and other legaltech and AI regulatory matters.  Only those employees and contractual partners have access to the personal data that work on marketing tasks in connection with the above topics and the technical team who grant access to the database.</p>
  <p>Legal basis of the data processing: the expressed consent of the Data Subject on the basis of Art. 6 (1) a) of the GDPR and Section (1) 6 of Act XLVIII of 2008 of Hungary on the fundamental conditions of and limitations to commercial marketing.</p>
  <p>Categories of personal data processed: name, email address, and company the data subject works for and any subsequent emails EXPLICO exchanges with the data subject or their team members.</p>
  <p>Source of the data processed: the data subject provides these.</p>
  <p>Duration of data processing: 2 years from data subjects giving their consent.</p>
  <p>Place of data processing: the servers of EXPLICO located on its registered seat.</p>
  <p>Persons having access rights: employees and contractual partners who work on marketing tasks in connection with the above topics and the technical team who grant access to the database.</p>
  <p>Data transfers: the Controller does not transfer personal data out of the EEA, it only transfers personal data to its data processors.</p>
  <p>Data processors:</p>
  <ul>
    <li>IT supplier: Andocsek Zrt. (registered seat: H-1024 Budapest, Buday L. utca 12., company registration number: 01-10-047892, tax number: 24731434-2-41)</li>
    <li>Developer: ALBU Kft. (registered seat: H-1036 Budapest, Perc utca 6., company registration number: 01-09-405312, tax number: 32070851-2-41)</li>
    <li>Sales and marketing: Tóth Péter Endre egyéni ügyvéd (registered seat: H-1036 Budapest, Perc utca 6.)</li>
  </ul>
  <p>Means of storing personal data and data security measures: the database is located on EXPLICO’s servers that are protected with enterprise-level firewalls, and physical and logical access control. Persons having access to the database are subject to strict keyword policies.</p>
  <p>Contact details of the data controller:</p>
  <ul>
    <li>Name: EXPLICO Zrt.</li>
    <li>registered seat: H-1036 Budapest, Perc utca 6.,</li>
    <li>company registration number: 01-10-047104</li>
    <li>email: office@explico-cee.com</li>
  </ul>
  <p>Data protection rights</p>
  <p>Data Subjects may request information on processing, rectification, erasure. Data Subjects may not request erasure of data if data processing is mandatory pursuant to applicable law.</p>
  <p>Data Subjects may request us to confirm whether or not the Data Subject’s personal data is processed and, where that is the case, Data Subjects may request access to the personal data.</p>
  <p>Data Subjects may have the right to request us to rectify any inaccuracies in the personal data.</p>
  <p>Data Subjects may have the right to request us to restrict the processing of their personal data. In this case, the respective data will be marked and may only be processed by us for certain purposes.</p>
  <p>Data Subjects may have the right to receive the personal data, that Data Subjects have provided to us, in a structured, commonly used, and machine-readable format (i.e.: in digital form) and Data Subjects may have the right to request the transmission of that data to another entity without hindrance from us, if such transmission is technically feasible.</p>
  <p>When the processing of the personal data is based on the Data Subject’s consent, the Data Subject can withdraw consent at any time without giving us any reason by contacting us under any of our contact details. The withdrawal of consent does not affect the lawfulness of processing based on consent prior to its withdrawal.</p>
  <p>We respond to requests – by electronic means, unless you instruct us otherwise – within a month, either by informing Data Subjects on our actions taken upon their request or by letting Data Subjects know the reasons why we cannot fulfil the request. We may request additional information from Data Subjects for confirmation to fulfil the request. We fulfil the first request free of charge if submitted in a year’s time, however we charge Data Subjects reasonable administrative costs or refuse the request when the request is manifestly unfounded or excessive. We let Data Subjects, and all of whom we shared the data with, know about the rectification, erasure, restriction of processing unless this proves impossible or involves disproportionate effort.</p>
  <p>If Data Subjects feel that their personal data rights have been breached, please contact us first. Furthermore, Data Subjects can also contact and lodge a complaint with the local data protection authority, in particular in the Member State of the European Union of their habitual residence. Relevant data protection authorities in Europe:</p>
  <p><a href="https://edpb.europa.eu/about-edpb/about-edpb/members_en">https://edpb.europa.eu/about-edpb/about-edpb/members_en</a></p>
  <p>The data protection authority closest to the Controller:</p>
  <p>National Data Protection and Freedom of Information Authority (Nemzeti Adatvédelmi és Információszabadság Hatóság)<br>
  Registered seat: H-1055  Budapest, Falk Miksa utca 9-11<br>
  Mailing address: 1363  Budapest, Pf.: 9.<br>
  Phone:<br>
  +36 1 391 1400<br>
  +36 (30) 683-5969<br>
  +36 (30) 549-6838<br>
  Fax: +36 1 391 1410<br>
  E-mail: ugyfelszolgalat@naih.hu<br>
  Web page: <a href="http://www.naih.hu">http://www.naih.hu</a><br>
  The authority also accepts complains via Hungary’s official e-Papír service.</p>
</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script src="common-js/jquery-3.1.1.min.js"></script>
<script src="common-js/tether.min.js"></script>
<script src="common-js/bootstrap.js"></script>
<script src="common-js/jquery.classycountdown.js"></script>
<script src="common-js/jquery.knob.js"></script>
<script src="common-js/jquery.throttle.js"></script>
<script src="common-js/scripts.js"></script>
<script>
$(document).ready(function() {
    $('#subscribe-form').submit(function(e) {
        e.preventDefault(); 

        if ($('#name').val().trim() === '') {
            showAlert('Name field cannot be empty', 'danger');
            return;
        }
        
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeI7J0pAAAAAFOT3qtCUc3rQhew_ZnJPCPwA6No', {action: 'submit'}).then(function(token) {
                $('#g-recaptcha-response').val(token);

                $.ajax({
                    type: 'POST',
                    url: window.location.href, 
                    data: $('#subscribe-form').serialize(), 
                    success: function(response) {
                        showAlert(response, 'success');
                        $('#subscribe-form')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        showAlert('Error: ' + error, 'danger');
                    }
                });
            });
        });
    });

    function showAlert(message, type) {
        $('#form-alert').removeClass().addClass('alert alert-' + type).html(message).show();
        setTimeout(function() {
            $('#form-alert').fadeOut('slow');
        }, 5000); 
    }
});
</script>
</body>
</html>
