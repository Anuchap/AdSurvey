<?php 
if($_POST['password'] != 'P@ssw0rd') {
	echo 'Password incorrect. <a href="login.html">Back</a>';
	exit();
}

//$conn = new PDO('mysql:host=localhost;dbname=adsurvey', 'root', '');
$conn = new PDO('mysql:host=mysql.hostinger.in.th;dbname=u147007146_as', 'u147007146_as', 'P@ssw0rd');
?>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>

<?php $sql = 'select * from log order by id '; ?>
<h2>Logs</h2>
<table>
	<thead>
		<tr><th>Seq.</th><th>UID</th><th>Time</th><th>Status</th><th>File</th></tr>
	</thead>
	<tbody>
	<?php 	foreach($conn->query($sql) as $row) { ?>
		<tr>
			<td><?=$row['id'] ?></td>
			<td><?=$row['uid'] ?></td>
			<td><?=$row['datetime'] ?></td>
			<td><?=$row['status'] ?></td>
			<?php if($row['status'] == 'finished') { ?>
				<td><a href="../completed/<?=$row['filename'] ?>"><?=$row['filename'] ?></a></td>
			<?php } else { ?>
				<td><a href="../uploads/<?=$row['filename'] ?>"><?=$row['filename'] ?></a></td>
			<?php } ?>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php $sql = 'select * from answer order by id '; ?>
<h2>Answer</h2>
<table>
	<thead>
		<tr><th>Seq.</th><th>UID</th><th>Time</th><th>QuestionNo</th><th>Answer</th><th>Optional</th></tr>
	</thead>
	<tbody>
	<?php 	foreach($conn->query($sql) as $row) { ?>
		<tr>
			<td><?=$row['id'] ?></td>
			<td><?=$row['uid'] ?></td>
			<td><?=$row['datetime'] ?></td>
			<td><?=$row['qno'] ?></td>
			<td><?=$row['answer'] ?></td>
			<td><?=$row['optional'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>