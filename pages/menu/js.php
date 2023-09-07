<script>
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

    function editModal(id) {
        $('#btn-create').click();

        $.get("pages/menu/edit.php?id=" + id + "", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function update() {
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
    
    function actionAlert(message){
        toastr.info(message)
    }


    
</script>

<script type="text/javascript">
		
		$('#rupiah').keyup(function(e) {
            alert("ads");
        })
		// rupiah.addEventListener('keyup', function(e){
		// 	// tambahkan 'Rp.' pada saat form di ketik
		// 	// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		// 	rupiah.value = formatRupiah(this.value, 'Rp. ');
		// });
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>