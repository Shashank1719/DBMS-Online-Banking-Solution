<?php
    
    // Modal
    echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log Out from Care-Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wants to Log out from Care-Bank</p>
                </div>
                <div class="modal-footer">
                        <form action="/SGP/partials/_navuser.php" method="POST">
                        <button type="submit" name="yes" class="btn btn-danger mx-2">Yes</button>
                        <button type="submit" name="no" class="btn btn-success mx-2" data-bs-dismiss="modal">No</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>';
        if(isset($_POST['yes'])){
            session_destroy();
            header("location: /SGP/home.php");
        }

        if(isset($_POST['no'])){
            header("location: /SGP/user/account_welcome.php");
        }



?>
