
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url()?>assets/frontend/images/misc/contactus.jpg);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg ">
						<!-- <div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div> -->
						<div class="pos-relative embed-responsive embed-responsive-16by9">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.560174644222!2d112.727836314775!3d-7.290776994737799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb9252c1b2c7%3A0xc90b76159728f361!2sJl.%20Lesti%20No.42%2C%20RT.008%2FRW.07%2C%20Darmo%2C%20Kec.%20Wonokromo%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060241!5e0!3m2!1sen!2sid!4v1618366039362!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
				</div>
				<div class="col-md-6 p-b-30">
					<form id="sendMessage" class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-10">
							Send us your message
						</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="contact_name" placeholder="Full Name">
						</div>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="contact_phone" placeholder="Phone Number">
						</div>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="contact_mail" placeholder="Email Address">
						</div>
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="contact_message" placeholder="Message"></textarea>
						<div class="w-size25">
							<button type="button" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" onclick="sendMessage()">
								Send
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>