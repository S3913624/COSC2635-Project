<html>
	<head>
		<title>Cooks Collection | Categories</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<header class="main-header">
			<h1 class="team-name team-name-large">Cooks Collection</h1>
		</header>

		<!-- Sidebar -->
		<div class="sidebar bar-block border-right" style="display:none" id="Sidebar">
			<button onclick="sidebar_close()" class="sidebar-button xlarge ">&times;</button>
			<a href="index.html" class="bar-item sidebar-contents-button">Home</a>
			<a href="search.html" class="bar-item sidebar-contents-button">Search</a>
			<a href="categories.html" class="bar-item sidebar-contents-button">Categories</a>
			<a href="contact_us.html" class="bar-item sidebar-contents-button">Contact Us</a>
			</div>
		</div>

		<!-- Controls sidebar behaviour -->
		<script>
			function sidebar_open() {
			document.getElementById("Sidebar").style.display = "block";
			}
			
			function sidebar_close() {
			document.getElementById("Sidebar").style.display = "none";
			}
			</script>

		<!-- Burger button for sidebar -->
		<button class="sidebar-button xlarge" onclick="sidebar_open()">&#9776;</button>

		<!-- Content -->

		<section class="content-section container">
            <?php
                // Create connection
                $conn = mysqli_connect('localhost', 'root', '','db_contact');

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $output = "";
				$outputFinal = "<a href='index.html' class='buffer center'>Return to main</a>";
								

                if(isset($_GET["q"]) && $_GET["q"] !== "" && $_GET["q"] !== " ") {
                    $searchq = $_GET["q"];
                    
                    $q = mysqli_query($conn,
						"SELECT * FROM tbl_contact
						WHERE fldName LIKE '%$searchq%'
						OR fldEmail LIKE '%$searchq%'
						OR fldPhone LIKE '%$searchq%'")
						or die (mysqli_error($conn));

                    $c = mysqli_num_rows($q);
                    if ($c == 0) {
                        $output = '<h2 class="section-header">No results found</h2>';
                    } else {
                        while ($row = mysqli_fetch_array($q)){
                            $id = $row['Id'];
                            $name = $row['fldName'];
                            $email = $row['fldEmail'];
                            $phone = $row['fldPhone'];
                            $message = $row['fldMessage'];


                            $output .= "<div class='buffer center'>
                                        <h2><b>Name:</b> $name</h2>
                                        <p><b>Email: </b>$email</p>
                                        <p><b>Phone No.:</b> $phone</p>
                                        <p><b>Comments:</b> $message</p></div>";
                        }

                    }
                } else {
                    header("location: search.html");
                }
                print("$output");
				print($outputFinal);
                mysqli_close($conn);

            ?>
		</section>

		<!-- clear space to stop footer covering page content -->
		<div class="clear"></div>

		<footer class="main-footer">
			<div class="container main-footer-container">
				<h3 class="team-name">Arch-IT-ects</h3>
				<ul class="nav footer-nav">
					<li><a href="https://github.com/S3913624/COSC2635-Project" target="blank"><img src="Images/Github_Logo.png"></a></li>
					<li><a href="https://trello.com/b/GCaH8adM/oua-sp1-2022-the-arch-it-ects" target="blank"><img src="Images/Trello_Logo.png"></a></li>				
					<li><a href="https://teams.microsoft.com/l/team/19%3avBpYPZcjTf3SApKH2JYja066DpDA_lI-27kDuzStrEI1%40thread.tacv2/conversations?groupId=a51a27be-9bbc-4199-a5fe-942d6e4c7973&tenantId=d1323671-cdbe-4417-b4d4-bdb24b51316b" target="blank"><img src="Images/MSTeams_Logo.png"></a></li>
				</ul>
			</div>
		</footer>
	</body>
</html>