  <!-- Add a Post Modal -->
  <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="AddPost" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Add a Post</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <label>Post Image</label>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" placeholder="Post Image" aria-label="Post Image" aria-describedby="postimage-addon">
                </div>
                <label>Post Title</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Post Title" aria-label="Post Title" aria-describedby="posttitle-addon">
                </div>
                <label>Post Contents</label>
                <div class="input-group mb-3">
                  <textarea class="form-control" placeholder="Post Contents" aria-label="postcontents" aria-describedby="postcontents-addon"></textarea>
                </div>
                <label>Post Category</label>
                <div class="input-group mb-3">
                <div class="btn-group dropup">
                  <button type="button" class="btn bg-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
                    Choose Category
                  </button>
                  <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">News</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Blog</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Resources</a></li>
                  </ul>
                </div>
                </div>

                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="post_status" onclick="">
                  <label for="isDraft">Save as draft? <span id="post_status_error"></span></label>
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;">Upload Post</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Edit a Post Modal -->
  <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="EditPost" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Edit a Post</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <label>Post Image</label>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" placeholder="Post Image" aria-label="Post Image" aria-describedby="postimage-addon">
                </div>
                <label>Post Title</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Post Title" aria-label="Post Title" aria-describedby="posttitle-addon">
                </div>
                <label>Post Contents</label>
                <div class="input-group mb-3">
                  <textarea class="form-control" placeholder="Post Contents" aria-label="postcontents" aria-describedby="postcontents-addon"></textarea>
                </div>
                <label>Post Category</label>
                <div class="input-group mb-3">
                <div class="btn-group dropup">
                  <button type="button" class="btn bg-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
                    Choose Category
                  </button>
                  <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">News</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Blog</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Resources</a></li>
                  </ul>
                </div>
                </div>

                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="post_status" onclick="">
                  <label for="isDraft">Save as draft? <span id="post_status_error"></span></label>
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;">Update Post</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
