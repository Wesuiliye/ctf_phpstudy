<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}
$hidden_flag = "flag{hidden_flag_in_html_source}";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人主页</title>
</head>
<body>
<h1>欢迎来到个人主页</h1>
<p>这里有一张模糊不清的cat头像...</p>
<img src="data:image/png;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4AAQSkZJRgABAgAAAQABAAD/4QBYRXhpZgAATU0AKgAAAAgAAgESAAMAAAABAAEAAIdpAAQAAAABAAAAJgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAGQKADAAQAAAABAAAGQAAAAAD/2wEEEAMgAyADIAMgA1IDIAOEA+gD6AOEBOIFRgSwBUYE4gc6BqQGDgYOBqQHOgrwB9AIZgfQCGYH0ArwEJoKWgwcCloKWgwcCloQmg6mEcYOdA16DnQRxg6mGl4UtBJcElwUtBpeHngZlhg4GZYeeCTqIQIhAiTqLnwsJC58PL48vlGkEQMgAyADIAMgA1IDIAOEA+gD6AOEBOIFRgSwBUYE4gc6BqQGDgYOBqQHOgrwB9AIZgfQCGYH0ArwEJoKWgwcCloKWgwcCloQmg6mEcYOdA16DnQRxg6mGl4UtBJcElwUtBpeHngZlhg4GZYeeCTqIQIhAiTqLnwsJC58PL48vlGk/8IAEQgAoACgAwEiAAIRAQMRAf/EACgAAQEBAAAAAAAAAAAAAAAAAAABAgEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEAMQAAAAAAAQAFlAEsAAKAgqULAAUiiKJNDNokoihYKAAAAAAgAAWUIKlICoKlAIAABQSwWACAqUAAAAqUAgAAAAAAAFgssAAAAAECgAKIsEolAACLACgWUASiLAABLAACgWCgEAAAAIBQ//xAAUEAEAAAAAAAAAAAAAAAAAAACA/9oACAEBAAE/AEh//8QAFBEBAAAAAAAAAAAAAAAAAAAAYP/aAAgBAgEBPwBJ/8QAFBEBAAAAAAAAAAAAAAAAAAAAYP/aAAgBAwEBPwBJ/9k=" alt="Hidden Flag">
<?php if ($hidden_flag !== NAN): ?>
    <p><?php echo htmlspecialchars($hidden_flag); ?></p>
<?php endif; ?>
</body>
</html>