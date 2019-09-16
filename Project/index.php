<?php include('main.php');?>
<!DOCTYPE html>
<html>
 <head>
     <title> Db Create</title>
     <link rel="stylesheet" type="text/css" href="style.css" />
 </head>
<body>
<table >
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_array($results)){ ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['surname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><a href="main.php?action=delete&name=<?php echo $row['name'];?>&id=<?php echo $row['id'];?>">Delete</a></td>
        </tr>
    <?php
    }
    ?>

    </tbody>
</table>
<h2 id="hh">Create User</h2>

<form  method="post" action="main.php" >
    <div class="input-group">
        <label>id</label>
        <input type="text" name="id" value="<?php echo $id; ?>">
    </div>
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
        <label>Surname</label>
        <input type="text" name="surname" value="<?php echo $surname; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">

        <button class="btn" type="submit" name="insert" >Save</button>
    </div>
</form>

<h2 id="hh">Update User</h2>
<form method="post" action="main.php" >
<div class="input-group">
        <label>id</label>
        <input type="text" name="id" value="<?php echo $id; ?>">
    </div>
   
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
        <label>Surname</label>
        <input type="text" name="surname" value="<?php echo $surname; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <button class="btn" type="submit" name="update" >Update</button>
    </div>
</form>




</body>

</html>
