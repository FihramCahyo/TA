<script>
    function showSuccessAlert(message) {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data Anda Berhasil Disimpan",
            showConfirmButton: false,
            timer: 1500
        });
    }

    function confirmDelete(e) {
        e.preventDefault();
        let pesan = $(this).data('pesan');
        let url = $(this).closest('form');
        Swal.fire({
            text: `Yakin hapus ${pesan}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                url.submit();
                Swal.fire({
                    title: 'Deleted!',
                    text: `${pesan} Berhasil Dihapus`,
                    icon: 'success'
                });
            }
        });
    }
    $(document).on('click', '.btn-delete', confirmDelete);
</script>
