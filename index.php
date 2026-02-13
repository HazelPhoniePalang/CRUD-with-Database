

<?php 

// echo "Name: Hazel Phonie P. Palang <br>";
// echo "Today is: February 10, 2026";





// $username = "Admin";
// $role="Admin";
// $loginAttempts = 2;

// echo "Username: " . $username . "<br>";
// echo "Role: " . $role . "<br>";
// echo "Login Attempts: " . $loginAttempts . "<br>";

// if ($loginAttempts < 3){
//     echo "Access allowed";
// } else {
//     echo "Access blocked";
// }




// --- Activity 3: Loops ---
 
// echo "<h2>Activity 3</h2>";
 
// for ($i = 1; $i <= 3; $i++) {
 
// echo "Login attempt #$i <br>";
 
// }
 
// echo "<hr>";
 
// --- Activity 4 & 5: Arrays & Conditions ---
 
// $user = [
 
// "username" => "admin",
 
// "role" => "admin",
 
// "status" => "active"
 
// ];
 
// echo "<h2>Activity 4 & 5</h2>";
 
// echo "Username: " . $user['username'] . "<br>";
 
// echo "Role: " . $user['role'] . "<br>";
 
// echo "Status: " . $user['status'] . "<br>";
 
// if ($user['status'] === "active") {
 
// echo "<strong>User can login</strong><br>";
 
// } else {
 
// echo "<strong>User is blocked</strong><br>";
 
// }
 
// echo "<hr>";
 
// --- Activity 6 & Bonus: Array + Loop (User List) ---
 
$users = [
 
["username" => "admin", "role" => "admin"],
 
["username" => "janna", "role" => "user"],
 
["username" => "atom", "role" => "user"]
 
];
 
echo "<h2>Activity 6 + Bonus</h2>";
 
foreach ($users as $u) {
 
// Bonus Condition
 
if ($u['role'] === 'admin') {
 
$displayRole = "ADMIN ACCESS";
 
} else {
 
$displayRole = "USER";
 
}
 
echo "User: " . $u['username'] . " (" . $displayRole . ")<br>";
 
}
 
?>