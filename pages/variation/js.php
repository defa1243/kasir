<script>


    function check(){
        var variation = $('#variation').val();
        var price = $('#price').val();

        if(variation.length > 50 | price.length > 20){
            $('#longvalues').css('display', 'block')
            
            $('#submitbutton').css('display', 'none')
        } else {
            $('#submitbutton').css('display', 'block')
            $('#longvalues').css('display', 'none')
        }
    }

    function read() {
        $.get("pages/variation/read.php", {}, function (data, status) {
            $("#read").html(data);
        });
    }

    function createModal() {
        $('#btn-create').click();
        $.get("pages/variation/create.php", {}, function (data, status) {
            $("#modal").html(data);
        });
    }


    function store() {
        var variation = $('#variation').val();
        var price = $('#price').val();
        var category = $('#category').val();


        if (variation == '') {
            $('#requiredvariation').css('display', 'block');
        } else {
            $('#requiredvariation').css('display', 'none');
        }
        if (price == '') {
            $('#requiredprice').css('display', 'block');
        } else {
            $('#requiredprice').css('display', 'none');
        }
        if (category == '') {
            $('#requiredcategory').css('display', 'block');
        } else {
            $('#requiredcategory').css('display', 'none');
        }

        if (variation != '' && price != '' && category != '') {
            var data = $('#dataStore').serialize();
            var message = "Successfully Create Data";
            $.ajax({
                type: "POST",
                url: "pages/variation/read.php?action=store",
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

        $.get("pages/variation/edit.php?id=" + id + "", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function update() {
        var variation = $('#variation').val();
        var price = $('#price').val();
        var category = $('#category').val();


        if (variation == '') {
            $('#requiredvariation').css('display', 'block');
        } else {
            $('#requiredvariation').css('display', 'none');
        }
        if (price == '') {
            $('#requiredprice').css('display', 'block');
        } else {
            $('#requiredprice').css('display', 'none');
        }
        if (category == '') {
            $('#requiredcategory').css('display', 'block');
        } else {
            $('#requiredcategory').css('display', 'none');
        }

        if (variation != '' && price != '' && category != '') {
            var data = $('#dataStore').serialize();
            var message = "Successfully Update Data";
            $.ajax({
                type: "POST",
                url: "pages/variation/read.php?action=update",
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
                $.get("pages/variation/read.php?action=delete&id=" + id + "", {}, function (data, status) {
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