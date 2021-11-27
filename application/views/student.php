<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/jquery-validation/lib/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery-validation/dist/jquery.validate.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
    <style>
        .error{
            color:red;
        }
        a {
            text-decoration: none;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-9">
            <button type="button" class="btn btn-link text-decoration-none text-primary" id="delete_student">Delete</button>
            <button type="button" class="btn btn-link text-decoration-none text-primary" id="edit_student">Edit</button>
            </div>
            <div class="col-md-3 text-end">
                <a href="<?php echo base_url('logout'); ?>" class="btn btn-primary text-white">Logout</a>
                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#studentModal">Add New</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table class="table table-bordered" id="student_table">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col"><input type="checkbox" name="check_all" value="" id="check_all"/></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email Id</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Image</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Hobby</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>        
                <div id="pagination" class="text-center"></div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" enctype="multipart/form-data" id="add_student" name="add_student">
                        <div class="modal-header">
                            <h5 class="modal-title" id="studentModalLabel">Add Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required/>
                            </div>
                            <div class="mb-3">
                                <label for="email_address" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email_address" name="email" placeholder="Enter email" required/>
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number" required minlength="10" maxlength="10" pattern="\d{10}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
                                <input class="form-control" type="file" id="image" name="image" accept="image/*" onchange="loadFile(event)">
                                <img id="image_preview" class="mt-3 d-none" width="100" height="100"/>
                            </div>

                            <div>
                                <label for="gender" class="form-label">Gender</label>
                            </div>

                            <div class="form-check float-start text-start">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check float-start text-start ms-2">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="clearfix mt-5"></div>

                            <div>
                                <label for="hobby" class="form-label">Hobby</label>
                            </div>

                            <div class="form-check float-start text-start">
                                <input class="form-check-input" type="checkbox" value="singing" id="singing" name="hobby[]">
                                <label class="form-check-label" for="singing">Singing</label>
                            </div>
                            <div class="form-check float-start text-start ms-2">
                                <input class="form-check-input" type="checkbox" value="dancing" id="dancing" name="hobby[]">
                                <label class="form-check-label" for="dancing">Dancing</label>
                            </div>
                            <div class="form-check float-start text-start ms-2">
                                <input class="form-check-input" type="checkbox" value="painting" id="painting" name="hobby[]">
                                <label class="form-check-label" for="painting">Painting</label>
                            </div>
                            <div class="form-check float-start text-start ms-2">
                                <input class="form-check-input" type="checkbox" value="movie" id="movie" name="hobby[]">
                                <label class="form-check-label" for="movie">Movie</label>
                            </div>
                            <div class="form-check float-start text-start ms-2">
                                <input class="form-check-input" type="checkbox" value="cooking" id="cooking" name="hobby[]">
                                <label class="form-check-label" for="cooking">Cooking</label>
                            </div>
                            
                            <div class="clearfix mt-5"></div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of birth</label>
                                <input type="text" class="form-control datepicker" id="date_of_birth" name="date_of_birth" placeholder="Enter date of birth" required/>
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="student_id" id="student_id" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="submit_form">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            studentList = (pagno) => {
                $.ajax({
                    url: '<?php echo base_url('student_list'); ?>/'+pagno,  
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        $('#pagination').html(response.pagination);
                        createTable(response.result,response.row);
                    }  
                });  
            }  
            
            createTable = (students,sno) => {
                $('#student_table tbody').empty();
                let tr='';
                console.log(students);
                console.log(students.length);
                if(students.length){
                    $.each(students, function (key,student) {
                        let student_image = student.image?`<img src="<?php echo base_url('upload/'); ?>`+student.image+`" width="50" height="50"/>`:'';
                        tr += `<tr>
                            <td scope="row">`+(parseInt(sno)+key+1)+`</td>
                            <td><input type="checkbox" name="check[]" class="single_check" value="`+student.student_id+`"/></td>
                            <td>`+student.name+`</td>
                            <td>`+student.email+`</td>
                            <td>`+student.phone_number+`</td>
                            <td>`+student.date_of_birth+`</td>
                            <td>`+student_image+`</td>
                            <td>`+student.gender+`</td>
                            <td>`+student.hobby+`</td>
                            </tr>`;
                    });
                }else{
                    tr = `<tr><td colspan="9" scope="row" class="text-center">No student found.</td></tr>`;
                }
                $('#student_table tbody').append(tr);
            }

            loadFile = (event) => {
                $('#image_preview').removeClass('d-none');
                var reader = new FileReader();
                reader.onload = function(){
                    var output = document.getElementById('image_preview');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };

            studentAjax = () => {
                let formData = new FormData(document.getElementById("add_student"));
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('/student_save_ajax'); ?>',
                    mimeType:'application/json',
                    dataType:'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data',
                    success: function(data){
                        if(data.status==true){
                            studentList(0);
                            $('#studentModal').modal('hide');
                        }
                        else{
                            alert(data.message);
                        }
                        return false;
                    },complete:function(result,res){
                        if(result.responseJSON.status==true){
                            setTimeout(() => {
                                alert(result.responseJSON.message);
                            }, 1000);
                        }
                    }
                });
            }

            $(document).ready(function() {
                studentList(0);
                $('.datepicker').datepicker({
                    format: 'dd-mm-yyyy',
                    endDate: '0'
                });
                $('#add_student').submit(false);
                $.validator.addMethod("tendigits",
                    function (value, element) {
                        if (value == "")
                            return false;
                        return value.match(/^\d{10}$/);
                    },
                    "Please enter 10 digits phone number."
                );

                $("#add_student").validate({
                    rules: {
                        email:{
                            remote: {
                                url: "<?php echo base_url('unique_email'); ?>",
                                type: "post",
                                data: {
                                    email: function() {
                                        return $("#email_address").val();
                                    },
                                    student_id: function() {
                                        return $("#student_id").val();
                                    }
                                }
                            }
                        },
                        phone_number:{
                            tendigits:true,
                            minlength:10,
                            maxlength:10,
                            remote: {
                                url: "<?php echo base_url('unique_phone_number'); ?>",
                                type: "post",
                                data: {
                                    phone_number: function() {
                                        return $("#phone_number").val();
                                    },
                                    student_id: function() {
                                        return $("#student_id").val();
                                    }
                                }
                            }
                        }
                    },
                    messages:{
                        email: {
                            remote: 'The email is already in use!'
                        },
                        phone_number: {
                            remote: 'The phone number is already in use!'
                        }
                    },
                    submitHandler: function (form) {                       
                        studentAjax();
                        return false;
                    }
                });

                $('#check_all').on('click',function(){
                    if(this.checked) {
                        $('.single_check').attr('checked','checked').prop('checked',true);
                    } else {
                        $('.single_check').removeAttr('checked').prop('checked',false);
                    }
                });

                $('#delete_student').on('click',function(){
                    if($('.single_check:checked').length==0){
                        alert('Please select at least one student to delete.');
                        return false;
                    }

                    if (confirm("Are you sure you want to delete selected student?")) {
                        let student_ids = $(".single_check:checked").map(function(){
                            return $(this).val();
                        }).get();
                        
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url('delete_student'); ?>',
                            dataType:'json',
                            data: {'student_id':student_ids},
                            success: function(response){
                                studentList(0);
                            },complete:function(result){
                                if(result.responseJSON.status==true){
                                    setTimeout(() => {
                                        alert(result.responseJSON.message);
                                    }, 1000);
                                }
                            }
                        });
                        return true;
                    }
                    return false;
                });

                $('#edit_student').on('click',function(){
                    if($('.single_check:checked').length==0){
                        alert('Please click on the checkbox to edit student.');
                        return false;
                    }else if($('.single_check:checked').length>1){
                        alert("You cannot edit multiple student information.");
                        return false;
                    }

                    let student_id = $('.single_check:checked').val();

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('get_student'); ?>',
                        dataType:'json',
                        data: {'student_id':student_id},
                        success: function(student){
                            $('#name').val(student.name);
                            $('#email_address').val(student.email);
                            $('#phone_number').val(student.phone_number);
                            if(student.image){
                                $('#image_preview')
                                .removeClass('d-none')
                                .attr('src','<?php echo base_url('/upload'); ?>/'+student.image);
                            }
                            $('input[name="gender"][value="' + student.gender +'"]').attr("checked", "checked").prop('checked',true);
                            if(student.hobby){
                                let hobbies = student.hobby.split(",");
                                $.each(hobbies, function(i, hobby){
                                    $('input[name="hobby[]"][value="' + hobby +'"]').attr("checked", "checked").prop('checked',true);
                                });
                            }
                            $('#gender').val(student.gender);
                            $('#date_of_birth').val(student.date_of_birth);
                            $('#student_id').val(student.student_id);
                        }
                    });

                    $('#studentModal').modal("show");
                });

                $('#studentModal').on('hidden.bs.modal',function(){
                    $("#add_student")[0].reset();
                    $('#image_preview').addClass('d-none').attr('src','');
                    $('input[name="gender"][value="male"]').attr("checked", "checked").prop('checked',true);
                    $('input[name="hobby[]"]').removeAttr("checked");
                    $('#student_id').val('');
                });

                $('#pagination').on('click','li',function(e){
                    e.preventDefault();   
                    var pageno = $(this).find('a').attr('data-ci-pagination-page');  
                    studentList(pageno);
                });
            });
        </script>
  </body>
</html>
