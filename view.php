<?php session_start();
include ("config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
    body {
      background-image: url('img/bkg.png'); 
      background-size: cover;
    }
  </style>
<body>

<h1 class="text-center" style="margin-top: 50px; margin-bottom: 10px">View Mode</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">

        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $tasks = "SELECT * FROM `tasks` WHERE `id` = '$id'";
            $tasks_view = mysqli_query($con, $tasks);

            if(mysqli_num_rows($tasks_view) > 0)
            {
                foreach($tasks_view as $tasks)
                {
                ?>
                

                <div class="row">

                    <div class="col-md-2 mb-2">
                        <label for="title" class="form-label" style="font-weight: bold;">Task ID#</label>
                        <h5 type="text" class="form-control" id="title"><?=$tasks['id'];?></h5>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="title" class="form-label" style="font-weight: bold;">Title</label>
                        <h5 type="text" class="form-control" id="title"><?=$tasks['title'];?></h5>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="description" class="form-label" style="font-weight: bold;">Description</label>
                        <h5 type="text" class="form-control" id="description" style="word-wrap: break-word; max-width: 1000px; text-align: justify;"><?=$tasks['description'];?></h5>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="priority" class="form-label" style="font-weight: bold;">Priority</label>
                        <h5 type="text" class="form-control" id="priority"><?=$tasks['priority'];?></h5>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="due_date" class="form-label" style="font-weight: bold;">Due Date</label>
                        <h5 type="date" class="form-control" id="due_date"><?=$tasks['due_date'];?></h5>
                    </div>
                    
                    <a type="button" style="float: right; font-weight: bold; width: 834px; margin-left: 10px; " class="btn btn-success"  href="index.php">Back</a>
                
                    

                    </div>
            </form>
        </div>
    </div>

    <?php
                }
            }
            else
            {
                ?>
                <h4>No Record Found!</h4>
                <?php
            }
        }
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
        });
    </script>
    <?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>
</body>
</html>
