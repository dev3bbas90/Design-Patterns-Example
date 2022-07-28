<script>
    function delete_post( id ) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
            }).then(function delete_post( id ) {
                $.ajax({
                    url: 'program-category/'+id,
                    method: 'POST',
                })
                Swal.fire(
                    "Deleted!",
                    "Deleted",
                    "success",
                )
            }
        });
    }


</script>
