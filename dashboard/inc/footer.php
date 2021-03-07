<script src="../assets/lib/jquery/jquery.js"></script>
<script src="../assets/lib/popper.js/popper.js"></script>
<script src="../assets/lib/bootstrap/bootstrap.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../assets/js/starlight.js"></script>
<script>
    $('.temporaryDelete').click(
        function () {
            let id = $(this).attr('data-id');
            setTimeout(function () {
                window.location.href = "userDelete.php?userId=" + id;
            }, 500)
        }
    )
</script>
<script>
    $('.recoverUser').click(
        function () {
            let id = $(this).attr('data-id');
            setTimeout(function () {
                window.location.href = "userDelete.php?recoverId=" + id;
            }, 500)
        }
    )
    $('.confirmDelete').click(
        function () {
            let id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this  Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your Data has been deleted!", {
                            icon: "success",
                        });
                        setTimeout(function () {
                            window.location.href = "userDelete.php?deletedId=" + id;
                        }, 1500)
                    } else {
                        swal("Your Data Will be safe!");
                    }
                });
        }
    )
</script>
</body>
</html>
