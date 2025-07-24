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


    function addResponder() {
        const formData = new FormData(document.getElementById('addResponderForm'));
        Swal.fire({
            title: 'Adding Responder...',
            text: 'Please wait while we process your request.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        axios.post('addresponder', formData,    
            {
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(function (response) {
                if (response.data.status === 'success') {
                    Swal.fire({
                        title: "Success!",
                        text: "Responder successfully added.",
                        icon: "success"
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Failed to add Responder",
                        text: response.data.message || "An error occurred while adding the Responder.",
                    });
                }
            }  )
            .catch(function (error) {               
                console.error(error);
                Swal.fire({
                    icon: "error",
                    title: "Failed to add Responder",
                    text: "An error occurred while adding the Responder.",
                });
            });
    }


  function changeDispatcherStatus(checkbox) {
    var statusSpan = document.getElementById('addResponderStatus');
    if (checkbox) {
        statusSpan.innerHTML = 'Active';
        statusSpan.classList.remove('text-warning', 'text-success');
        statusSpan.classList.add('text-success');
    } else {
        statusSpan.innerHTML = 'Inactive';
        statusSpan.classList.remove('text-success', 'text-warning');
        statusSpan.classList.add('text-warning');
    }
}

let editorInstance;
function addNewsfeed() {
    const editorData = editorInstance.getData(); // or editorInstance.getData() if you're using CKEditor 5
    document.getElementById('post_content_add').value = editorData;

    const form = document.getElementById('addNewsfeedForm');
    const formData = new FormData(form);

    if (!document.getElementById('post_status').checked) {
        formData.set('post_status', 'published'); // or leave it blank if you prefer
    }
    Swal.fire({
        title: 'Adding Post...',
        text: 'Please wait while we process your request.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    axios.post('addnewsfeed', formData,    
        {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function (response) {
            if (response.data.status === 'success') {
                Swal.fire({
                    title: "Success!",
                    text: "Post successfully added.",
                    icon: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to add Post",
                    text: response.data.message || "An error occurred while adding the Post.",
                });
            }
        }  )
        .catch(function (error) {               
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Failed to add Post",
                text: "An error occurred while adding the Post.",
            });
        });
}


function setPostStatus(){
    const postStatusCheckbox = document.getElementById('post_status');
    const postStatus = postStatusCheckbox.checked ? 'draft' : 'published';
    postStatusCheckbox.value = postStatus; // Set the value to 'draft' or 'published'
}

function setAddPostCategory(category) {
    document.getElementById('chosen_category').textContent = category;
    document.getElementById('post_category').value = category;
}


function setResponderDetails(responderData, responderUid, responderName, responderLastName, responderEmail) {
    var selectedResponder = document.getElementById('chosen_responder');
    var responderDetailsInput = document.getElementById('responder_details');
    var responder_uid = document.getElementById('responder_uid');
    var first_name = document.getElementById('first_nameResponder');
    var last_name = document.getElementById('last_nameResponder');
    var email = document.getElementById('emailResponder');

    selectedResponder.innerHTML = responderData;
    responderDetailsInput.value = responderData;
    responder_uid.value = responderUid;

    first_name.value = responderName;
    last_name.value = responderLastName;
    email.value = responderEmail;

    console.log("Responder Details Set:", responderDetailsInput.value);
}

function assignAlerId(alertId) {
   document.getElementById('alert_id_responder').value = alertId;  
}

function assignResponder() {
    const formData = new FormData(document.getElementById('updateAlertForm'));
    Swal.fire({
        title: 'Assigning Responder...',
        text: 'Please wait while we process your request.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    axios.post('assignresponder', formData,
        {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function (response) { 
            if (response.data.status === 'success') {
                Swal.fire({
                    title: "Success!",
                    text: "Responder successfully assigned.",
                    icon: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to assign Responder",
                    text: response.data.message || "An error occurred while assigning the Responder.",
                });
            }
        })
        .catch(function (error) {
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Failed to assign Responder",
                text: "An error occurred while assigning the Responder.",
            });
        }   
    );
}

$(document).ready(function() {
    $('.datatables').DataTable({
        dom: '<"custom-header"f>rt<"bottom"lip><"clear">',
        "paging": true,
        "searching": true,
        "info": false,
        "lengthChange": false
    });

    ClassicEditor
    .create(document.querySelector('textarea[name="ckeditor"]'))
    .then(editor => {
        editorInstance = editor; // store reference globally
    })
    .catch(error => {
      console.error(error);
    });


    const preview = document.getElementById('image_preview');
    const widget = uploadcare.Widget('[role=uploadcare-uploader]');

    widget.onUploadComplete(function(info) {
        console.log("Uploaded file CDN URL:", info.cdnUrl);
        preview.style.display = 'block';
        preview.src = info.cdnUrl;
    });


    widget.onChange(function(file) {
        if (!file) {
            // File was removed
            preview.style.display = 'none';
            preview.src = '';
        }
    });
});