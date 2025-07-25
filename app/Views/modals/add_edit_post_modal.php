  <!-- Add a Post Modal -->
  <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="AddPost" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Add a Post</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left" id="addNewsfeedForm">
                <label>Post Image</label><br/>
                <img id="image_preview" style="max-width: 200px; margin-top: 10px;" class="mb-3 rounded-3" />
                <div class="input-group mb-3">
                  <input
                    type="hidden"
                    role="uploadcare-uploader"
                    name="image"
                    data-clearable="true"
                    data-crop="1:1"
                    data-images-only="true"
                  />

                </div>
                <label>Post Title</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Post Title" aria-label="Post Title" aria-describedby="posttitle-addon" name="title">
                </div>
                <label>Post Contents</label>
                <div class="input-group mb-3">
                  <textarea class="form-control" placeholder="Post Contents" aria-label="postcontents" aria-describedby="postcontents-addon" name="ckeditor" cols="30" rows="5" id="post_content_add"></textarea>
                  
                </div>
                <label>Post Category</label>
                <div class="input-group mb-3 d-flex align-items-center">
                  <div class="btn-group dropup d-flex align-items-center">
                    <button type="button" class="btn bg-primary dropdown-toggle me-2 mb-0" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
                      Choose Category
                    </button>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;" onclick="setAddPostCategory('news')">News</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;" onclick="setAddPostCategory('blog')">Blog</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;" onclick="setAddPostCategory('resources')">Resources</a></li>
                    </ul>
                  </div>
                  <h6 class="mb-0" id="chosen_category">News</h6>
                  <input type="hidden" name="category" value="news" class="form-control" id="post_category">
                </div>

                <div class="form-check form-switch d-flex align-items-center">
                  <input type="checkbox" class="form-check-input" id="post_status" name="post_status" value="published" onchange="setPostStatus()">
                  <label for="post_status" class="mb-0">Save as draft?
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;" onclick="addNewsfeed()">Add Post</button>
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
                  <input type="checkbox" class="form-check-input" id="post_status_edit" onclick="">
                  <label for="isDraft">Save as draft?</label>
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
