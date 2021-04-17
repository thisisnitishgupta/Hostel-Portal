<html>

<head>
	<title>
		HOSTEL :: STUDENTS
	</title>
	<meta http-equiv="refresh" content="3; url="<?php echo $_SERVER['PHP_SELF']; ?>">

	<?php
	require_once('auth.php');
	?>
	<link href="css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<style type="text/css">
		body {
			padding-top: 60px;
			padding-bottom: 40px;
			background-color: #DDC6B6;
		}

		.sidebar-nav {
			padding: 90px 10px;
		}
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">

	<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
	<!--sa poip up-->
	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox({
				loadingImage: 'src/loading.gif',
				closeImage: 'src/closelabel.png'
			})
		})
	</script>
</head>
<?php
function createRandomPassword()
{
	$chars = "003232303232023232023456789";
	srand((float)microtime() * 1000000);
	$i = 0;
	$pass = '';
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;
	}
	return $pass;
}
$finalcode = 'RS-' . createRandomPassword();
?>

<script>
	function sum() {
		var txtFirstNumberValue = document.getElementById('txt1').value;
		var txtSecondNumberValue = document.getElementById('txt2').value;
		var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt3').value = result;

		}

		var txtFirstNumberValue = document.getElementById('txt11').value;
		var result = parseInt(txtFirstNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt22').value = result;
		}

		var txtFirstNumberValue = document.getElementById('txt11').value;
		var txtSecondNumberValue = document.getElementById('txt33').value;
		var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt55').value = result;

		}

		var txtFirstNumberValue = document.getElementById('txt4').value;
		var result = parseInt(txtFirstNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt5').value = result;
		}

	}
</script>


<script language="javascript" type="text/javascript">
	<!-- Begin
	var timerID = null;
	var timerRunning = false;

	function stopclock() {
		if (timerRunning)
			clearTimeout(timerID);
		timerRunning = false;
	}

	function showtime() {
		var now = new Date();
		var hours = now.getHours();
		var minutes = now.getMinutes();
		var seconds = now.getSeconds()
		var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
		if (timeValue == "0") timeValue = 12;
		timeValue += ((minutes < 10) ? ":0" : ":") + minutes
		timeValue += ((seconds < 10) ? ":0" : ":") + seconds
		timeValue += (hours >= 12) ? " P.M." : " A.M."
		document.clock.face.value = timeValue;
		timerID = setTimeout("showtime()", 1000);
		timerRunning = true;
	}

	function startclock() {
		stopclock();
		showtime();
	}
	window.onload = startclock;
	// End 
	-->
</script>

<body>
	<?php include('navfixed1.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li><a href="user.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li>
							<br><br>
					</ul>
				</div>
				<!--/.well -->
			</div>
			<!--/span-->
			<div class="span10">
				<div class="contentheader">
					<i class="icon-table"></i> STUDENTS
				</div>
				<ul class="breadcrumb">
					<li><a href="user.php">Dashboard</a></li> /
					<li class="active"> Hostel Students </li>
				</ul>


				<div style="margin-top: -19px; margin-bottom: 21px;">
					<a href="user.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
					<?php
					include('../connect.php');
					$result = $db->prepare("SELECT * FROM students");
					$result->execute();
					$rowcount = $result->rowcount();
					?>


					<div style="text-align:center;">
						Total Number of Students: <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount; ?>]</font>
					</div>


				</div>

				<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: center;">
					<thead>
						<tr>

							<th width="15%"> NAME </th>
							<th width="10%"> USN </th>
							<th width="14%"> COLLEGE </th>
							<th width="6%"> SEMESTER </th>
							<th width="8%"> BRANCH </th>
							<th width="12%"> STATE </th>
							<th width="10%"> MOBILE </th>
							<th width="10%"> ACTION </th>
						</tr>
					</thead>
					<tbody>


						<?php include('../connect.php');
						$result = $db->prepare("SELECT d.sname,d.usn,d.college,d.semester,d.branch,d.state,d.mobile FROM students d");
						$result->execute();
						for ($i = 0; $row = $result->fetch(); $i++) {

						?>

							<td> <?php echo $row['sname']; ?></td>
							<td> <?php echo $row['usn']; ?></td>
							<td><?php echo $row['college']; ?></td>
							<td><?php echo $row['semester']; ?></td>
							<td><?php echo $row['branch']; ?></td>
							<td><?php echo $row['state']; ?></td>
							<td><?php echo $row['mobile']; ?></td>

							<td><a title="Click to view the Student" href="userstudentsview.php?id=<?php echo $row['usn']; ?>"><button class="btn btn-success btn-mini"><i class="icon-search"></i> View</button> </a>
							</td>
							</tr>
						<?php
						}
						?>



					</tbody>
				</table>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

</body>
<?php include('footer.php'); ?>

</html>