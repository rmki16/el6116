<?php

  try
  {
    require "config.php";
    require "common.php";

    // create connection
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM daftar_manajer";

    $statement = $connection -> prepare($sql);
    $statement -> execute();

    $result = $statement -> fetchAll();

  } catch (PDOException $error)
  {
    echo $sql . "<br>" . $error -> getMessage();
  }

  <?php
  if($result && $statement -> rowCount() > 0)
  { ?>
    <h2>Daftar Manajer</h2>

    <table>
      <thead>
        <tr>
          <th>Departemen</th>
          <th>Nama Depan</th>
          <th>Nama Belakang</th>
        </tr>
      </thead>
      <tbody>
      <?php
      foreach ($result as $row)
      { ?>
        <tr>
          <td><?php echo escape ($row["Departemen"]); ?></td>
          <td><?php echo escape ($row["Nama Depan"]); ?></td>
          <td><?php echo escape ($row["Nama Belakang"]); ?></td>
        </tr>
      <?php
      } ?>
      </tbody>
    </table>

  }
   ?>
