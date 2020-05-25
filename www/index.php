<?php

$CONFIG_MYSQL_DATABASE = getenv('CONFIG_MYSQL_DATABASE');
$CONFIG_MYSQL_USER = getenv('CONFIG_MYSQL_USER');
$CONFIG_MYSQL_PASSWORD = getenv('CONFIG_MYSQL_PASSWORD');
$CONFIG_MYSQL_HOST = getenv('CONFIG_MYSQL_HOST');
$CONFIG_MYSQL_PORT = getenv('CONFIG_MYSQL_PORT');
$CONFIG_BACKEND_HOST = getenv('CONFIG_BACKEND_HOST');

$mysqli = new mysqli($CONFIG_MYSQL_HOST, $CONFIG_MYSQL_USER, $CONFIG_MYSQL_PASSWORD, $CONFIG_MYSQL_DATABASE, $CONFIG_MYSQL_PORT);

if ($mysqli->connect_errno) {
    echo("Could not connect to DB." . "\n");
    echo("Errno: " . $mysqli->connect_errno . "\n");
    echo("Error: " . $mysqli->connect_error . "\n");
    exit;
}

$sql = "SELECT name FROM test_table";
if (! $result = $mysqli->query($sql)) {
    echo("Error: doing SQL query.\n");
    echo("Query: " . $sql . "\n");
    echo("Errno: " . $mysqli->errno . "\n");
    echo("Error: " . $mysqli->error . "\n");
    exit;
}

echo("<html>\n");
echo("<body>\n");
echo("<div>\n");
echo("<h1>Contents of the table:</h1>\n");
echo("<ul>\n");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    printf("<li>%s</li>\n", $row["name"]);
}
echo("</ul>\n");
echo("</div>\n");

echo("<h1>Contents of the table:</h1>\n");
echo("<ul>\n");
printf("<li>%0s: %0s</li>", 'CONFIG_MYSQL_DATABASE', $CONFIG_MYSQL_DATABASE);
printf("<li>%0s: %0s</li>", 'CONFIG_MYSQL_USER', $CONFIG_MYSQL_USER);
printf("<li>%0s: %0s</li>", 'CONFIG_MYSQL_PASSWORD', $CONFIG_MYSQL_PASSWORD);
printf("<li>%0s: %0s</li>", 'CONFIG_MYSQL_HOST', $CONFIG_MYSQL_HOST);
printf("<li>%0s: %0s</li>", 'CONFIG_MYSQL_PORT', $CONFIG_MYSQL_PORT);
printf("<li>%0s: %0s</li>", 'CONFIG_BACKEND_HOST', $CONFIG_BACKEND_HOST);
echo("</ul>\n");
echo("</div>\n");

echo("</body>\n");
echo("</html>\n");

$result->free_result();
$mysqli->close();

?>

