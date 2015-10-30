<?php

	echo "\n================================\nDatabase Cleanup Started:\n================================\n";

	include 'database.php';

	// Count unused Vehicles
	$sql = "SELECT * FROM vehicle WHERE last_accessed < (NOW() - INTERVAL 15 DAY) AND pin_code > '0000'";
	$result = mysqli_query($db_local, $sql);
	$count = mysqli_num_rows($result);

	// Unlocks unused Vehicles
	$sql = "UPDATE vehicle SET is_locked = '0', pin_code = '0000' WHERE last_accessed < (NOW() - INTERVAL 15 DAY) AND pin_code > '0000'";
	$result = mysqli_query($db_local, $sql);
	echo "$count Vehicles unlocked\n\n";


	// Count deleted Vehicles
	$sql = "SELECT * FROM vehicle WHERE last_accessed < (NOW() - INTERVAL 15 DAY) AND pin_code = '0000'";
	$result = mysqli_query($db_local, $sql);
	$count = mysqli_num_rows($result);

	// Delete unused unlocked Vehicles
	$sql = "DELETE FROM vehicle WHERE last_accessed < (NOW() - INTERVAL 15 DAY) AND pin_code = '0000'";
	$result = mysqli_query($db_local, $sql);
	echo "$count Vehicles removed from the database\n\n";


	// Count deleted Containers
	$sql = "SELECT * FROM container WHERE spawned_at < (NOW() - INTERVAL 30 HOUR) AND last_accessed < (NOW() - INTERVAL 30 DAY) AND last_accessed <> '0000-00-00 00:00:00' OR last_accessed <= (NOW() - INTERVAL 48 HOUR) AND cargo_items = '[[],[]]' AND cargo_magazines = '[]' AND cargo_weapons = '[]' AND cargo_container = '[]'";
	$result = mysqli_query($db_local, $sql);
	$count = mysqli_num_rows($result);

	// Remove containers not accessed in over 30 days
	$sql = "DELETE FROM container WHERE spawned_at < (NOW() - INTERVAL 30 DAY) AND last_accessed < (NOW() - INTERVAL 30 DAY) AND last_accessed <> '0000-00-00 00:00:00'";
	$result = mysqli_query($db_local, $sql);

	// Remove empty containers not used in 48 hours
	$sql = "DELETE FROM container WHERE last_accessed <= (NOW() - INTERVAL 48 HOUR) AND cargo_items = '[[],[]]' AND cargo_magazines = '[]' AND cargo_weapons = '[]' AND cargo_container = '[]'";
	$result = mysqli_query($db_local, $sql);
	echo "$count Containers removed from the database\n\n";


	// Count dead/buggy Players
	$sql = "SELECT * FROM player WHERE is_alive = '0' OR account_uid = 'SomethingWentWrong' OR account_uid = '' OR is_alive = '1' AND damage = '1'";
	$result = mysqli_query($db_local, $sql);
	$count = mysqli_num_rows($result);

	// Delete dead/buggy Players
	$sql = "DELETE FROM player WHERE is_alive = '0' OR account_uid = 'SomethingWentWrong' OR account_uid = '' OR is_alive = '1' AND damage = '1'";
	$result = mysqli_query($db_local, $sql);
	echo "$count Dead players removed from the database\n\n";


	// Close all unlocked Constructions
	$sql = "UPDATE construction SET is_locked = -1 WHERE pin_code IS NOT '00000' AND is_locked = 0";
	$result = mysqli_query($db_local, $sql);
	echo "All doors locked\n\n";

	echo "================================\nDatabase Cleanup Finished:\n================================\n\n";

?>
