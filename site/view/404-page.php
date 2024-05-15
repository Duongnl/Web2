<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Oops! The page you are looking for does not exist.</p>
        <a href="<?php echo $rootDirectory?>" class="home-link">Go back to Home</a>
    </div>
</body>
</html>

<style>* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
}

h1 {
    font-size: 10rem;
    color: #ff6b6b;
    margin-bottom: 20px;
}

p {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 20px;
}

.home-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6b6b;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.home-link:hover {
    background-color: #ff4c4c;
}</style>