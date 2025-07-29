
        

$(document).ready(function() {
    $('.datatables').DataTable({
        dom: '<"custom-header"f>rt<"bottom"lip><"clear">',
        "paging": true,
        "searching": true,
        "info": false,
        "lengthChange": false
    });

    document.querySelectorAll('textarea[name="ckeditor"]').forEach((textarea, index) => {
        ClassicEditor
            .create(textarea)
            .then(editor => {
                // You can store each editor instance if needed
                // window['editorInstance' + index] = editor;
                editorInstance = editor; // store reference globally
                editDataInstance = editor; // store reference globally
            })
            .catch(error => {
                console.error(error);
            });
    });

    const uploaderInputs = document.querySelectorAll('[role=uploadcare-uploader]');
    
    uploaderInputs.forEach((input) => {
        const widget = uploadcare.Widget(input);
        const context = input.dataset.context; // 'add' or 'edit'
        const previewSelector = `.image_preview_${context}`;
        const previews = document.querySelectorAll(previewSelector);

        widget.onUploadComplete(function (info) {
        previews.forEach((preview) => {
            preview.style.display = 'block';
            preview.src = info.cdnUrl;
        });
        });

        widget.onChange(function (file) {
        if (!file) {
            previews.forEach((preview) => {
            preview.style.display = 'none';
            preview.src = '';
            });
        }
        });
    });
});


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

        if (document.getElementById('add_responder_status').checked) {
            formData.set('responder_status', 'active'); // or leave it blank if you prefer
        }else{
            formData.set('responder_status', 'inactive');
        }

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
    var statusSpans = document.querySelectorAll('.responderStatus');
    statusSpans.forEach(function(statusSpan) {
        if (checkbox) {
            statusSpan.innerHTML = 'Active';
            statusSpan.classList.remove('text-warning', 'text-success');
            statusSpan.classList.add('text-success');
        } else {
            statusSpan.innerHTML = 'Inactive';
            statusSpan.classList.remove('text-success', 'text-warning');
            statusSpan.classList.add('text-warning');
        }
    });
}

let editorInstance;

async function addNewsfeed() {
  if (!editorInstance) {
    Swal.fire("Error", "Editor is still loading. Please wait.", "error");
    return;
  }

  
  const editorData = editorInstance.getData();
  if (!editorData.trim()) {
    Swal.fire("Error", "Post content cannot be empty.", "error");
    return;
  }

  const form = document.getElementById('addNewsfeedForm');
  const formData = new FormData(form);
  formData.set('ckeditor', editorData); // override editor field

  if (!document.getElementById('post_status').checked) {
    formData.set('post_status', 'published');
  }

  const imgSrc = document.querySelector('.image_preview_add')?.src;
  formData.set('image_path', imgSrc);

  Swal.fire({
    title: 'Adding Post...',
    text: 'Please wait while we process your request.',
    allowOutsideClick: false,
    didOpen: () => Swal.showLoading()
  });

  try {
    const response = await axios.post('addnewsfeed', formData, {
      headers: { 'Content-Type': 'application/json' }
    }); // ✅ no content-type override


    if (response.data.status === 'success') {
      Swal.fire("Success!", "Post successfully added.", "success")
        .then(() => window.location.reload());
    } else {
      throw new Error(response.data.message || "An unknown error occurred.");
    }
  } catch (error) {
    console.error(error);
    Swal.fire("Error", "Failed to add Post.", "error");
  }
}




function setPostStatus(){
    const postStatusCheckbox = document.getElementById('post_status');
    const postStatus = postStatusCheckbox.checked ? 'draft' : 'published';
    postStatusCheckbox.value = postStatus; // Set the value to 'draft' or 'published'
}


function setPostStatusEdit(){
    const postStatusCheckbox = document.getElementById('post_status_edit');
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


function setResponderDetailsEdit(responderData, responderUid, responderName, responderLastName, responderEmail) {
    var selectedResponder = document.getElementById('chosen_responder_edit');
    var responderDetailsInput = document.getElementById('responder_details_edit');
    var responder_uid = document.getElementById('responder_uid_edit');
    // var first_name = document.getElementById('first_nameResponder_edit');
    // var last_name = document.getElementById('last_nameResponder_edit');
    // var email = document.getElementById('emailResponder_edit');

    selectedResponder.innerHTML = responderData;
    responderDetailsInput.value = responderData;
    responder_uid.value = responderUid;

    // first_name.value = responderName;
    // last_name.value = responderLastName;
    // email.value = responderEmail;

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


function addNotice() {
    const formData = new FormData(document.getElementById('addNoticeForm'));
    if (document.getElementById('post_status').checked) {
        formData.set('notice_status', 'draft'); // or leave it blank if you prefer
    }else{
        formData.set('notice_status', 'published');
    }

    Swal.fire({
        title: 'Adding Notice...',
        text: 'Please wait while we process your request.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    axios.post('addnotice', formData,
        {   
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function (response) {
            if (response.data.status === 'success') {

                Swal.fire({
                    title: "Success!",
                    text: "Notice successfully added.",
                    icon: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to add Notice",
                    text: "An error occurred while adding the Notice.",
                });
            }
        })
        .catch(function (error) {
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Failed to add Notice",
                text: "An error occurred while adding the Notice.",
            });
        }
    );
}

function assignProfessional() {
    const formData = new FormData(document.getElementById('assignProfessionalForm'));
    Swal.fire({
        title: 'Assigning Professional...',
        text: 'Please wait while we process your request.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    axios.post('asssignprofessional', formData,
        {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function (response) {
            if (response.data.status === 'success') {
                Swal.fire({
                    title: "Success!",
                    text: "Professional successfully assigned.",
                    icon: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to assign Professional",
                    text: "An error occurred while assigning the Professional.",
                });
            }
        })
        .catch(function (error) {
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Failed to assign Professional",
                text: "An error occurred while assigning the Professional.",
            });
        }
    );
}

function assignSupportId(supportId) {
    document.getElementById('support_id').value = supportId;
}

function setProfessionalDetails(professionalId, professionalFirstName, professionalLastName, professionalEmail) {
    var professionalIdInput = document.getElementById('professional_id');
    professionalIdInput.value = professionalId;

    chosen_professional = document.getElementById('chosen_professional');
    chosen_professional.innerHTML = professionalFirstName+' '+professionalLastName+' : '+professionalEmail;

}


function addProfessional() {
    const formData = new FormData(document.getElementById('addProfessionalForm'));
    if (document.getElementById('professional_status').checked) {
        formData.set('professional_status', 'active'); // or leave it blank if you prefer
    }else{
        formData.set('professional_status', 'inactive');
    }

    Swal.fire({
        title: 'Adding Professional...',
        text: 'Please wait while we process your request.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    axios.post('addprofessional', formData,    
        {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function (response) {
            if (response.data.status === 'success') {
                Swal.fire({
                    title: "Success!",
                    text: "Professional successfully added.",
                    icon: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to add Professional",
                    text: response.data.message || "An error occurred while adding the Professional.",
                });
            }
        }  )
        .catch(function (error) {               
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Failed to add Professional",
                text: "An error occurred while adding the Professional.",
            });
        });
}


function changeProfessionalStatus(checkbox) {
    var statusSpan = document.getElementById('addProfessionalStatus');
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

function viewDiary(diaryTitle, diaryContents) {
    document.getElementById('diary_title').value = diaryTitle;

    let contentHTML = '';

    try {
        let delta;
        if (typeof diaryContents === 'string') {
            diaryContents = diaryContents.replace(/[\u0000-\u001F]+/g, "");
            delta = JSON.parse(diaryContents);
        } else {
            delta = diaryContents;
        }

        const converter = new QuillDeltaToHtmlConverter(delta, {});
        contentHTML = converter.convert();
    } catch (e) {
        console.error("Invalid Delta or already HTML:", e);
        contentHTML = diaryContents; 
    }

    document.getElementById('diary_view').innerHTML = contentHTML;
}

function editResponder() {
    const formData = new FormData(document.getElementById('editResponderForm'));

    if (document.getElementById('edit_responder_status').checked) {
        formData.set('responder_status', 'active'); // or leave it blank if you prefer
    }else{
        formData.set('responder_status', 'inactive');
    }

    Swal.fire({
        title: 'Updating Responder...',
        text: 'Please wait while we process your request.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    axios.post('editresponder', formData,    
        {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function (response) {
            if (response.data.status === 'success') {
                Swal.fire({
                    title: "Success!",
                    text: "Responder successfully updated.",
                    icon: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to update Responder",
                    text: response.data.message || "An error occurred while updating the Responder.",
                });
            }
        }  )
        .catch(function (error) {               
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Failed to update Responder",
                text: "An error occurred while updating the Responder.",
            });
        });
}

function assignResponderId(responderId, responderEmail) {
    document.getElementById('responder_id_input').value = responderId;
    document.getElementById('responder_email').value = responderEmail;
}



function getPostDetails(postId) {
    // const postId = document.getElementById('post_id_edit').value;
    if (!postId) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Post ID is missing. Please try again.'
        });
        return;
    }

    axios.get(`getpostdetails/${postId}`)
        .then(response => {
            if (response.data.status === 'success') {
                var postDetails = response.data.data.data;
                assignPostDetails(postDetails.id, postDetails.category, postDetails.post_title, postDetails.post_content, postDetails.image_path, postDetails.status);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.data.message || 'Failed to fetch post details.'
                });
            }
        })
        .catch(error => {
            console.error('Error fetching post details:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while fetching post details.'
            });
        });
}



async function assignPostDetails(postId, category, title, content, imgPath, status) {
 
    document.getElementById('post_id_edit').value = postId; 
    document.getElementById('post_category_edit').value = category;
    document.getElementById('post_title_edit').value = title;
    document.getElementById('image_preview_edit').src = imgPath;
    document.getElementById('post_status_edit').checked = (status === 'draft'); 
    if(status === 'draft') {
        document.getElementById('post_status_edit').value = 'draft';
        const checkbox = document.getElementById('post_status_edit');
        checkbox.checked = true;
        checkbox.setAttribute('checked', 'checked');

    }
    else {
        document.getElementById('post_status_edit').value = 'published';
        const checkbox = document.getElementById('post_status_edit');
        checkbox.checked = false;

    }
    document.getElementById('post_status_edit').value = status;
    document.getElementById('chosen_category_edit').textContent = category.charAt(0).toUpperCase() + category.slice(1);
    // Initialize the editor with the existing content
  
    // const contentField = document.getElementById('post_content_edit');

    // if (window.editorInstance) {
    //     await window.editorInstance.destroy();
    //     window.editorInstance = null;
    // }
    // contentField.value = content;
    // contentField.style.display = 'block';

    // window.editorInstance = await initializeEditor(contentField, content);

}

function decodeHTMLEntities(text) {
    const textarea = document.createElement("textarea");
    textarea.innerHTML = text;
    return textarea.value;
}


function initializeEditor(element, content) {
  return ClassicEditor
    .create(element)
    .then(editor => {
      editor.setData(content);
      return editor;
    });
}





async function editNewsfeed() {
  if (!editorInstance) {
    Swal.fire("Error", "Editor is still loading. Please wait.", "error");
    return;
  }

  
  const editorData = editorInstance.getData();
  if (!editorData.trim()) {
    Swal.fire("Error", "Post content cannot be empty.", "error");
    return;
  }
  

  document.getElementById('post_content_edit').value = editorData;

  const form = document.getElementById('editNewsfeedForm');
  const formData = new FormData(form);

  if (!document.getElementById('post_status_edit').checked) {
    formData.set('post_status', 'published');
  }

  
  formData.set('ckeditor', 'editorData'); // override editor field

  const imgSrc = document.querySelector('.image_preview_edit')?.src;
  formData.set('image_path', imgSrc);

  Swal.fire({
    title: 'Updating Post...',
    text: 'Please wait while we process your request.',
    allowOutsideClick: false,
    didOpen: () => Swal.showLoading()
  });

  try {
    const response = await axios.post('editnewsfeed', formData, {
      headers: { 'Content-Type': 'application/json' }
    });

    if (response.data.status === 'success') {
      Swal.fire("Success!", "Post successfully updated.", "success")
        .then(() => window.location.reload());
    } else {
      throw new Error(response.data.message || "An unknown error occurred.");
    }
  } catch (error) {
    console.error(error);
    Swal.fire("Error", "Failed to update Post.", "error");
  }
}


function editNotice() {
    const formData = new FormData(document.getElementById('editNoticeForm'));
    if (document.getElementById('post_status_edit').checked) {
        formData.set('notice_status', 'draft'); // or leave it blank if you prefer 
    }
    else {
        formData.set('notice_status', 'published');
    }   
    Swal.fire({
        title: 'Updating Notice...',
        text: 'Please wait while we process your request.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    axios.post('editnotice', formData,
        {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function (response) {
            if (response.data.status === 'success') {
                Swal.fire({
                    title: "Success!",
                    text: "Notice successfully updated.",
                    icon: "success"
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Failed to update Notice",
                    text: response.data.message || "An error occurred while updating the Notice.",
                });
            }
        })
        .catch(function (error) {
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Failed to update Notice",
                text: "An error occurred while updating the Notice.",
            });
        }
    );  
}

function setEditNoticeDetails(noticeId, noticeTitle, noticeContent, responderUid) {
    let myModal = new bootstrap.Modal(document.getElementById('editNotice'));
    myModal.show();

    document.getElementById('notice_id_edit').value = noticeId;
    document.getElementById('notice_title_edit').value = noticeTitle;
    document.getElementById('notice_content_edit').value = noticeContent;
    document.getElementById('responder_uid_edit').value = responderUid;
}


// $(document).ready(function() {
//   $('#addNotice').on('shown.bs.modal', function () {
//     console.log('Add Notice modal fully shown');
//   });

//   $('#editNotice').on('shown.bs.modal', function () {
//     console.log('Edit Notice modal fully shown');
//   });
// });
