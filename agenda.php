<!DOCTYPE html>
<html>
<head>
  <title>Agendamento - Barbearia</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    header {
      background-color: #333;
      padding: 20px;
      color: #fff;
      text-align: center;
    }
    
    h1 {
      margin: 0;
    }
    
    .container {
      width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    
    form {
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 5px;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    
    input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    
    input [type="submit"]:hover {
      background-color: #555;
    }
    .btn-home{
      width: 100px; 
      height:35px; 
      border-radius:6px;
      background-color:#333;
      color:white;
      float:right;
    }
  </style>
</head>
<body>
  <header>
    <h1>Agendamento - Barbearia</h1>
  </header>
  
  <div class="container">
    <form action="agenda.php" method="POST">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="service">Serviço:</label>
      <select id="service" name="service">
        <option value="barba">Barba</option>
        <option value="cabelo">Cabelo</option>
        <option value="barba_cabelo">Barba + Cabelo</option>
      </select>
      
      <label for="date">Data:</label>
      <input type="date" id="date" name="date" required>
      
      <label for="time">Horário:</label>
      <input type="time" id="time" name="time" required>
      
      <input type="submit" name="agenda"  value="Agendar"/>
      <button class="btn-home" onclick="window.location.href='index.php'">Home</button>
    </form>
    <?php
include "config.php";
if(isset($_POST['agenda'])){
  $nome=$_POST['nome'];
  $email=$_POST['email'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $agenda=$conn->prepare('INSERT INTO `agenda` (`id_agenda`, `nome_age`, `email_age`, `date_age`, `time_age`) VALUES (NULL, :pnome, :pemail, :pdate, :ptime);');
  $agenda->bindValue(':pnome',$nome);
  $agenda->bindValue(':pemail',$email);
  $agenda->bindValue(':pdate',$date);
  $agenda->bindValue(':ptime',$time);
  $agenda->execute();
  echo "Nos vemos em breve!";
}
?>
  </div>
</body>
</html>
