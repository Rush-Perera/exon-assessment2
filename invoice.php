<div class="container p-3">
    <div class="card">
        <h5 class="card-header" style="text-align: center">Featured</h5>
        <div class="card-body">
            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>

            <!-- <h5 class="card-title">Special title treatment</h5> -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 

//get the last invoice id from invoice table
$q = "SELECT id FROM invoice ORDER BY id DESC LIMIT 1";
$resultset = Database::pull($q);
$invoice_id = $resultset->fetch_assoc()['id'];
$new_id = "IN"+strval(explode("N",$invoice_id)[1] + 1);

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
                        placeholder="<?php echo $new_id ?>">
                </div>
                <div class="mb-3">
                    <label for="invoice_value" class="form-label">Invoice Value</label>
                    <input class="form-control" id="invoice_value" rows="3"></input>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Invoice</button>
            </div>
        </div>
    </div>
</div>