<script>


    function read() {
        $.get("pages/absent/read.php", {}, function (data, status) {
            $("#read").html(data);
        });
    }

    function createModal() {
        $('#btn-create').click();
        $.get("pages/absent/create.php", {}, function (data, status) {
            $("#modal").html(data);
        });
    }


    function absent() {
        var data = $('#absentform').serialize();
    
        $('#absent').checked = false;
        var message = "Absent Has Confirmated";
        var messagesel = "Select Emplooyees First";
        var info = $('#info').val();
        var absent = $('#absent').val();
        if (info == '') {
            $('#requiredinfo').css('display', 'block');
        } else {
            $('#requiredinfo').css('display', 'none');
        }

        var cek = data.substring(0,6);

        console.log(data);


        if (cek != 'absent'){
            actionAlert(messagesel);

        } else if ( info == '') {

        } else if( cek = 'absent' && info != ''){
            $.ajax({
                type: "GET",
                url: "pages/absent/read.php?action=confirm",
                data: data,
                typeData: "json",
                success: function (response) {
                    $('.close').click();
                    read();
                    actionAlert(message);
                }
            })
        }   



        
    }


    function changemonth(){
        var data = $('#monthfilter').val();
        $.get("pages/absent/read.php?month="+data+"", {}, function (data, status) {
            $("#read").html(data);
        });
    }

    function viewabsent(id){
        $('#btn-create').click();

        $.get("pages/absent/view.php?id=" + id + "", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function viewmonthabsent(month){
        $('#modalBody').children().remove();
        $.get("pages/absent/read.php?view="+month+"", {}, function (data, status) {
            $("#modalBody").html(data);
        });
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
                $.get("pages/absent/read.php?action=delete&id=" + id + "", {}, function (data, status) {
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