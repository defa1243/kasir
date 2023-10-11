<script>


    function check(){
        var menu = $('#menu').val();
        var price = $('#price').val();
        var information = $('#information').val();

        if(menu.length > 50 | price.length > 50 | information.length > 255){
            


            $('#longvalues').css('display', 'block')
            
            $('#submitbutton').css('display', 'none')
        } else {
            $('#submitbutton').css('display', 'block')
            $('#longvalues').css('display', 'none')
        }
    }



    function read() {
        $.get("pages/menu/read.php", {}, function (data, status) {
            $("#read").html(data);
        });
    }

    function createModal() {
        $('#btn-create').click();
        $.get("pages/menu/create.php", {}, function (data, status) {
            $("#modal").html(data);
        });
    }


    function store() {
        var menu = $('#menu').val();
        var price = $('#price').val();
        var category = $('#category').val();


        if (menu == '') {
            $('#requiredmenu').css('display', 'block');
        } else {
            $('#requiredmenu').css('display', 'none');
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

        if (menu != '' && price != '' && category != '') {
            var data = $('#dataStore').serialize();
            var message = "Successfully Create Data";
            $.ajax({
                type: "POST",
                url: "pages/menu/read.php?action=store",
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

        $.get("pages/menu/edit.php?id=" + id + "", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function update() {


        var menu = $('#menu').val();
        var price = $('#price').val();
        var category = $('#category').val();


        if (menu == '') {
            $('#requiredmenu').css('display', 'block');
        } else {
            $('#requiredmenu').css('display', 'none');
        }

        if (price == '') {
            $('#requiredprice').css('display', 'block');
        } else {
            $('#requiredprice').css('display', 'none');
        }

        if (category == '') {
            $('#requiredcategkory').css('display', 'block');
        } else {
            $('#requiredcategory').css('display', 'none');
        }

        if (menu != '' && price != '' && category != '') {
            var data = $('#dataStore').serialize();
            var message = "Successfully Update Data";
            $.ajax({
                type: "POST",
                url: "pages/menu/read.php?action=update",
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
                $.get("pages/menu/read.php?action=delete&id=" + id + "", {}, function (data, status) {
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