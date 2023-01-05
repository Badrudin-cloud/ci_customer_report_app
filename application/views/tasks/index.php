<h2><?= $title ?></h2>
<button class="btn btn-primary float-end my-2" data-toggle="modal" data-target="#exampleModal">Add new task</button>


<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Company Name</th>
            <th scope="col">Contact phone</th>
            <th scope="col">Address</th>
            <th scope="col">Reported Issue</th>
            <th scope="col">What caused the Issue?</th>
            <th scope="col">Status</th>
            <th scope="col">Done By</th>
            <th scope="col">Issue Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody id="tbody">

    </tbody>
</table>



<!-- Insertion modal -->

<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="company-name" class="col-form-label">Company name:</label>
                                    <input type="text" class="form-control" id="company-name" name="company-name" placeholder="Enter company name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="contact-phone" class="col-form-label">Contact phone:</label>
                                    <input type="text" class="form-control" id="contact-phone" name="contact-phone" placeholder="Enter contact phone">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status:</label>
                                    <select class="form-select" id="status">
                                        <option value="" name="status">Select status</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="process">Process</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="done-by" class="col-form-label">Done by:</label>
                                    <input type="text" class="form-control" id="done-by" name="done-by" placeholder="Enter done by">
                                </div>
                            </div>
                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label for="fixed-date" id="fixed-date-label" class="col-form-label">Fixed Date:</label>
                                    <input type="datetime-local" class="form-control datetime" id="fixed-date" name="fixed-date" placeholder="Enter fixed date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reported-issue" class="col-form-label">Reported Issue:</label>
                                    <textarea class="form-control" id="reported-issue" name="reported-issue" placeholder="Enter reported Issue"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reason" class="col-form-label">What caused the issue:</label>
                                    <textarea class="form-control" id="reason" name="reason" placeholder="Enter what caused the issue"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="create-task">Create</button>
            </div>
        </div>
    </div>
</div>



<!-- Edit modal -->


<div class="modal fade modal-lg" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label">Update task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form">
                    <div class="container">
                        <div class="row">
                            <input type="hidden" id="edit-id">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="company-name" class="col-form-label">Company name:</label>
                                    <input type="text" class="form-control" id="edit-company-name" name="company-name" placeholder="Enter company name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="contact-phone" class="col-form-label">Contact phone:</label>
                                    <input type="text" class="form-control" id="edit-contact-phone" name="contact-phone" placeholder="Enter contact phone">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Address:</label>
                                    <input type="text" class="form-control" id="edit-address" name="address" placeholder="Enter address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status:</label>
                                    <select class="form-select" id="edit-status">
                                        <option value="" name="status">Select status</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="process">Process</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="done-by" class="col-form-label">Done by:</label>
                                    <input type="text" class="form-control" id="edit-done-by" name="done-by" placeholder="Enter done by">
                                </div>
                            </div>
                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label for="fixed-date" id="edit-fixed-date-label" class="col-form-label">Fixed Date:</label>
                                    <input type="datetime-local" class="form-control datetime" id="edit-fixed-date" name="fixed-date" placeholder="Enter fixed date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reported-issue" class="col-form-label">Reported Issue:</label>
                                    <textarea class="form-control" id="edit-reported-issue" name="edit-reported-issue" placeholder="Enter reported Issue"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reason" class="col-form-label">What caused the issue:</label>
                                    <textarea class="form-control" id="edit-reason" name="reason" placeholder="Enter what caused the issue"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update-task">Update</button>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function edit(id) {
       
        

    if (id == "") {
        toastr.error('Edit id required')
    } else {
        $.ajax({
            url: "<?php echo base_url(); ?>tasks/edit",
            type: "post",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                if (data.response === 'success') {

                     console.log(data);   
                    $("#edit-id").val(data.post.id);
                    $("#edit-company-name").val(data.post.company_name);
                    $("#edit-contact-phone").val(data.post.contact_phone);
                    $("#edit-address").val(data.post.address);
                    $("#edit-status").val(data.post.status);
                    $("textarea#edit-reported-issue").val(data.post.reported_issue);
                    $("textarea#edit-reason").val(data.post.reason);
                    $("#edit-done-by").val(data.post.done_by);
                    $("#edit-fixed-date").val(data.post.fixed_date);


                    if (data.post.status != 'fixed') {
                        $('#edit-fixed-date').hide()
                        $('#edit-fixed-date-label').hide()
                
                    } else {
                        $('#edit-fixed-date').show()
                        $('#edit-fixed-date-label').show()

                    }
                    $("#edit-status").on('change', function(e) {
                        if (data.post.status != 'fixed') {
                            $('#edit-fixed-date').hide()
                            $('#edit-fixed-date-label').hide()
                            
                        } else {
                            $('#edit-fixed-date').show()
                            $('#edit-fixed-date-label').show()

                        }
                    }) 


                 


                    $('#edit-modal').modal('show');

                } else {
                    toastr.error(data.message);
                }
            }
        });
    }
    }
    $(document).ready(function() {


        // Read data to a table
        function fetch() {

            $.ajax({
                url: "<?php echo base_url(); ?>tasks/fetch",
                type: "get",
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    var tbody = "";
                    for (var key in data) {
                        tbody += "<tr class='table-active'>";
                        tbody += "<td>" + data[key]['company_name'] + "</td>";
                        tbody += "<td>" + data[key]['contact_phone'] + "</td>";
                        tbody += "<td>" + data[key]['address'] + "</td>";
                        tbody += "<td>" + data[key]['reported_issue'] + "</td>";
                        tbody += "<td>" + data[key]['reason'] + "</td>";
                        tbody += "<td>" + data[key]['status'] + "</td>";
                        tbody += "<td>" + data[key]['done_by'] + "</td>";
                        tbody += "<td>" + data[key]['fixed_date'] + "</td>";
                        tbody += `<td>
                        
                                    <p><a title="View"  class="badge bg-secondary" href="<?= base_url() ?>/tasks/view/${data[key]['id']}"><i class="fa fa-eye fa-lg"></i></a></p>
                                    <p><button type="submit"  title="Edit" class="badge bg-info" onclick="edit(${data[key]['id']})"  value="${data[key]['id']}"><i class="fa fa-edit fa-lg"></i></button></p>
                                    <p><a title="Delete" class="badge bg-danger" href="<?= base_url() ?>/tasks/delete/${data[key]['id']}"><i class="fa fa-trash fa-lg"></i></a></p>
                                </td>`;
                        tbody += "<tr>";
                    }

                    $("#tbody").html(tbody);
                }
            });
        }


        $('#fixed-date').hide()
        $('#fixed-date-label').hide()

        $("#status").on('change', function(e) {
            if (e.target.value != 'fixed') {
                $('#fixed-date').hide()
                $('#fixed-date-label').hide()
            } else {

                $('#fixed-date').show()
                $('#fixed-date-label').show()
            }
        })


       
 


        // Save data to tasks table
        $('#create-task').click(function(e) {
            e.preventDefault();
            var company_name = $('#company-name').val();
            var contact_phone = $("#contact-phone").val();
            var address = $("#address").val();
            var reported_issue = $("#reported-issue").val();
            var reason = $("#reason").val();
            var status = $("#status").val();
            var done_by = $("#done-by").val();
            var fixed_date = $("#fixed-date").val();
            var data;
            if(status == 'process'){
                data = {
                    "company-name": company_name,
                    "contact-phone": contact_phone,
                    "address": address,
                    "reported-issue": reported_issue,
                    "reason": reason,
                    "status": status,
                    "done-by": done_by,
                    "fixed-date": fixed_date

                }
            }else{
                data = {
                    "company-name": company_name,
                    "contact-phone": contact_phone,
                    "address": address,
                    "reported-issue": reported_issue,
                    "reason": reason,
                    "status": status,
                    "done-by": done_by,
                    "fixed-date": fixed_date
                }
            }
            $.ajax({
                url: "<?php echo base_url(); ?>tasks/create",
                type: "POST",
                dataType: "json",
                data: data,
                success: function(data) {
                    if (data.response == 'success') {
                        fetch();
                        toastr.success(data.message);
                        $('#exampleModal').modal('hide')
                        $("#add-form")[0].reset();

                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function(data) {

                    toastr.error(data.message);
                }
            });
        });




        // Display data
        fetch();


        // Update task
        $(document).on("click", "#update-task", function(e) {
        e.preventDefault();
        

        var id = $('#edit-id').val();
        var company_name = $('#edit-company-name').val();
            var contact_phone = $("#edit-contact-phone").val();
            var address = $("#edit-address").val();
            var reported_issue = $("#edit-reported-issue").val();
            var reason = $("#edit-reason").val();
            var status = $("#edit-status").val();
            var done_by = $("#edit-done-by").val();
            var fixed_date = $("#edit-fixed-date").val();
      

            $.ajax({
                url: "<?php echo base_url(); ?>tasks/update",
                type: "post",
                dataType: "json",
                data: {
                    id: id,
                    "company-name": company_name,
                    "contact-phone": contact_phone,
                    "address": address,
                    "reported-issue": reported_issue,
                    "reason": reason,
                    "status": status,
                    "done-by": done_by,
                    "fixed-date": fixed_date
                },
                success: function(data) {
                    fetch();
                    if (data.response === 'success') {
                        toastr.success(data.message);
                        $('#edit-modal').modal('hide');
                      
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
            $("#update_form")[0].reset();
        })










    });
</script>