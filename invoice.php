<?php
include "com/database.php"
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platinum Invoice | Cheque MS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <div class="container-lg">
        <?php include "com/navbar.php" ?>
    </div>

    <div id="toggleController" class="container p-3">

        <div class="card">
            <h5 class="card-header" style="text-align: center">Invoice</h5>
            <div class="card-body">
                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>

                <?php
                $q = "SELECT * FROM invoice";
                $result = Database::pull($q);
                ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Invoice ID</th>
                            <th scope="col">Value</th>
                            <th scope="col">Date Time added</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($resultset = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $resultset['id'] . "</th>";
                            echo "<td>" . $resultset['value'] . "</td>";
                            echo "<td>" . $resultset['datetime'] . "</td>";
                            echo "<td><a type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#paymodal'>Pay</a>
                            <a href='invoice.php?delete=" . $resultset['id'] . "' class='btn btn-danger'>Delete</a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <?php

        //get the last invoice id from invoice table
        $q = "SELECT id FROM invoice ORDER BY id DESC LIMIT 1";
        $resultset = Database::pull($q);
        $stringValue = $resultset->fetch_assoc()['id'];

        // Extract the numeric portion of the string
        $numericValue = intval(substr($stringValue, 2));

        // Add 1 to the numeric value
        $numericValue++;

        // Combine the numeric value with the original string prefix
        $new_id = substr($stringValue, 0, 2) . str_pad($numericValue, strlen($stringValue) - 2, '0', STR_PAD_LEFT);


        ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Invoice</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="invoice_id" class="form-label">Invoice Id</label>
                            <input type="text" class="form-control" id="invoice_id" disabled
                                placeholder="<?php echo $new_id ?>" value="<?php echo $new_id ?>">
                        </div>
                        <div class="mb-3">
                            <label for="invoice_value" class="form-label">Invoice Value</label>
                            <input class="form-control" id="invoice_value"></input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addInvoice()">Save Invoice</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal fade" id="paymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pay with Cheque</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="invoice_id" class="form-label">Invoice Id</label>
                            <input type="text" class="form-control" id="invoice_id" disabled
                                placeholder="<?php echo $new_id ?>" value="<?php echo $new_id ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cheque_select" class="form-label">Cheque ID</label>
                            <!-- Add a dropdown -->
                            <select class="form-select" aria-label="Default select example" id="cheque_select">
                                <option selected>Select Cheque</option>
                                <?php
                                $q = "SELECT * FROM cheque";
                                $result = Database::pull($q);
                                while ($resultset = $result->fetch_assoc()) {
                                    echo "<option value='" . $resultset['id'] . "'>" . $resultset['id'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="payInvoice(<?php echo $new_id ?>)">Save Invoice</button>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php
    if (isset($_GET['delete'])) {
        $deleteId = $_GET['delete'];
        $q = "DELETE FROM invoice WHERE id = '$deleteId'";
        Database::push($q);
        ?>
        <script>
            window.location.href = "invoice.php";
            alert("Invoice Deleted");
        </script>
        <?php
    }
    ?>

    <script src="script.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>