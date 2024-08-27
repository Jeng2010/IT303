<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD with MySQL and Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">cat management</h2>

       
        <div class="mt-4">
            <form action="create.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="breed">breed</label>
                        <input type="breed" class="form-control" name="breed" id="email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="appearance">Apperance</label>
                        <input type="text" class="form-control" name="appearance" id="appearance" required>

                     </div>
                    <div class="form-group col-md-4">
                        <label for="personality">personality</label>
                        <input type="text" class="form-control" name="personality" id="personality" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>
             
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM cat_tbl";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0 ) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    
                                    <td>{$row['name']}</td>
                                    <td>{$row['breed']}</td>
                                    <td>{$row['appearance']}</td>
                                    <td>{$row['personality']}</td>
                                    <td>
                                        
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No users found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
