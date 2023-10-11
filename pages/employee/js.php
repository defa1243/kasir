<script>

    function check(){
        var name = $('#name').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var email = $('#email').val();

        if(name.length > 50 | address.length > 50 | phone.length > 13 | email.length > 50){
            


            $('#longvalues').css('display', 'block')
            
            $('#submitbutton').css('display', 'none')
        } else {
            $('#submitbutton').css('display', 'block')
            $('#longvalues').css('display', 'none')
        }
    }


    function read() {
        $.get("pages/employee/read.php", {}, function (data, status) {
            $("#read").html(data);
        });
    }

    function createModal() {
        $('#btn-create').click();
        $.get("pages/employee/create.php", {}, function (data, status) {
            $("#modal").html(data);
        });
    }


    function store() {
        var name = $('#name').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var email = $('#email').val();


        if (name == '') {
            $('#requiredname').css('display', 'block');
        } else {
            $('#requiredname').css('display', 'none');
        }

        if (address == '') {
            $('#requiredaddress').css('display', 'block');
        } else {
            $('#requiredaddress').css('display', 'none');
        }
        if (phone == '') {
            $('#requiredphone').css('display', 'block');
        } else {
            $('#requiredphone').css('display', 'none');
        }
        if (email == '') {
            $('#requiredemail').css('display', 'block');
        } else {
            $('#requiredemail').css('display', 'none');
        }

        if (name != '' && address != '' && phone != '' && email != '') {
            var data = $('#dataStore').serialize();
            var message = "Successfully Create Data";
            $.ajax({
                type: "POST",
                url: "pages/employee/read.php?action=store",
                data: data,
                typeData: "json",
                success: function (response) {
                    read();
                    $('.close').click();
                    actionAlert(message);
                }
            })
        }
    }

    function editModal(id) {
        $('#btn-create').click();

        $.get("pages/employee/edit.php?id=" + id + "", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function update() {


        var name = $('#name').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var email = $('#email').val();


        if (name == '') {
            $('#requiredname').css('display', 'block');
        } else {
            $('#requiredname').css('display', 'none');
        }

        if (address == '') {
            $('#requiredaddress').css('display', 'block');
        } else {
            $('#requiredaddress').css('display', 'none');
        }
        if (phone == '') {
            $('#requiredphone').css('display', 'block');
        } else {
            $('#requiredphone').css('display', 'none');
        }
        if (email == '') {
            $('#requiredemail').css('display', 'block');
        } else {
            $('#requiredemail').css('display', 'none');
        }

        if (name != '' && address != '' && phone != '' && email != '') {
            var data = $('#dataStore').serialize();
            var message = "Successfully Update Data";
            $.ajax({
                type: "POST",
                url: "pages/employee/read.php?action=update",
                data: data,
                typeData: "json",
                success: function (response) {
                    read();
                    $('.close').click();
                    actionAlert(message);
                }
            })
        }


    }

    function deleteData(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var message = "Successfully Deleted Data";
                $.get("pages/employee/read.php?action=delete&id=" + id + "", {}, function (data, status) {
                    read();
                    actionAlert(message);
                });
            }
        })
    }

    function actionAlert(message) {
        toastr.info(message)
    }
</script>