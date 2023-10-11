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
        $.get("pages/daily-report/read.php", {}, function (data, status) {
            $("#read").html(data);
        });
    }

    function createModal() {
        $('#btn-create').click();
        $.get("pages/daily-report/create.php", {}, function (data, status) {
            $("#modal").html(data);
        });
    }


    function store() {
        Swal.fire({
  title: 'Do you want to report this data?',
  showDenyButton: true,
  confirmButtonText: 'Save',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
            var value = $('#balance').val();

            if(value <= 10000){
                    var data = $('#formbalance').serialize();
                    var message = "Successfully Create Data";
                    $.ajax({
                        type: "GET",
                        url: "pages/daily-report/read.php?action=store",
                        data: data,
                        typeData: "json",
                        success: function (response) {
                            read();
                            readBalance();
                            $('.close').click();
                            actionAlert(message);
                        }
                    })
            }else{
                actionAlert("Can't make report if balance under Rp. 10.000");
            }

            
  }
})






        
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
                $.get("pages/daily-report/read.php?action=delete&id=" + id + "", {}, function (data, status) {
                    read();
                    readBalance();
                    actionAlert(message);
                });
            }
        })
    }

    function actionAlert(message) {
        toastr.info(message)
    }
</script>