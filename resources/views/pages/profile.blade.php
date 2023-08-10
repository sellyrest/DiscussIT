<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
    }
    .profile-container {
      max-width: 800px;
      margin: 30px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    .profile-picture {
      max-width: 200px;
      border-radius: 50%;
      display: block;
      margin: 0 auto;
    }
    .username {
      text-align: center;
      font-size: 24px;
      margin-top: 10px;
    }
    .bio {
      text-align: center;
      font-size: 16px;
      color: #777;
      margin-bottom: 20px;
    }
    .recent-posts {
      padding: 10px;
      border-top: 1px solid #ddd;
    }
    .post {
      margin-bottom: 10px;
    }
    .post-title {
      font-size: 18px;
      font-weight: bold;
    }
    .post-content {
      font-size: 14px;
    }
    <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      display: flex;
      align-items: center;
    }
    .p {
      padding: 10px;
      margin: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
  </style>
  <div class="profile-container text-center">
    <img class="profile-picture" src="img/silvia.png" alt="Profile Picture">
    <div class="username">Silvia Rahma</div>
    <div class="bio">FrontEnd enthusiast</div>
    <div class="recent-posts">
      <div class="post">
        <div class="post-title">Portofolio</div>
        <div class="post-content">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet libero euismod, varius nunc eu, scelerisque est.
        </div>
      </div>
      <div class="post">
        <div class="post-title py-4">Experience</div>
        <div class="post-content">
          Praesent euismod feugiat leo non faucibus. Pellentesque in feugiat quam.
        </div>
      </div>
      <!-- Add more recent posts here -->
    </div>
  </div>
</body>
</html>
