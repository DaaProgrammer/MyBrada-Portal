    function isTokenExpired(token) {
        const payload = JSON.parse(atob(token.split('.')[1]));
        return payload.exp < Math.floor(Date.now() / 1000);
    }

    function blockUser(userId) {
        Swal.fire({
        title: "Are you sure?",
        text: "You can revert this at anytime!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Block user!"
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            Swal.fire({
                title: 'Blocking user...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            axios.post('blockuser', {user_id: userId})
                .then(function (response) {
                    if (response.data.status === 'success') {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Blocked!",
                                text: "User successully blocked.",
                                icon: "success"
                            }).then(() => {
                                // Optionally, you can reload the page or update the UI
                                window.location.reload();

                            });;
                        }
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Failed to block user",
                        text: "An error occurred while blocking a user.",
                        });
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed to block user",
                        text: "An error occurred while blocking a user.",
                    });
                });
        });    
    }

    function unblockUser(userId) {
        Swal.fire({
        title: "Are you sure?",
        text: "You can revert this at anytime!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, unblock user!"
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            Swal.fire({
                title: 'Unblocking user...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            

            axios.post('unblockuser', {user_id: userId})
                .then(function (response) {
                    if (response.data.status === 'success') {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Unblocked!",
                                text: "User successully unblocked.",
                                icon: "success"
                            }).then(() => {
                                // Optionally, you can reload the page or update the UI
                                window.location.reload();

                            });
                        }
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Failed to unblock user",
                        text: "An error occurred while unblocking a user.",
                        });
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed to block user",
                        text: "An error occurred while unblocking a user.",
                    });
                });
        });    
    }

    function deleteResponder(){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
        }
        });    
    }


    function deletePost(){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
        }
        });    
    }



    function deleteAlert(){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
        }
        });    
    }



    function deleteNotice(){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
        }
        });    
    }

    function deleteProfessionalSupport(){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
        }
        });    
    }

$(document).ready(function() {
    $('.datatables').DataTable({
        dom: '<"custom-header"f>rt<"bottom"lip><"clear">',
        "paging": true,
        "searching": true,
        "info": false,
        "lengthChange": false
    });
});