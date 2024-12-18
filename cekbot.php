<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cek Bot</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    .container {
      width: 80%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .question {
      font-size: 1.2em;
      margin-bottom: 20px;
    }
    .options {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 20px;
    }
    .options input[type="submit"] {
      padding: 10px 20px;
      font-size: 1em;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Cek Bot</h1>
    <form action="cekbot.php" method="post">
      <p class="question">Manakah dibawah ini hewan berkaki 4?</p>
      <div class="options">
        <input type="submit" name="answer" value="Ayam">
        <input type="submit" name="answer" value="Monyet">
        <input type="submit" name="answer" value="Sapi">
        <input type="submit" name="answer" value="Trex">
      </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['answer'])) {
        $selected = $_POST['answer'];
        if ($selected === 'Sapi') {
          header('Location: Index.php');
          exit;
        } else {
          echo '<p>Jawaban Anda salah. Silakan coba lagi.</p>';
        }
      }
    }
    ?>
  </div>
</body>
</html>
