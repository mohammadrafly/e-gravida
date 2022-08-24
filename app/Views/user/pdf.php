<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Generate PDF</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    table th {
          background: #0c1c60 !important;
          color: #fff !important;
          border: 1px solid #ddd !important;
          line-height:15px!important;
          text-align:center!important;
          vertical-align:middle!important;

      }
      table td{line-height:15px!important; text-align:center!important; border: 1px solid;}
  </style>
</head>

<body>
  <div class="container">
    <h2>Laporan Users</h2>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Suami</th>
          <th>Tempat Lahir</th>
          <th>TTL</th>
          <th>Umur</th>
          <th>Dibuat Pada</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach($loop as $dt): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $dt->username ?></td>
                      <td><?= $dt->name ?></td>
                      <td><?= $dt->email ?></td>
                      <td><?= $dt->phone ?></td>
                      <td><?= $dt->suami ?></td>
                      <td><?= $dt->tempatlahir ?></td>
                      <td><?= $dt->tanggallahir ?></td>
                      <td><?= $dt->umur ?></td>
                      <td><?= $dt->created_at ?></td>
                    </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>