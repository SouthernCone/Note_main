<?php
session_start();
if(isset($_SESSION['userID'])){
    /** @var Connection $connection */
$connection = require_once '../php/pdo.php';
// Read notes from database
$notes = $connection->getNotes();

$currentNote = [
    'ID' => '',
    'user_ID' => '',
    'title' => '',
    'description' => ''
];
if (isset($_GET['id'])) {
    $currentNote = $connection->getNoteById($_GET['id']);
}

echo ' Welcome, ' . $_SESSION['firstname']. ' '. $_SESSION['lastname']. '.'.'<br/>';
echo '<a href="../php/Logout.php?logout">Logout</a>';
// echo '<pre>';
// var_dump($notes);
// echo '</pre>';
?>
 



<!DOCTYPE html>
<html>
    <head>
        <!-- CSS -->
        <link rel="stylesheet"  href="../css/app.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	    <!-- jQuery and JS bundle w/ Popper.js -->
	    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </head>
    <body>
        <h1 class="heading">My Notes</h1>
        <div class="container">
            <div class="row">
                <button class="btn btn-primary col-1 offset-10" data-toggle="modal" data-target="#addNoteModal">
                    <i class="fa fa-plus fa-2x" > </i>
                </button>
            </div>
        </div>
        <div class="notes">
            <?php foreach ($notes as $note): ?>
                <div class="note" >
                    <div class="title">
                        <a  href="?id=<?php echo $note['ID'] ?>">
                            <?php echo $note['title'] ?>
                        </a>
                    </div>
                    <div class="description">
                        <?php echo $note['description'] ?>
                    </div>
                    <small>
                        <?php
                            if(empty($note['time_updated'])){
                                echo date('d/m/Y H:i', strtotime($note['time_created']));
                                }
                                else
                                {
                            ?>  Last Updated: 
                            <?php
                                echo date('d/m/Y H:i', strtotime($note['time_updated']));
                                }
                            ?>
                               
                            

                        </small>
                    <form action="../php/deleteNote.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $note['ID'] ?>">
                        <button class="close"><i class="fa fa-trash"></i></button>
                    </form>
                    <button data-toggle="modal" data-target="#addNoteModal" class="btn"><i class="fa fa-edit fa-lg"></i></button>
                    
                </div>
            <?php endforeach; ?>
        </div>
        

    <!-- MODALS -->
    <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNoteModalLabel">
                        <?php if ($currentNote['ID']): ?>
                        Update Note
                        <?php else: ?>
                        New Note
                        <?php endif ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="new-note" action="../php/addNote.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $currentNote['ID'] ?>">
                            <input type="hidden" name="user_ID" value="<?php echo $_SESSION['userID'] ?>">
                            <label for="note-title" class="col-form-label">Title</label>
                            <input type="text" class="form-control" id="note-title" name="title" placeholder="Note title" autocomplete="off" value="<?php echo $currentNote['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="note-description" class="col-form-label">Description</label>
                            <textarea class="form-control" id="note-description" name="description" placeholder="Note Description"><?php echo $currentNote['description'] ?></textarea>
                        </div>  
                                
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Note</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- MODALS -->
    </body>





</html>

 <?php
}
else
{
    header("location:../index.php");
}

?>

