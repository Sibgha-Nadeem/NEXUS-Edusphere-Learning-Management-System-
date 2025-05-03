<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Unsuccessful</title>
<style>
  body {
    background-color: #f3ecd8; /* light brownish background */
    font-family: Arial, sans-serif;
    text-align: center;
  }
  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Vertically center the content */
  }
  .message {
    margin-top: 20px;
    font-size: 24px;
    color: #8b4513; /* brown text color */
  }
  .link {
    margin-top: 20px;
    text-decoration: none;
    color: #8b4513; /* brown text color */
  }
</style>
</head>
<body>
  <div class="container">
    <h2 class="message">Login Unsuccessful</h2>
    <a class="link" href="javascript:history.back()">Try Again</a>
  </div>
</body>
</html>
