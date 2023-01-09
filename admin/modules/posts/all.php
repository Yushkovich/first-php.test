
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary ">Posts list</h6>
            <a href="?page=add" class="btn btn-success">Add <i class="fas fa-plus-circle"></i></a>
        </div>    
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Twit</th>
                        <th>Created</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <?PHP
                $sql = "SELECT * FROM posts";
                $result = mysqli_query($conn, $sql);
                while ($twit = $result->fetch_assoc()) {
                    $sql2 = "SELECT * FROM users WHERE id =" . $twit['user_id'];
                    $result2 = mysqli_query($conn, $sql2);
                    $user2 = $result2->fetch_assoc();
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $twit['id'] ?></td>
                        <td><?php echo $user2['username'] ?></td>
                        <td><?php echo $twit['twit'] ?></td>
                        <td><?php echo $twit['created'] ?></td>
                        <td>
                            <a href="?page=edit&id=<?php echo $twit['id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                            <a href="/admin/modules/posts/delete.php?id=<?php echo $twit['id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                        <?php 
                    } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
