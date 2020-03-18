<head>
  <title>DrunkNet - Create Game</title>
  <style>
  input[type=button], input[type=submit], input[type=text], input[type=number][disabled=disabled]{
    display: inline-block;
    width: 200px;
    padding: 8px;
    color: #fff;
   background-color: transparent;

    border: 2px solid #fff;
    text-align: center;
    outline: none;
    text-decoration: none;
    transition: background-color 0.2s ease-out,
                border-color 0.2s ease-out;
  }
input[type=button], input[type=submit], input[type=text],input[type=number]:hover,
input[type=button], input[type=submit], input[type=text],input[type=number]:active {
    background-color: #fff; /* fallback */
    background-color: rgba(255, 255, 255, 0.4);
    border-color: #fff; /* fallback */
    border-color: rgba(255, 255, 255, 0.4);
    transition: background-color 0.3s ease-in,
                border-color 0.3s ease-in;
    color: #66d8ed;
    border-color: #66d8ed;
    transition: border-color 0.4s ease-in,
      color 0.4s ease-in;
  }
  body {
    text-align: center;
      background-color: #090c39;
      font-family: Helvetica;
      color: #66d8ed;
  }
  body {
    text-align: center
  }
  header{
    img-align:center;
  }
  table{
    align:center;

  }
  </style>
</head>
<body>
  <p></p>
  <header> <img src="drunk.png" alt="trippy"> </header>

  <h1>Choose your Game!</h1>

  <form action="host_game.php" method="post">
    <table>
        <tr><input type="submit" value="Pub Quiz" name="submit"></input></tr>
        <p></p>
        <tr><input type="submit" value="Never Have I Ever" name="submit"></input></tr>
        <p></p>
        <tr><input type="submit" value="IQTEST" name="submit"></input></tr>
    </table>
  </form>

</body>
</html>
