<script>


    function check(){
        var information = $('#information').val();
        var amount = $('#amount').val();
        var am = amount.replace(/[a-z,A-Z,., ]/g, '');
        var amvalue = parseInt(am);
        
        var wallet = $('#wallets').val();
        var wall = wallet.replace(/[a-z,A-Z,., ]/g, '');
        var wallvalue = parseInt(wall);


        $('#amount').val(formatRupiah(amount, "Rp ."));

        if(amvalue > wallvalue){
            $('#valuebalance').css('display', 'block');

            
        }else{
            $('#valuebalance').css('display', 'none');

        }


        if(amount.length > 20 | information.length > 250){
            
            $('#longvalues').css('display', 'block')
            
            $('#submitbutton').css('display', 'none')
        } else {
            $('#submitbutton').css('display', 'block')
            $('#longvalues').css('display', 'none')
        }
    }
    function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function read() {
        $.get("pages/expense-report/read.php", {}, function (data, status) {
            $("#read").html(data);
        });
    }

    function createModal() {
        $('#btn-create').click();
        $.get("pages/expense-report/create.php", {}, function (data, status) {
            $("#modal").html(data);
        });
    }


    function store() {
        var amount = $('#amount').val();
        var information = $('#information').val();

        var information = $('#information').val();
        var am = amount.replace(/[a-z,A-Z,., ]/g, '');
        var amvalue = parseInt(am);
        
        var wallet = $('#wallets').val();
        var wall = wallet.replace(/[a-z,A-Z,., ]/g, '');
        var wallvalue = parseInt(wall);


        if (amount == '') {
            $('#requiredamount').css('display', 'block');
        } else {
            $('#requiredamount').css('display', 'none');
        }
        if (information == '') {
            $('#requiredinformation').css('display', 'block');
        } else {
            $('#requiredinformation').css('display', 'none');
        }

        if(amvalue <= wallvalue){
            if (amount != '' && information != '') {
            var data = $('#dataStore').serialize();
            var message = "Successfully Create Data";
            $.ajax({
                type: "POST",
                url: "pages/expense-report/read.php?action=store",
                data: data,
                typeData: "json",
                success: function (response) {
                    read();
                    readBalance();
                    $('.close').click();
                    actionAlert(message);
                }
            })
        }
        }
    }

    function editModal(id) {
        $('#btn-create').click();

        $.get("pages/expense-report/edit.php?id=" + id + "", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function update() {


        var category = $('#category').val();


        if (category == '') {
            $('#requiredcategory').css('display', 'block');
        } else {
            $('#requiredcategory').css('display', 'none');
        }

        if (category != '') {
            var data = $('#dataStore').serialize();
            var message = "Successfully Update Data";
            $.ajax({
                type: "POST",
                url: "pages/expense-report/read.php?action=update",
                data: data,
                typeData: "json",
                success: function (response) {
                    read();
                    readBalance();
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
                $.get("pages/expense-report/read.php?action=delete&id=" + id + "", {}, function (data, status) {
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