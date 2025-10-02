<?php
echo "<h2>Testing Database Connection</h2>";

// Include connection file
include('koneksi.php');

// Test connection
if ($koneksi) {
    echo "<p style='color: green;'>✓ Database connection successful!</p>";

    // Test if database exists
    $db_check = mysqli_select_db($koneksi, $name);
    if ($db_check) {
        echo "<p style='color: green;'>✓ Database '$name' exists and accessible!</p>";

        // Check if table exists
        $table_check = mysqli_query($koneksi, "SHOW TABLES LIKE 'tbl_siswa'");
        if (mysqli_num_rows($table_check) > 0) {
            echo "<p style='color: green;'>✓ Table 'tbl_siswa' exists!</p>";

            // Count records
            $count_query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_siswa");
            $count_result = mysqli_fetch_assoc($count_query);
            echo "<p style='color: blue;'>ℹ Total records in tbl_siswa: " . $count_result['total'] . "</p>";
        } else {
            echo "<p style='color: orange;'>⚠ Table 'tbl_siswa' does not exist!</p>";
            echo "<p>You need to create the table. Here's the SQL:</p>";
            echo "<pre style='background: #f4f4f4; padding: 10px; border: 1px solid #ddd;'>";
            echo "CREATE TABLE tbl_siswa (\n";
            echo "    siswa_id INT AUTO_INCREMENT PRIMARY KEY,\n";
            echo "    siswa_nis VARCHAR(20) NOT NULL,\n";
            echo "    siswa_nama VARCHAR(100) NOT NULL,\n";
            echo "    siswa_kelas VARCHAR(10) NOT NULL,\n";
            echo "    siswa_jurusan VARCHAR(100) NOT NULL\n";
            echo ");";
            echo "</pre>";
        }
    } else {
        echo "<p style='color: red;'>✗ Database '$name' does not exist!</p>";
        echo "<p>Please create database '$name' first.</p>";
    }

    // Show connection details
    echo "<hr>";
    echo "<h3>Connection Details:</h3>";
    echo "<ul>";
    echo "<li>Host: $host</li>";
    echo "<li>Port: $port</li>";
    echo "<li>Database: $name</li>";
    echo "<li>User: $user</li>";
    echo "</ul>";
} else {
    echo "<p style='color: red;'>✗ Database connection failed!</p>";
    echo "<p>Error: " . mysqli_connect_error() . "</p>";
}

echo "<hr>";
echo "<p><a href='index.php'>← Back to Main Page</a></p>";
