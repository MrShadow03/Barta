<?php

session_start();
if (!isset($_SESSION['unique_id'])) {
	header('location:./signin.php');
}









?>

<?php include_once "./components/head.php" ?>

<body class="chats-tab-open">

	<?php
	include_once "./assets/php/config.php";
	$session_id = $_SESSION['unique_id'];
	$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id ='{$_SESSION['unique_id']}'");
	if (mysqli_num_rows($sql) > 0) {
		$row = mysqli_fetch_assoc($sql);
	}
	$sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id ='{$session_id}'");
	$session_row = mysqli_fetch_assoc($sql2);
	?>
	<!-- Main Layout Start -->
	<div class="main-layout">
		<!-- Navigation Start -->
		<div class="navigation navbar navbar-light bg-primary">
			<!-- Logo Start -->
			<a class="d-none d-xl-block bg-light rounded logo_a" href="./index.html">
				<img src="./assets/storage/<?php echo $session_row['img']; ?>" alt="img" class="logo_img">
			</a>
			<!-- Logo End -->

			<!-- Main Nav Start -->
			<ul class="nav nav-minimal flex-row flex-grow-1 justify-content-between flex-xl-column justify-content-xl-center" id="mainNavTab" role="tablist">
				<!-- Chats Tab Start -->
				<li class="nav-item">
					<a class="nav-link p-0 py-xl-3 active" id="chats-tab" href="#chats-content" title="Chats">
						<!-- Default :: Inline SVG -->
						<svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
						</svg>

						<!-- Alternate :: External File link -->
						<!-- <img class="injectable hw-24" src="./assets/img/heroicons/outline/chat-alt-2.svg" alt="Chat icon"> -->
					</a>
				</li>
				<!-- Chats Tab End -->

				<!-- Calls Tab Start -->
				<li class="nav-item">
					<a class="nav-link p-0 py-xl-3" id="calls-tab" href="#calls-content" title="Calls">
						<!-- Default :: Inline SVG -->
						<svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
						</svg>

						<!-- Alternate :: External File link -->
						<!-- <img class="injectable hw-24" src="./assets/img/heroicons/outline/phone.svg" alt="Phone icon"> -->
					</a>
				</li>
				<!-- Calls Tab End -->

				<!-- Friends Tab Start -->
				<li class="nav-item">
					<a class="nav-link p-0 py-xl-3" id="friends-tab" href="#friends-content" title="Friends">
						<!-- Default :: Inline SVG -->
						<svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
						</svg>

						<!-- Alternate :: External File link -->
						<!-- <img class="injectable hw-24" src="./assets/img/heroicons/outline/users.svg" alt="Friends icon"> -->
					</a>
				</li>
				<!-- Friends Tab End -->

				<!-- Profile Tab Start -->
				<li class="nav-item">
					<a class="nav-link p-0 py-xl-3" id="profile-tab" href="#profile-content" title="Profile">
						<!-- Default :: Inline SVG -->
						<svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>

						<!-- Alternate :: External File link -->
						<!-- <img class="injectable hw-24" src="./assets/img/heroicons/outline/user-circle.svg" alt="Profile icon"> -->
					</a>
				</li>
				<!-- Profile Tab End -->
			</ul>
			<!-- Main Nav End -->
		</div>
		<!-- Navigation End -->

		<!-- Sidebar Start -->
		<aside class="sidebar">
			<!-- Tab Content Start -->
			<div class="tab-content">
				<!-- Chat Tab Content Start -->
				<div class="tab-pane active" id="chats-content">
					<div class="d-flex flex-column h-100">
						<div class="hide-scrollbar h-100" id="chatContactsList">
							<!-- Chat Header Start -->
							<div class="sidebar-header sticky-top p-2">
								<div class="d-flex justify-content-between align-items-center">
									<!-- Chat Tab Pane Title Start -->
									<h5 class="font-weight-semibold mb-0"><?php echo $session_row['name'] ?></h5>
									<!-- Chat Tab Pane Title End -->

									<ul class="nav flex-nowrap">
										<li class="nav-item list-inline-item mr-1">
											<a href="./assets/php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="btn btn-outline-secondary" id="logout_button">Logout</a>
										</li>
										<li class="nav-item list-inline-item mr-1">
											<a class="nav-link text-muted px-1" href="#" title="Notifications" role="button" data-toggle="modal" data-target="#notificationModal">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/bell.svg" alt=""> -->
											</a>
										</li>

										<li class="nav-item list-inline-item d-block d-xl-none mr-1">
											<a class="nav-link text-muted px-1" href="#" title="Appbar" data-toggle-appbar="">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
													<path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="hw-20" src="./assets/img/heroicons/outline/view-grid.svg" alt="" class="injectable hw-20"> -->
											</a>
										</li>

										<li class="nav-item list-inline-item mr-0">
											<div class="dropdown">
												<a class="nav-link text-muted px-1" href="#" role="button" title="Details" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<!-- Default :: Inline SVG -->
													<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
													</svg>

													<!-- Alternate :: External File link -->
													<!-- <img  class="injectable hw-20" src="./assets/img/heroicons/outline/dots-vertical.svg" alt=""> -->
												</a>

												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#startConversation">New Chat</a>
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#createGroup">Create Group</a>
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#inviteOthers">Invite Others</a>
												</div>
											</div>
										</li>
									</ul>
								</div>

								<!-- Sidebar Header Start -->
								<div class="sidebar-sub-header">
									<!-- Sidebar Header Dropdown Start -->
									<div class="dropdown mr-2">
										<!-- Dropdown Button Start -->
										<button class="btn btn-outline-default dropdown-toggle" type="button" data-chat-filter-list="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											All Chats
										</button>
										<!-- Dropdown Button End -->

										<!-- Dropdown Menu Start -->
										<div class="dropdown-menu">
											<a class="dropdown-item" data-chat-filter="" data-select="all-chats" href="#">All Chats</a>
											<a class="dropdown-item" data-chat-filter="" data-select="friends" href="#">Friends</a>
											<a class="dropdown-item" data-chat-filter="" data-select="groups" href="#">Groups</a>
											<a class="dropdown-item" data-chat-filter="" data-select="unread" href="#">Unread</a>
											<a class="dropdown-item" data-chat-filter="" data-select="archived" href="#">Archived</a>
										</div>
										<!-- Dropdown Menu End -->
									</div>
									<!-- Sidebar Header Dropdown End -->

									<!-- Sidebar Search Start -->
									<form class="form-inline">
										<div class="input-group">
											<input type="text" class="form-control search border-right-0 transparent-bg pr-0" placeholder="Search users" />
											<div class="input-group-append">
												<div class="input-group-text transparent-bg border-left-0" role="button">
													<!-- Default :: Inline SVG -->
													<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
													</svg>

													<!-- Alternate :: External File link -->
													<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/search.svg" alt=""> -->
												</div>
											</div>
										</div>
									</form>
									<!-- Sidebar Search End -->
								</div>
								<!-- Sidebar Header End -->
							</div>
							<!-- Chat Header End -->

							<!-- Chat Contact List Start -->
							<ul class="contacts-list" id="chatContactTab">
								<!-- Chat Item Start -->
								<!-- Chat Item End -->

								<!-- Chat Item Start -->
								<!-- Chat Item End -->
							</ul>
							<!-- Chat Contact List End -->
						</div>
					</div>
				</div>
				<!-- Chats Tab Content End -->

				<!-- Calls Tab Content Start -->
				<div class="tab-pane" id="calls-content">
					<div class="d-flex flex-column h-100">
						<div class="hide-scrollbar h-100" id="callContactsList">
							<!-- Chat Header Start -->
							<div class="sidebar-header sticky-top p-2">
								<div class="d-flex justify-content-between align-items-center">
									<!-- Chat Tab Pane Title Start -->
									<h5 class="font-weight-semibold mb-0">Calls</h5>
									<!-- Chat Tab Pane Title End -->

									<ul class="nav flex-nowrap">
										<li class="nav-item list-inline-item mr-1">
											<a class="nav-link text-muted px-1" href="#" title="Notifications" role="button" data-toggle="modal" data-target="#notificationModal">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img src="./assets/img/heroicons/outline/bell.svg" alt="" class="injectable hw-20"> -->
											</a>
										</li>

										<li class="nav-item list-inline-item mr-0">
											<div class="dropdown">
												<a class="nav-link text-muted px-1" href="#" role="button" title="Details" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<!-- Default :: Inline SVG -->
													<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
													</svg>

													<!-- Alternate :: External File link -->
													<!-- <img src="./assets/img/heroicons/outline/dots-vertical.svg" alt="" class="injectable hw-20"> -->
												</a>

												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#startConversation">New Chat</a>
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#createGroup">Create Group</a>
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#inviteOthers">Invite Others</a>
												</div>
											</div>
										</li>
									</ul>
								</div>

								<!-- Sidebar Header Start -->
								<div class="sidebar-sub-header">
									<!-- Sidebar Header Dropdown Start -->
									<div class="dropdown mr-2">
										<!-- Dropdown Button Start -->
										<button class="btn btn-outline-default dropdown-toggle" type="button" data-chat-filter-list="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											All Chats
										</button>
										<!-- Dropdown Button End -->

										<!-- Dropdown Menu Start -->
										<div class="dropdown-menu">
											<a class="dropdown-item" data-chat-filter="" data-select="all-chats" href="#">All Chats</a>
											<a class="dropdown-item" data-chat-filter="" data-select="friends" href="#">Friends</a>
											<a class="dropdown-item" data-chat-filter="" data-select="groups" href="#">Groups</a>
											<a class="dropdown-item" data-chat-filter="" data-select="unread" href="#">Unread</a>
											<a class="dropdown-item" data-chat-filter="" data-select="archived" href="#">Archived</a>
										</div>
										<!-- Dropdown Menu End -->
									</div>
									<!-- Sidebar Header Dropdown End -->

									<!-- Sidebar Search Start -->
									<form class="form-inline">
										<div class="input-group">
											<input type="text" class="form-control search border-right-0 transparent-bg pr-0" placeholder="Search users" />
											<div class="input-group-append">
												<div class="input-group-text transparent-bg border-left-0" role="button">
													<!-- Default :: Inline SVG -->
													<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
													</svg>

													<!-- Alternate :: External File link -->
													<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/search.svg" alt=""> -->
												</div>
											</div>
										</div>
									</form>
									<!-- Sidebar Search End -->
								</div>
								<!-- Sidebar Header End -->
							</div>
							<!-- Chat Header End -->

							<!-- Call Contact List Start -->
							<ul class="contacts-list" id="callLogTab" data-call-list="">
								<!-- Call Item Start -->
								<li class="contacts-item incoming active">
									<a href="#" class="media-link"></a>
									<div class="contacts-link">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Catherine Richardson
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path d="M14.414 7l3.293-3.293a1 1 0 00-1.414-1.414L13 5.586V4a1 1 0 10-2 0v4.003a.996.996 0 00.617.921A.997.997 0 0012 9h4a1 1 0 100-2h-1.586z" />
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/phone-incoming.svg" alt=""> -->
												<p class="text-muted mb-0">Just now</p>
											</div>
										</div>
										<div class="contacts-action">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</li>
								<!-- Call Item End -->

								<!-- Call Item Start -->
								<li class="contacts-item outgoing">
									<a href="#" class="media-link"></a>
									<div class="contacts-link outgoing">
										<div class="avatar bg-info text-light">
											<span>EW</span>
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">Eva Walker</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path d="M17.924 2.617a.997.997 0 00-.215-.322l-.004-.004A.997.997 0 0017 2h-4a1 1 0 100 2h1.586l-3.293 3.293a1 1 0 001.414 1.414L16 5.414V7a1 1 0 102 0V3a.997.997 0 00-.076-.383z" />
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/phone-outgoing.svg" alt=""> -->
												<p class="text-muted mb-0">5 mins ago</p>
											</div>
										</div>
										<div class="contacts-action">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</li>
								<!-- Call Item End -->

								<!-- Call Item Start -->
								<li class="contacts-item missed">
									<a href="#" class="media-link"></a>
									<div class="contacts-link missed">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Christopher Garcia
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-danger mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path d="M14.414 7l3.293-3.293a1 1 0 00-1.414-1.414L13 5.586V4a1 1 0 10-2 0v4.003a.996.996 0 00.617.921A.997.997 0 0012 9h4a1 1 0 100-2h-1.586z" />
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-danger mr-1" src="./assets/img/heroicons/solid/phone-incoming.svg" alt=""> -->
												<p class="text-danger mb-0">20 mins ago</p>
											</div>
										</div>
										<div class="contacts-action">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</li>
								<!-- Call Item End -->
							</ul>
							<!-- Call Contact List Start -->
						</div>
					</div>
				</div>
				<!-- Calls Tab Content End -->

				<!-- Friends Tab Content Start -->
				<div class="tab-pane" id="friends-content">
					<div class="d-flex flex-column h-100">
						<div class="hide-scrollbar" id="friendsList">
							<!-- Chat Header Start -->
							<div class="sidebar-header sticky-top p-2">
								<div class="d-flex justify-content-between align-items-center">
									<!-- Chat Tab Pane Title Start -->
									<h5 class="font-weight-semibold mb-0">Friends</h5>
									<!-- Chat Tab Pane Title End -->

									<ul class="nav flex-nowrap">
										<li class="nav-item list-inline-item mr-1">
											<a class="nav-link text-muted px-1" href="#" title="Notifications" role="button" data-toggle="modal" data-target="#notificationModal">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img src="./assets/img/heroicons/outline/bell.svg" alt="" class="injectable hw-20"> -->
											</a>
										</li>

										<li class="nav-item list-inline-item mr-0">
											<div class="dropdown">
												<a class="nav-link text-muted px-1" href="#" role="button" title="Details" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<!-- Default :: Inline SVG -->
													<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
													</svg>

													<!-- Alternate :: External File link -->
													<!-- <img src="./assets/img/heroicons/outline/dots-vertical.svg" alt="" class="injectable hw-20"> -->
												</a>

												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#startConversation">New Chat</a>
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#createGroup">Create Group</a>
													<a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#inviteOthers">Invite Others</a>
												</div>
											</div>
										</li>
									</ul>
								</div>

								<!-- Sidebar Header Start -->
								<div class="sidebar-sub-header">
									<!-- Sidebar Header Dropdown Start -->
									<div class="dropdown mr-2">
										<!-- Dropdown Button Start -->
										<button class="btn btn-outline-default dropdown-toggle" type="button" data-chat-filter-list="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											All Chats
										</button>
										<!-- Dropdown Button End -->

										<!-- Dropdown Menu Start -->
										<div class="dropdown-menu">
											<a class="dropdown-item" data-chat-filter="" data-select="all-chats" href="#">All Chats</a>
											<a class="dropdown-item" data-chat-filter="" data-select="friends" href="#">Friends</a>
											<a class="dropdown-item" data-chat-filter="" data-select="groups" href="#">Groups</a>
											<a class="dropdown-item" data-chat-filter="" data-select="unread" href="#">Unread</a>
											<a class="dropdown-item" data-chat-filter="" data-select="archived" href="#">Archived</a>
										</div>
										<!-- Dropdown Menu End -->
									</div>
									<!-- Sidebar Header Dropdown End -->

									<!-- Sidebar Search Start -->
									<form class="form-inline">
										<div class="input-group">
											<input type="text" class="form-control search border-right-0 transparent-bg pr-0" placeholder="Search users" />
											<div class="input-group-append">
												<div class="input-group-text transparent-bg border-left-0" role="button">
													<!-- Default :: Inline SVG -->
													<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
													</svg>

													<!-- Alternate :: External File link -->
													<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/search.svg" alt=""> -->
												</div>
											</div>
										</div>
									</form>
									<!-- Sidebar Search End -->
								</div>
								<!-- Sidebar Header End -->
							</div>
							<!-- Chat Header End -->

							<!-- Friends Contact List Start -->
							<ul class="contacts-list" id="friendsTab" data-friends-list="">
								<!-- Item Series Start -->
								<li>
									<small class="font-weight-medium text-uppercase text-muted">A</small>
								</li>
								<!-- Item Series End -->

								<!-- friends Item Start -->
								<li class="contacts-item active">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Albert K. Johansen
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">San Fransisco, CA</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Alice R. Botello
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Brentwood, NY</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- Item Series Start -->
								<li>
									<small class="font-weight-medium text-uppercase text-muted">b</small>
								</li>
								<!-- Item Series End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Brittany K. Williams
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Scranton, PA</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- Item Series Start -->
								<li>
									<small class="font-weight-medium text-uppercase text-muted">C</small>
								</li>
								<!-- Item Series End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Christopher Garcia
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Riverside, CA</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">Casey Mcbride</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Zephyr, NC</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- Item Series Start -->
								<li>
									<small class="font-weight-medium text-uppercase text-muted">G</small>
								</li>
								<!-- Item Series End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">Gemma Mendez</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Frederick, MD</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- Item Series Start -->
								<li>
									<small class="font-weight-medium text-uppercase text-muted">k</small>
								</li>
								<!-- Item Series End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Katelyn Valdez
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Jackson, TN</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Katherine Schneider
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Saginaw, MI</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- Item Series Start -->
								<li>
									<small class="font-weight-medium text-uppercase text-muted">m</small>
								</li>
								<!-- Item Series End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Maizie Edwards
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Greensboro, NC</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->

								<!-- Item Series Start -->
								<li>
									<small class="font-weight-medium text-uppercase text-muted">s</small>
								</li>
								<!-- Item Series End -->

								<!-- friends Item Start -->
								<li class="contacts-item">
									<a class="contacts-link" href="#">
										<div class="avatar">
											<img src="./assets/img/avatar/1.png" alt="" />
										</div>
										<div class="contacts-content">
											<div class="contacts-info">
												<h6 class="chat-name text-truncate">
													Susan K. Taylor
												</h6>
											</div>
											<div class="contacts-texts">
												<!-- Default :: Inline SVG -->
												<svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-16 text-muted mr-1" src="./assets/img/heroicons/solid/location-marker.svg" alt=""> -->
												<p class="text-muted mb-0">Centerville, VA</p>
											</div>
										</div>
									</a>
								</li>
								<!-- friends Item End -->
							</ul>
							<!-- Friends Contact List End -->
						</div>
					</div>
				</div>
				<!-- Friends Tab Content End -->

				<!-- Profile Tab Content Start -->
				<div class="tab-pane" id="profile-content">
					<div class="d-flex flex-column h-100">
						<div class="hide-scrollbar">
							<!-- Sidebar Header Start -->
							<div class="sidebar-header sticky-top p-2 mb-3">
								<h5 class="font-weight-semibold">Profile</h5>
								<p class="text-muted mb-0">Personal Information & Settings</p>
							</div>
							<!-- Sidebar Header end -->

							<!-- Sidebar Content Start -->
							<div class="container-xl">
								<div class="row">
									<div class="col">
										<!-- Card Start -->
										<div class="card card-body card-bg-5">
											<!-- Card Details Start -->
											<div class="d-flex flex-column align-items-center">
												<div class="avatar avatar-lg mb-3">
													<img class="avatar-img" src="./assets/img/avatar/1.png" alt="" />
												</div>

												<div class="d-flex flex-column align-items-center">
													<h5>Catherine Richardson</h5>
												</div>

												<div class="d-flex">
													<button class="btn btn-outline-default mx-1" type="button">
														<!-- Default :: Inline SVG -->
														<svg class="hw-18 d-none d-sm-inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable hw-18 d-sm-inline-block" src="./assets/img/heroicons/outline/logout.svg" alt=""> -->
														<span>Logout</span>
													</button>
													<button class="btn btn-outline-default mx-1 d-xl-none" data-profile-edit="" type="button">
														<!-- Default :: Inline SVG -->
														<svg class="hw-18 d-none d-sm-inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable hw-18 d-sm-inline-block" src="./assets/img/heroicons/outline/cog.svg" alt=""> -->
														<span>Settings</span>
													</button>
												</div>
											</div>
											<!-- Card Details End -->

											<!-- Card Options Start -->
											<div class="card-options">
												<div class="dropdown">
													<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<!-- Default :: Inline SVG -->
														<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/dots-vertical.svg" alt=""> -->
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Change Profile Picture</a>
														<a class="dropdown-item" href="#">Change Number</a>
													</div>
												</div>
											</div>
											<!-- Card Options End -->
										</div>
										<!-- Card End -->

										<!-- Card Start -->
										<div class="card mt-3">
											<!-- List Group Start -->
											<ul class="list-group list-group-flush">
												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Local Time</p>
															<p class="mb-0">10:25 PM</p>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/heroicons/outline/clock.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->

												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Birthdate</p>
															<p class="mb-0">20/11/1992</p>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/heroicons/outline/calendar.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->

												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Phone</p>
															<p class="mb-0">+01-222-364522</p>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/heroicons/outline/phone.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->

												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Email</p>
															<p class="mb-0">
																catherine.richardson@gmail.com
															</p>
														</div>

														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/heroicons/outline/mail.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->

												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Website</p>
															<p class="mb-0">www.catherichardson.com</p>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/heroicons/outline/globe.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->

												<!-- List Group Item Start -->
												<li class="list-group-item pt-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Address</p>
															<p class="mb-0">
																1134 Ridder Park Road, San Fransisco, CA 94851
															</p>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/heroicons/outline/home.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->
											</ul>
											<!-- List Group End -->
										</div>
										<!-- Card End -->

										<!-- Card Start -->
										<div class="card my-3">
											<!-- List Group Start -->
											<ul class="list-group list-group-flush">
												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Facebook</p>
															<a class="font-size-sm font-weight-medium" href="#">@cathe.richardson</a>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
															<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/icons/facebook.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->

												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Twitter</p>
															<a class="font-size-sm font-weight-medium" href="#">@cathe.richardson</a>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
															<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/icons/twitter.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->

												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Instagram</p>
															<a class="font-size-sm font-weight-medium" href="#">@cathe.richardson</a>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
															<rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
															<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
															<line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/icons/instagram.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->

												<!-- List Group Item Start -->
												<li class="list-group-item py-2">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="small text-muted mb-0">Linkedin</p>
															<a class="font-size-sm font-weight-medium" href="#">@cathe.richardson</a>
														</div>
														<!-- Default :: Inline SVG -->
														<svg class="text-muted hw-20 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
															<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
															<rect x="2" y="9" width="4" height="12" />
															<circle cx="4" cy="4" r="2" />
														</svg>

														<!-- Alternate :: External File link -->
														<!-- <img class="injectable text-muted hw-20 ml-1" src="./assets/img/icons/linkedin.svg" alt=""> -->
													</div>
												</li>
												<!-- List Group Item End -->
											</ul>
											<!-- List Group End -->
										</div>
										<!-- Card End -->
									</div>
								</div>
							</div>
							<!-- Sidebar Content End -->
						</div>
					</div>
				</div>
				<!-- Profile Tab Content End -->
			</div>
			<!-- Tab Content End -->
		</aside>
		<!-- Sidebar End -->

		<!-- Main Start -->
		<main class="main">

			<!-- Chats Page Start -->
			<div class="chats">
				<div class="d-flex flex-column justify-content-center text-center h-100 w-100">
					<div class="container">
						<div class="avatar avatar-lg mb-2">
							<img class="avatar-img" src="./assets/storage/<?php echo ($row['img']); ?>" alt="">
						</div>

						<h5>Welcome, <?php echo ($row['name']); ?>!</h5>
						<p class="text-muted">Please select a chat to Start messaging.</p>

						<button class="btn btn-outline-primary no-box-shadow" type="button" data-toggle="modal" data-target="#startConversation">
							Start a conversation
						</button>
					</div>
				</div>
			</div>
			<!-- Chats Page End -->

			<!-- Call Log Page Start -->
			<div class="calls px-0 py-2 p-xl-3">
				<div class="container-xl">
					<div class="row">
						<div class="col">
							<div class="card card-bg-1 mb-3">
								<div class="card-body">
									<div class="d-flex flex-column align-items-center">
										<div class="avatar avatar-lg mb-3">
											<img class="avatar-img" src="./../../assets/media/avatar/2.png" alt="">
										</div>

										<div class="d-flex flex-column align-items-center">
											<h5 class="mb-1">Catherine Richardson</h5>
											<p class="text-white rounded px-2 bg-primary">+01-202-265462</p>
										</div>
									</div>
								</div>

								<div class="card-options">
									<div class="dropdown">
										<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
											</svg>

											<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/dots-vertical.svg" alt=""> -->
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Clear Call Log</a>
											<a class="dropdown-item" href="#">Block</a>
										</div>
									</div>
								</div>

								<div class="chat-closer d-xl-none">
									<!-- Chat Back Button (Visible only in Small Devices) -->
									<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button" data-close="">
										<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
										</svg>

										<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/arrow-left.svg" alt=""> -->
									</button>
								</div>

							</div>
						</div>
					</div>

					<div class="row calls-log">
						<div class="col">
							<div class="card">
								<div class="card-body">
									<div class="media">
										<div class="avatar avatar-primary mr-2">
											<span>
												<svg class="hw-24" viewBox="0 0 20 20" fill="currentColor">
													<path d="M14.414 7l3.293-3.293a1 1 0 00-1.414-1.414L13 5.586V4a1 1 0 10-2 0v4.003a.996.996 0 00.617.921A.997.997 0 0012 9h4a1 1 0 100-2h-1.586z"></path>
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
												</svg>

												<!-- <img class="injectable hw-24" src="./../../assets/media/heroicons/solid/phone-incoming.svg" alt=""> -->
											</span>
										</div>

										<div class="media-body">
											<h6>Incoming Call</h6>

											<div class="d-flex flex-column flex-sm-row align-items-sm-center align-items-start">
												<p class="text-muted mb-0">Just now</p><span class="d-none d-sm-block text-muted mx-2">•</span>
												<p class="text-muted mb-0">2m 35s</p>
											</div>
										</div>

										<div class="media-options ml-1 d-none d-sm-block">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
												</svg>

												<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="media">
										<div class="avatar avatar-primary mr-2">
											<span>
												<svg class="hw-24" viewBox="0 0 20 20" fill="currentColor">
													<path d="M17.924 2.617a.997.997 0 00-.215-.322l-.004-.004A.997.997 0 0017 2h-4a1 1 0 100 2h1.586l-3.293 3.293a1 1 0 001.414 1.414L16 5.414V7a1 1 0 102 0V3a.997.997 0 00-.076-.383z"></path>
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
												</svg>

												<!-- <img class="injectable hw-24" src="./../../assets/media/heroicons/solid/phone-outgoing.svg" alt=""> -->
											</span>
										</div>

										<div class="media-body">
											<h6>Outgoing Call</h6>

											<div class="d-flex flex-column flex-sm-row align-items-sm-center align-items-start">
												<p class="text-muted mb-0">5 mins ago</p><span class="d-none d-sm-block text-muted mx-2">•</span>
												<p class="text-muted mb-0">12m 25s</p>
											</div>
										</div>

										<div class="media-options ml-1 d-none d-sm-block">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
												</svg>

												<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="media">
										<div class="avatar avatar-primary mr-2">
											<span>
												<svg class="hw-24" viewBox="0 0 20 20" fill="currentColor">
													<path d="M14.414 7l3.293-3.293a1 1 0 00-1.414-1.414L13 5.586V4a1 1 0 10-2 0v4.003a.996.996 0 00.617.921A.997.997 0 0012 9h4a1 1 0 100-2h-1.586z"></path>
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
												</svg>
												<!-- <img class="injectable hw-24" src="./../../assets/media/heroicons/solid/phone-incoming.svg" alt=""> -->
											</span>
										</div>

										<div class="media-body">
											<h6 class="text-danger">Missed Call</h6>

											<div class="d-flex flex-column flex-sm-row align-items-sm-center align-items-start">
												<p class="text-muted mb-0">18 mins ago</p>
											</div>
										</div>

										<div class="media-options ml-1 d-none d-sm-block">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
												</svg>
												<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="media">
										<div class="avatar avatar-primary mr-2">
											<span>
												<svg class="hw-24" viewBox="0 0 20 20" fill="currentColor">
													<path d="M17.924 2.617a.997.997 0 00-.215-.322l-.004-.004A.997.997 0 0017 2h-4a1 1 0 100 2h1.586l-3.293 3.293a1 1 0 001.414 1.414L16 5.414V7a1 1 0 102 0V3a.997.997 0 00-.076-.383z"></path>
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
												</svg>

												<!-- <img class="injectable hw-24" src="./../../assets/media/heroicons/solid/phone-outgoing.svg" alt=""> -->
											</span>
										</div>

										<div class="media-body">
											<h6>Outgoing Call</h6>

											<div class="d-flex flex-column flex-sm-row align-items-sm-center align-items-start">
												<p class="text-muted mb-0">Yesterday at 10:45PM</p><span class="d-none d-sm-block text-muted mx-2">•</span>
												<p class="text-muted mb-0">25m 18s</p>
											</div>
										</div>

										<div class="media-options ml-1 d-none d-sm-block">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
												</svg>
												<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="media">
										<div class="avatar avatar-primary mr-2">
											<span>
												<svg class="hw-24" viewBox="0 0 20 20" fill="currentColor">
													<path d="M14.414 7l3.293-3.293a1 1 0 00-1.414-1.414L13 5.586V4a1 1 0 10-2 0v4.003a.996.996 0 00.617.921A.997.997 0 0012 9h4a1 1 0 100-2h-1.586z"></path>
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
												</svg>
												<!-- <img class="injectable hw-24" src="./../../assets/media/heroicons/solid/phone-incoming.svg" alt=""> -->
											</span>
										</div>

										<div class="media-body">
											<h6>Incoming Call</h6>

											<div class="d-flex flex-column flex-sm-row align-items-sm-center align-items-start">
												<p class="text-muted mb-0">16/05/2020 at 11:49AM</p><span class="d-none d-sm-block text-muted mx-2">•</span>
												<p class="text-muted mb-0">0m 56s</p>
											</div>
										</div>

										<div class="media-options ml-1 d-none d-sm-block">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
												</svg>
												<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="media">
										<div class="avatar avatar-primary mr-2">
											<span>
												<svg class="hw-24" viewBox="0 0 20 20" fill="currentColor">
													<path d="M14.414 7l3.293-3.293a1 1 0 00-1.414-1.414L13 5.586V4a1 1 0 10-2 0v4.003a.996.996 0 00.617.921A.997.997 0 0012 9h4a1 1 0 100-2h-1.586z"></path>
													<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
												</svg>
												<!-- <img class="injectable hw-24" src="./../../assets/media/heroicons/solid/phone-incoming.svg" alt=""> -->
											</span>
										</div>

										<div class="media-body">
											<h6>Incoming Call</h6>

											<div class="d-flex flex-column flex-sm-row align-items-sm-center align-items-start">
												<p class="text-muted mb-0">14/05/2020 at 11:49AM</p><span class="d-none d-sm-block text-muted mx-2">•</span>
												<p class="text-muted mb-0">24m 19s</p>
											</div>
										</div>

										<div class="media-options ml-1 d-none d-sm-block">
											<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button">
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
												</svg>
												<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/phone.svg" alt=""> -->
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Call Log Page End -->

			<!-- Friends Page Start -->
			<div class="friends px-0 py-2 p-xl-3">
				<div class="container-xl">
					<div class="row">
						<div class="col">
							<div class="card card-body card-bg-1 mb-3">
								<div class="d-flex flex-column align-items-center">
									<div class="avatar avatar-lg mb-3">
										<img class="avatar-img" src="./../../assets/media/avatar/3.png" alt="">
									</div>

									<div class="d-flex flex-column align-items-center">
										<h5 class="mb-1">Catherine Richardson</h5>
										<!-- <p class="text-white rounded px-2 bg-primary">+01-202-265462</p> -->
										<div class="d-flex mt-2">
											<div class="btn btn-primary btn-icon rounded-circle text-light mx-2">
												<svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
												</svg>
												<!-- <img class="injectable hw-24" src="./../../assets/media/heroicons/outline/chat.svg" alt=""> -->
											</div>
											<div class="btn btn-success btn-icon rounded-circle text-light mx-2">
												<svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
												</svg>

												<!-- <img class="injectable hw-24" src="./../../assets/media/heroicons/outline/phone.svg" alt=""> -->
											</div>
										</div>
									</div>
								</div>

								<div class="card-options">
									<div class="dropdown">
										<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
											</svg>

											<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/dots-vertical.svg" alt=""> -->
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Remove</a>
											<a class="dropdown-item" href="#">Block</a>
										</div>
									</div>
								</div>

								<div class="chat-closer d-xl-none">
									<!-- Chat Back Button (Visible only in Small Devices) -->
									<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button" data-close="">
										<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
										</svg>

										<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/arrow-left.svg" alt=""> -->
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="row friends-info">
						<div class="col">
							<div class="card">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Local Time</p>
												<p class="mb-0">10:25 PM</p>
											</div>
											<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/heroicons/outline/clock.svg" alt=""> -->
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Birthdate</p>
												<p class="mb-0">20/11/1992</p>
											</div>
											<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
											</svg>

											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/heroicons/outline/calendar.svg" alt=""> -->
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Phone</p>
												<p class="mb-0">+01-222-364522</p>
											</div>
											<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/heroicons/outline/phone.svg" alt=""> -->
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Email</p>
												<p class="mb-0">catherine.richardson@gmail.com</p>
											</div>
											<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/heroicons/outline/mail.svg" alt=""> -->
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Website</p>
												<p class="mb-0">www.catherichardson.com</p>
											</div>
											<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/heroicons/outline/globe.svg" alt=""> -->
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Address</p>
												<p class="mb-0">1134 Ridder Park Road, San Fransisco, CA 94851</p>
											</div>
											<svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/heroicons/outline/home.svg" alt=""> -->
										</div>
									</li>
								</ul>
							</div>


							<div class="card">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Facebook</p>
												<a class="font-size-sm font-weight-medium" href="#">@cathe.richardson</a>
											</div>
											<svg class="text-muted hw-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/icons/facebook.svg" alt=""> -->
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Twitter</p>
												<a class="font-size-sm font-weight-medium" href="#">@cathe.richardson</a>
											</div>
											<svg class="text-muted hw-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/icons/twitter.svg" alt=""> -->
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Instagram</p>
												<a class="font-size-sm font-weight-medium" href="#">@cathe.richardson</a>
											</div>
											<svg class="text-muted hw-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
												<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
												<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/icons/instagram.svg" alt=""> -->
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="small text-muted mb-0">Linkedin</p>
												<a class="font-size-sm font-weight-medium" href="#">@cathe.richardson</a>
											</div>
											<svg class="text-muted hw-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
												<rect x="2" y="9" width="4" height="12"></rect>
												<circle cx="4" cy="4" r="2"></circle>
											</svg>
											<!-- <img class="injectable text-muted hw-20" src="./../../assets/media/icons/linkedin.svg" alt=""> -->
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Friends Page End -->

			<!-- Profile Settings Start -->
			<div class="profile">
				<div class="page-main-heading sticky-top py-2 px-3 mb-3">

					<!-- Chat Back Button (Visible only in Small Devices) -->
					<button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted d-xl-none" type="button" data-close="">
						<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
						</svg>
						<!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/arrow-left.svg" alt=""> -->
					</button>

					<div class="pl-2 pl-xl-0">
						<h5 class="font-weight-semibold">Settings</h5>
						<p class="text-muted mb-0">Update Personal Information &amp; Settings</p>
					</div>
				</div>

				<div class="container-xl px-2 px-sm-3">
					<div class="row">
						<div class="col">
							<div class="card mb-3">
								<div class="card-header">
									<h6 class="mb-1">Account</h6>
									<p class="mb-0 text-muted small">Update personal &amp; contact information</p>
								</div>

								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="firstName">First Name</label>
												<input type="text" class="form-control form-control-md" id="firstName" placeholder="Type your first name" value="Catherine">
											</div>
										</div>
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="lastName">Last Name</label>
												<input type="text" class="form-control form-control-md" id="lastName" placeholder="Type your last name" value="Richardson">
											</div>
										</div>
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="mobileNumber">Mobile number</label>
												<input type="text" class="form-control form-control-md" id="mobileNumber" placeholder="Type your mobile number" value="+01-222-364522">
											</div>
										</div>
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="birthDate">Birth date</label>
												<input type="text" class="form-control form-control-md" id="birthDate" placeholder="dd/mm/yyyy" value="20/11/1992">
											</div>
										</div>
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="emailAddress">Email address</label>
												<input type="email" class="form-control form-control-md" id="emailAddress" placeholder="Type your email address" value="catherine.richardson@gmail.com">
											</div>
										</div>
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="webSite">Website</label>
												<input type="text" class="form-control form-control-md" id="webSite" placeholder="Type your website" value="www.catherichardson.com">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label for="Address">Address</label>
												<input type="text" class="form-control form-control-md" id="Address" placeholder="Type your address" value="1134 Ridder Park Road, San Fransisco, CA 94851">
											</div>
										</div>
									</div>
								</div>

								<div class="card-footer d-flex justify-content-end">
									<button type="button" class="btn btn-link text-muted mx-1">Reset</button>
									<button type="button" class="btn btn-primary">Save Changes</button>
								</div>
							</div>

							<div class="card mb-3">
								<div class="card-header">
									<h6 class="mb-1">Social network profiles</h6>
									<p class="mb-0 text-muted small">Update personal &amp; contact information</p>
								</div>

								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="facebookId">Facebook</label>
												<input type="text" class="form-control form-control-md" id="facebookId" placeholder="Username">
											</div>
										</div>
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="twitterId">Twitter</label>
												<input type="text" class="form-control form-control-md" id="twitterId" placeholder="Username">
											</div>
										</div>
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="instagramId">Instagram</label>
												<input type="text" class="form-control form-control-md" id="instagramId" placeholder="Username">
											</div>
										</div>
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="linkedinId">Linkedin</label>
												<input type="text" class="form-control form-control-md" id="linkedinId" placeholder="Username">
											</div>
										</div>
									</div>
								</div>

								<div class="card-footer d-flex justify-content-end">
									<button type="button" class="btn btn-link text-muted mx-1">Reset</button>
									<button type="button" class="btn btn-primary">Save Changes</button>
								</div>
							</div>

							<div class="card mb-3">
								<div class="card-header">
									<h6 class="mb-1">Password</h6>
									<p class="mb-0 text-muted small">Update personal &amp; contact information</p>
								</div>

								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="current-password">Current Password</label>
													<input type="password" class="form-control form-control-md" id="current-password" placeholder="Current password" autocomplete="on">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="new-password">New Password</label>
													<input type="password" class="form-control form-control-md" id="new-password" placeholder="New password" autocomplete="off">
												</div>
											</div>
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="repeat-password">Repeat Password</label>
													<input type="password" class="form-control form-control-md" id="repeat-password" placeholder="Repeat password" autocomplete="off">
												</div>
											</div>
										</div>
									</form>
								</div>

								<div class="card-footer d-flex justify-content-end">
									<button type="button" class="btn btn-link text-muted mx-1">Reset</button>
									<button type="button" class="btn btn-primary">Save Changes</button>
								</div>
							</div>

							<div class="card mb-3">
								<div class="card-header">
									<h6 class="mb-1">Privacy</h6>
									<p class="mb-0 text-muted small">Update personal &amp; contact information</p>
								</div>

								<div class="card-body p-0">
									<ul class="list-group list-group-flush list-group-sm-column">

										<li class="list-group-item py-2">
											<div class="media align-items-center">
												<div class="media-body">
													<p class="mb-0">Profile Picture</p>
													<p class="small text-muted mb-0">Select who can see my profile picture</p>
												</div>
												<div class="dropdown mr-2">
													<button class="btn btn-outline-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Public
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Public</a>
														<a class="dropdown-item" href="#">Friends</a>
														<a class="dropdown-item" href="#">Selected Friends</a>
													</div>
												</div>
											</div>
										</li>

										<li class="list-group-item py-2">
											<div class="media align-items-center">
												<div class="media-body">
													<p class="mb-0">Last Seen</p>
													<p class="small text-muted mb-0">Select who can see my last seen</p>
												</div>
												<div class="dropdown mr-2">
													<button class="btn btn-outline-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Public
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Public</a>
														<a class="dropdown-item" href="#">Friends</a>
														<a class="dropdown-item" href="#">Selected Friends</a>
													</div>
												</div>
											</div>
										</li>

										<li class="list-group-item py-2">
											<div class="media align-items-center">
												<div class="media-body">
													<p class="mb-0">Groups</p>
													<p class="small text-muted mb-0">Select who can add you in groups</p>
												</div>
												<div class="dropdown mr-2">
													<button class="btn btn-outline-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Public
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Public</a>
														<a class="dropdown-item" href="#">Friends</a>
														<a class="dropdown-item" href="#">Selected Friends</a>
													</div>
												</div>
											</div>
										</li>

										<li class="list-group-item py-2">
											<div class="media align-items-center">
												<div class="media-body">
													<p class="mb-0">Status</p>
													<p class="small text-muted mb-0">Select who can see my status updates</p>
												</div>
												<div class="dropdown mr-2">
													<button class="btn btn-outline-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Public
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Public</a>
														<a class="dropdown-item" href="#">Friends</a>
														<a class="dropdown-item" href="#">Selected Friends</a>
													</div>
												</div>
											</div>
										</li>

										<li class="list-group-item py-2">
											<div class="media align-items-center">
												<div class="media-body">
													<p class="mb-0">Read receipts</p>
													<p class="small text-muted mb-0">If turn off this option you won't be able to see read recipts</p>
												</div>
												<div class="custom-control custom-switch mr-2">
													<input type="checkbox" class="custom-control-input" id="readReceiptsSwitch" checked="">
													<label class="custom-control-label" for="readReceiptsSwitch">&nbsp;</label>
												</div>
											</div>
										</li>

									</ul>
								</div>

								<div class="card-footer d-flex justify-content-end">
									<button type="button" class="btn btn-link text-muted mx-1">Reset</button>
									<button type="button" class="btn btn-primary">Save Changes</button>
								</div>
							</div>

							<div class="card mb-3">
								<div class="card-header">
									<h6 class="mb-1">Security</h6>
									<p class="mb-0 text-muted small">Update personal &amp; contact information</p>
								</div>

								<div class="card-body p-0">
									<ul class="list-group list-group-flush list-group-sm-column">
										<li class="list-group-item py-2">
											<div class="media align-items-center">
												<div class="media-body">
													<p class="mb-0">Use two-factor authentication</p>
													<p class="small text-muted mb-0">Ask for a code if attempted login from an unrecognised device or browser.</p>
												</div>
												<div class="custom-control custom-switch mr-2">
													<input type="checkbox" class="custom-control-input" id="twoFactorSwitch" checked="">
													<label class="custom-control-label" for="twoFactorSwitch">&nbsp;</label>
												</div>
											</div>
										</li>
										<li class="list-group-item py-2">
											<div class="media align-items-center">
												<div class="media-body">
													<p class="mb-0">Get alerts about unrecognised logins</p>
													<p class="small text-muted mb-0">You will be notified if anyone logs in from a device or browser you don't usually use</p>
												</div>
												<div class="custom-control custom-switch mr-2">
													<input type="checkbox" class="custom-control-input" id="unrecognisedSwitch" checked="">
													<label class="custom-control-label" for="unrecognisedSwitch">&nbsp;</label>
												</div>
											</div>
										</li>

									</ul>
								</div>

								<div class="card-footer d-flex justify-content-end">
									<button class="btn btn-link text-muted mx-1">Reset</button>
									<button class="btn btn-primary" type="button">Save Changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Profile Settings End -->

		</main>
		<!-- Main End -->



		<div class="backdrop"></div>

		<!-- All Modals Start -->

		<!-- Modal 1 :: Start a Conversation-->
		<div class="modal modal-lg-fullscreen fade" id="startConversation" tabindex="-1" role="dialog" aria-labelledby="startConversationLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="startConversationLabel">New Chat</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body p-0 hide-scrollbar">
						<div class="row">
							<div class="col-12">
								<!-- Search Start -->
								<form class="form-inline w-100 p-2 border-bottom">
									<div class="input-group w-100 bg-light">
										<input type="text" class="form-control form-control-md search border-right-0 transparent-bg pr-0" placeholder="Search" />
										<div class="input-group-append">
											<div class="input-group-text transparent-bg border-left-0" role="button">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/search.svg" alt=""> -->
											</div>
										</div>
									</div>
								</form>
								<!-- Search End -->
							</div>

							<div class="col-12">
								<!-- List Group Start -->
								<ul class="list-group list-group-flush">
									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-online mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>

											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Catherine Richardson</a>
												</h6>

												<p class="text-muted mb-0">Online</p>
											</div>
										</div>
									</li>
									<!-- List Group Item End -->

									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-online mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>

											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Katherine Schneider</a>
												</h6>

												<p class="text-muted mb-0">Online</p>
											</div>
										</div>
									</li>
									<!-- List Group Item End -->

									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-offline mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>

											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Brittany K. Williams</a>
												</h6>

												<p class="text-muted mb-0">Offline</p>
											</div>
										</div>
									</li>
									<!-- List Group Item End -->

									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-busy mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>
											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Christina Turner</a>
												</h6>
												<p class="text-muted mb-0">Busy</p>
											</div>
										</div>
									</li>
									<!-- List Group Item End -->

									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-away mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>

											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Annie Richardson</a>
												</h6>
												<p class="text-muted mb-0">Away</p>
											</div>
										</div>
									</li>
									<!-- List Group Item End -->
								</ul>
								<!-- List Group End -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal 2 :: Create Group -->
		<div class="modal modal-lg-fullscreen fade" id="createGroup" tabindex="-1" role="dialog" aria-labelledby="createGroupLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title js-title-step" id="createGroupLabel">
							&nbsp;
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body py-0 hide-scrollbar">
						<div class="row hide pt-2" data-step="1" data-title="Create a New Group">
							<div class="col-12">
								<div class="form-group">
									<label for="groupName">Group name</label>
									<input type="text" class="form-control form-control-md" id="groupName" placeholder="Type group name here" />
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label>Choose profile picture</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="profilePictureInput" accept="image/*" />
										<label class="custom-file-label" for="profilePictureInput">Choose file</label>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="row">
									<div class="col-12">
										<div class="form-group mb-0">
											<label>Group privacy</label>
										</div>
									</div>
									<div class="col">
										<div class="form-group rounded p-2 border">
											<div class="custom-control custom-radio">
												<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked />
												<label class="form-check-label" for="exampleRadios1">
													Public group
												</label>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group rounded p-2 border">
											<div class="custom-control custom-radio">
												<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" />
												<label class="form-check-label" for="exampleRadios2">
													Private group
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row hide pt-2" data-step="2" data-title="Add Group Members">
							<div class="col-12 px-0">
								<!-- Search Start -->
								<form class="form-inline w-100 px-2 pb-2 border-bottom">
									<div class="input-group w-100 bg-light">
										<input type="text" class="form-control form-control-md search border-right-0 transparent-bg pr-0" placeholder="Search" />
										<div class="input-group-append">
											<div class="input-group-text transparent-bg border-left-0" role="button">
												<!-- Default :: Inline SVG -->
												<svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
												</svg>

												<!-- Alternate :: External File link -->
												<!-- <img class="injectable hw-20" src="./assets/img/heroicons/outline/search.svg" alt=""> -->
											</div>
										</div>
									</div>
								</form>
								<!-- Search End -->
							</div>

							<div class="col-12 px-0">
								<!-- List Group Start -->
								<ul class="list-group list-group-flush">
									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-online mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>

											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Catherine Richardson</a>
												</h6>

												<p class="text-muted mb-0">Online</p>
											</div>

											<div class="media-options">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" value="" id="chx-user-1" checked="" />
													<label class="custom-control-label" for="chx-user-1"></label>
												</div>
											</div>
										</div>
										<label class="media-label" for="chx-user-1"></label>
									</li>
									<!-- List Group Item End -->

									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-online mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>

											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Katherine Schneider</a>
												</h6>

												<p class="text-muted mb-0">Online</p>
											</div>

											<div class="media-options">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" value="" id="chx-user-2" checked="" />
													<label class="custom-control-label" for="chx-user-2"></label>
												</div>
											</div>
										</div>
										<label class="media-label" for="chx-user-2"></label>
									</li>
									<!-- List Group Item End -->

									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-offline mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>

											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Brittany K. Williams</a>
												</h6>

												<p class="text-muted mb-0">Offline</p>
											</div>
											<div class="media-options">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" value="" id="chx-user-3" />
													<label class="custom-control-label" for="chx-user-3"></label>
												</div>
											</div>
										</div>
										<label class="media-label" for="chx-user-3"></label>
									</li>
									<!-- List Group Item End -->

									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-busy mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>
											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Christina Turner</a>
												</h6>
												<p class="text-muted mb-0">Busy</p>
											</div>
											<div class="media-options">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" value="" id="chx-user-4" checked="" />
													<label class="custom-control-label" for="chx-user-4"></label>
												</div>
											</div>
										</div>
										<label class="media-label" for="chx-user-4"></label>
									</li>
									<!-- List Group Item End -->

									<!-- List Group Item Start -->
									<li class="list-group-item">
										<div class="media">
											<div class="avatar avatar-away mr-2">
												<img src="./assets/img/avatar/1.png" alt="" />
											</div>

											<div class="media-body">
												<h6 class="text-truncate">
													<a href="#" class="text-reset">Annie Richardson</a>
												</h6>
												<p class="text-muted mb-0">Away</p>
											</div>
											<div class="media-options">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" value="" id="chx-user-5" />
													<label class="custom-control-label" for="chx-user-5"></label>
												</div>
											</div>
										</div>
										<label class="media-label" for="chx-user-5"></label>
									</li>
									<!-- List Group Item End -->
								</ul>
								<!-- List Group End -->
							</div>
						</div>

						<div class="row pt-2 h-100 hide" data-step="3" data-title="Finished">
							<div class="col-12">
								<div class="d-flex justify-content-center align-items-center flex-column h-100">
									<div class="btn btn-success btn-icon rounded-circle text-light mb-3">
										<!-- Default :: Inline SVG -->
										<svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
										</svg>

										<!-- Alternate :: External File link -->
										<!-- <img class="injectable hw-24" src="./assets/img/heroicons/outline/check.svg" alt=""> -->
									</div>
									<h6>Group Created Successfully</h6>
									<p class="text-muted text-center">
										Lorem ipsum dolor sit amet consectetur adipisicing elit.
										Dolores cumque laborum fugiat vero pariatur provident!
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link text-muted js-btn-step mr-auto" data-orientation="cancel" data-dismiss="modal"></button>
						<button type="button" class="btn btn-secondary js-btn-step" data-orientation="previous"></button>
						<button type="button" class="btn btn-primary js-btn-step" data-orientation="next"></button>
					</div>
				</div>
			</div>
		</div>

		<!-- All Modals End -->
	</div>
	<!-- Main Layout End -->

	<!-- Javascript Files -->
	<script src="./assets/js/jquery/jquery-3.5.0.min.js"></script>
	<script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="./assets/js/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="./assets/js/svg-inject/svg-inject.min.js"></script>
	<script src="./assets/js/modal-stepes/modal-steps.min.js"></script>
	<script src="./assets/js/emojione/emojionearea.min.js"></script>
	<script src="./assets/js/app.js"></script>
	<script src="./assets/js/users.js"></script>
	<script src="./assets/js/logout.js"></script>

	<script>
		// Scroll to end of chat
		document.querySelector(".chat-finished").scrollIntoView({
			block: "end", // "start" | "center" | "end" | "nearest",
			behavior: "auto", //"auto"  | "instant" | "smooth",
		});
	</script>
</body>

</html>