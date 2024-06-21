<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Wysyłanie wiadomości</title>
		<link
			href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="css/MesToSup.css" />
	</head>
	<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
    
  ?>


		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<div class="SendMesBox">
							<div class="card-header text-white text-center">
								<h4>Wyślij wiadomość</h4>
							</div>
						</div>

						<div class="card-body">
							<p>
								Opisz nam swój problem. Jeden z członków naszego przyjaznego i
								kompetentnego zespołu pomocy skontaktuje się z Tobą tak szybko,
								jak to możliwe (zazwyczaj w ciągu 24 godzin).
							</p>
							<form action="send_message.php" method="POST">
								<div class="form-group">
									<label for="email">Email</label>
									<input
										type="email"
										class="form-control"
										id="email"
										name="email"
										required
									/>
								</div>
								<div class="form-group">
									<label for="subject">Temat</label>
									<input
										type="text"
										class="form-control"
										id="subject"
										name="subject"
										required
									/>
								</div>
								<div class="form-group">
									<label for="message">Wiadomość</label>
									<textarea
										class="form-control"
										id="message"
										name="message"
										rows="4"
										required
									></textarea>
								</div>
								<div class="text-center">		<div class="ButtonWyslij ">
									<button>
										<div class="svg-wrapper-1">
											<div class="svg-wrapper">
												<svg
													xmlns="http://www.w3.org/2000/svg"
													viewBox="0 0 24 24"
													width="24"
													height="24"
												>
													<path fill="none" d="M0 0h24v24H0z"></path>
													<path
														fill="currentColor"
														d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
													></path>
												</svg>
											</div>
										</div>
										<span>Wyślij</span>
									</button>
								</div></div>
						
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>
