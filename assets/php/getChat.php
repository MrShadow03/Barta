<?php
session_start();
if (isset($_SESSION['unique_id'])) {
	include_once './config.php';
	//Get time zone information

	//user content
	$user_id = $_SESSION['unique_id'];
	$user_info_sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}'");
	$user_row = mysqli_fetch_assoc($user_info_sql);

	$msg = mysqli_real_escape_string($conn, $_POST['msg']);
	$outgoing = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
	$incoming = mysqli_real_escape_string($conn, $_POST['incoming_id']);

	$reciever_info_sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$incoming}'");
	$reciever_row = mysqli_fetch_assoc($reciever_info_sql);

	$output = '';
	$sql = "SELECT * FROM messages WHERE (outgoing_msg_id={$outgoing} AND incoming_msg_id={$incoming}) OR (outgoing_msg_id={$incoming} AND incoming_msg_id={$outgoing}) ORDER BY msg_id ASC";
	$query = mysqli_query($conn, $sql);
	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			if ($row['outgoing_msg_id'] == $outgoing) {
				$time_ex = explode(" ", $row['time']);
				$time = end($time_ex);
				$output .= '<div class="message self">
								<div class="message-wrapper">
									<div class="message-content">
										<span>' . $row['msg'] . '</span>
									</div>
								</div>
								<div class="message-options">
									

									<span class="message-date">' . $time . '</span>

									<div class="dropdown">
										<a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<!-- Default :: Inline SVG -->
											<svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
											</svg>

											<!-- Alternate :: External File link -->
											<!-- <img class="injectable hw-18" src="./assets/img/heroicons/outline/dots-horizontal.svg" alt="message options"> -->
										</a>

										<div class="dropdown-menu">
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/duplicate.svg" alt="message options"> -->
												<span>Copy</span>
											</a>
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/pencil.svg" alt="message edit"> -->
												<span>Edit</span>
											</a>
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/reply.svg" alt="message replay"> -->
												<span>Replay</span>
											</a>
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 rotate-y mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable rotate-y hw-18 mr-2" src="./assets/img/heroicons/outline/reply.svg" alt="message forward"> -->
												<span>Forward</span>
											</a>
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/star.svg" alt="message favourite"> -->
												<span>Favourite</span>
											</a>
											<a class="dropdown-item d-flex align-items-center text-danger" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/trash.svg" alt="message delete"> -->
												<span>Delete</span>
											</a>
										</div>
									</div>
								</div>
							</div>';
			} else {
				$time_ex = explode(" ", $row['time']);
				$time = end($time_ex);
				$output .= '<div class="message">
								<div class="message-wrapper">
									<div class="message-content">
										<span>' . $row['msg'] . '</span>
									</div>
								</div>
								<div class="message-options">
									<div class="avatar avatar-sm">
										<img alt="" src="./assets/storage/' . $reciever_row['img'] . '" />
									</div>
									<span class="message-date">' . $time . '</span>
									<div class="dropdown">
										<a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<!-- Default :: Inline SVG -->
											<svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
											</svg>

											<!-- Alternate :: External File link -->
											<!-- <img class="injectable hw-18" src="./assets/img/heroicons/outline/dots-horizontal.svg" alt="message options"> -->
										</a>

										<div class="dropdown-menu">
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/duplicate.svg" alt="message options"> -->
												<span>Copy</span>
											</a>
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/reply.svg" alt="message replay"> -->
												<span>Replay</span>
											</a>
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 rotate-y mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable rotate-y hw-18 mr-2" src="./assets/img/heroicons/outline/reply.svg" alt="message forward"> -->
												<span>Forward</span>
											</a>
											<a class="dropdown-item d-flex align-items-center" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/star.svg" alt="message favourite"> -->
												<span>Favourite</span>
											</a>
											<a class="dropdown-item d-flex align-items-center text-danger" href="#">
												<!-- Default :: Inline SVG -->
												<svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-18 mr-2" src="./assets/img/heroicons/outline/trash.svg" alt="message delete"> -->
												<span>Delete</span>
											</a>
										</div>
									</div>
								</div>
							</div>';
			}
		}
		echo $output;
	}
} else {
	header('location:./signin.php');
}
