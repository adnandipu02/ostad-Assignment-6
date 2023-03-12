<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Profile Picture</th>
    <th>Date</th>
  </tr>
  <?php
  $file = fopen('users.csv', 'r');
  while (($data = fgetcsv($file)) !== false) {
    echo '<tr>';
    for ($i = 0; $i < count($data); $i++) {
      if ($i == 2) {
        echo '<td><img src="uploads/' . $data[$i] . '" width="100"></td>';
      } else {
        echo '<td>' . $data[$i] . '</td>';
      }
    }
    echo '</tr>';
  }
  fclose($file);
  ?>
</table>
