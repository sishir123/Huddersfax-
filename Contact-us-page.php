<?php
session_start();
if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
   
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Huddersfax Mart</title>

		<!-- Bootstrap -->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
			integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
			crossorigin="anonymous"
		/>

		<!-- CSS -->
		<link rel="stylesheet" href="Css/style.css" />
		<link rel="stylesheet" href="Css/Contact-us.css" />

		<!-- Bootstrap scripts -->
		<script
			src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
			integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
			integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
			integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
			crossorigin="anonymous"
		></script>

		<!-- Google fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link
			rel="preconnect"
			href="https://fonts.gstatic.com"
			crossorigin
		/>
		<link
			href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap"
			rel="stylesheet"
		/>

		<!-- Font Awesome -->
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
		/>
	</head>
	<body>
	<?php
    include('./header.php');
?>

		<!-- Contact us Header -->

		<!-- Contact us Container -->
		<div class="contact-container">
			<div class="title">
				<h2>Contact us</h2>
				<p>
					We love questions and feedback - and we are always happy to
					help!<br />
					Here are some ways to contact us.
				</p>
			</div>

			<div class="box">
				<div class="contact-form-container">
					<div class="text-container">
						<h3>Send us a message</h3>
						<p>
							Send us a message and we will respond within 24 hours.
						</p>
					</div>
					<form class="contact-form">
						<div class="flex">
							<div class="input">
								<p>Full Name</p>
								<input
									type="text"
									id="name"
									name="name"
									placeholder="Type Full Name Here"
								/>
							</div>
							<div class="input">
								<p>Email</p>
								<input
									type="text"
									id="email"
									name="email"
									placeholder="Enter email here"
								/>
							</div>
						</div>
						<div class="input">
							<p>Phone</p>
							<input
								type="text"
								id="number"
								name="number"
								placeholder="Enter Phone Number"
							/>
						</div>
						<div class="input">
							<p>Message</p>
							<input
								type="text"
								id="message"
								name="message"
								placeholder="Type your message Here"
							/>
						</div>
						<button class="btn btn1">Submit</button>
					</form>
				</div>
				<div class="contact-info">
					<h3>Contact Information</h3>
					<div class="infoBox">
						<div>
							<p>Suburb Huddersfax, 85 UK</p>
						</div>

						<div>
							<p>info@hudderfax.com</p>
						</div>

						<div>
							<p>[123]456-7890</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script
			type="module"
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
		></script>
		<script
			nomodule
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
		></script>

		<!-- Subscribe Handlebar -->

		<div class="Subscribe-handlebar">
			<div class="updates">
				<h6 class="big-text">Dont miss out any updated<br /></h6>
				<p class="short-text">
					Subscribe to Huddersfax mart. Get the latest product updates
					and <br />special offers delivered right to your inbox.
				</p>
			</div>
			<div class="Email-placeholder">
				<input
					type="email"
					id="email"
					name="myGeeks"
					placeholder="Enter your Email"
					class="Email-place"
				/>
				<a href="#" class="Subscribe-text"> Subscribe</a> <br /><br />
			</div>
		</div>

		<!-- footer -->
		<div class="footer-container">
			<div class="Contact-row">
				<div class="Needhelp-text">Need Help?</div>
				<div class="middle">
					<a href="Contact-us-page.php"><button class="btn btn1">Contact Us</button></a>
				</div>
			</div>

			<div class="Links">
				<ol>
					<li><a href="Homepage.php" class="links-btn">Home</a></li>
					<li><a href="#" class="links-btn">Bakery</a></li>
					<li><a href="#" class="links-btn">Butchers</a></li>
					<li><a href="#" class="links-btn">Greengrocer</a></li>
					<li><a href="#" class="links-btn">Fishmonger</a></li>
					<li><a href="#" class="links-btn">Delicatessen</a></li>
				</ol>
			</div>

			<div class="policies Links">
				<ol>
					<li><a href="#" class="links-btn">Refund Policy</a></li>
					<li><a href="#" class="links-btn">Return Policy</a></li>
					<li><a href="#" class="links-btn">Payments</a></li>
				</ol>
			</div>
			<div class="Huddersfax-mart Links">
				<ol>
					<li>
						<a href="About-us.php" class="links-btn">About us</a>
					</li>
					<li><a href="#" class="links-btn">Terms of Service</a></li>
					<li><a href="#" class="links-btn">Privacy policy</a></li>
				</ol>
			</div>
			<div class="map">
				<p>
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7891502642515!2d-1.7842727793207414!3d53.64438949499016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487962132bcdb7bb%3A0x653c3a498c896a17!2sHuddersfield%2C%20UK!5e0!3m2!1sen!2snp!4v1681277576705!5m2!1sen!2snp"
						width="600"
						height="450"
						style="border: 0"
						allowfullscreen=""
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						class="hudder-map"
					></iframe>
				</p>
			</div>
		</div>
	</body>
</html>