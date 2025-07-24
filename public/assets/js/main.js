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

    function deleteResponder(userId){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete Responder!"
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            Swal.fire({
                title: 'Deleting the Responder...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            

            axios.post('deleteresponder', {user_id: userId})
                .then(function (response) {
                    if (response.data.status === 'success') {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Responder successully deleted.",
                                icon: "success"
                            }).then(() => {
                                window.location.reload();

                            });
                        }
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Responder",
                        text: "An error occurred while deleting the Responder.",
                        });
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Responder",
                        text: "An error occurred while deleting the Responder.",
                    });
                });
        });    
    }


    function deletePost(postId){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            Swal.fire({
                title: 'Deleting the Responder...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            

            axios.post('deletenewsfeed', {post_id: postId})
                .then(function (response) {
                    if (response.data.status === 'success') {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Post successully deleted.",
                                icon: "success"
                            }).then(() => {
                                window.location.reload();

                            });
                        }
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Post",
                        text: "An error occurred while deleting the Post.",
                        });
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Responder",
                        text: "An error occurred while deleting the Post.",
                    });
                });
        });    
    }



    function deleteAlert(alertId){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            Swal.fire({
                title: 'Deleting Alert...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            

            axios.post('deletealert', {alert_id: alertId})
                .then(function (response) {
                    if (response.data.status === 'success') {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Alert Deleted!",
                                text: "Alert successully deleted.",
                                icon: "success"
                            }).then(() => {
                                window.location.reload();

                            });
                        }
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Failed to delete Alert",
                        text: "An error occurred while deleting the Alert.",
                        });
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed to delete Alert",
                        text: "An error occurred while deleting the Alert.",
                    });
                });
        
        });    
    }



    function deleteNotice(noticeId){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            Swal.fire({
                title: 'Deleting the Notice...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            

            axios.post('deletenotice', {notice_id: noticeId})
                .then(function (response) {
                    if (response.data.status === 'success') {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Notice successully deleted.",
                                icon: "success"
                            }).then(() => {
                                window.location.reload();

                            });
                        }
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Notice",
                        text: "An error occurred while deleting the Notice.",
                        });
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Notice",
                        text: "An error occurred while deleting the Notice.",
                    });
                });
        });    
    }


    function deleteProfessionalSupport(professionalSupportId){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            Swal.fire({
                title: 'Deleting the Notice...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            

            axios.post('deleteprofessionalsupport', {professionalSupport_id: professionalSupportId})
                .then(function (response) {
                    if (response.data.status === 'success') {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Professional Support successully deleted.",
                                icon: "success"
                            }).then(() => {
                                window.location.reload();

                            });
                        }
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Professional Support",
                        text: "An error occurred while deleting the Professional Support.",
                        });
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Professional Support",
                        text: "An error occurred while deleting the Professional Support.",
                    });
                });
            
        });    
    }


    function deleteProfessional(professionalId){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            Swal.fire({
                title: 'Deleting the Notice...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            

            axios.post('deleteprofessional', {professional_id: professionalId})
                .then(function (response) {
                    if (response.data.status === 'success') {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Professional successully deleted.",
                                icon: "success"
                            }).then(() => {
                                window.location.reload();

                            });
                        }
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Professional",
                        text: "An error occurred while deleting the Professional.",
                        });
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed to delete the Professional",
                        text: "An error occurred while deleting the Professional.",
                    });
                });
            
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